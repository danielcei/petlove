<?php

namespace App\Filament\Resources;

use App\Enums\StatusAppointment;
use App\Filament\Resources\PetResource\Pages;
use App\Filament\Resources\PetResource\RelationManagers;
use App\Models\Appointment;
use App\Models\Pet;
use App\Services\AppointmentService;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PetResource extends Resource
{
    protected static ?string $model = Pet::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';
    protected static ?string $navigationLabel = 'Meus Pets';

    public static function getLabel(): string
    {
        return __('Meus Pets');
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', auth()->id());
    }



    public static function form(Form $form): Form
    {
        return $form->schema(self::getForm());
    }

    /**
     * @return array
     */
    protected static function getForm($userId = null): array
    {
        return [
            Grid::make(2)->schema([
                Hidden::make('user_id')->default($userId ?? auth()->id()),
                FileUpload::make('photo')
                    ->label('Foto')
                    ->image()
                    ->imageEditor()
                    ->required()
                    ->disk('public')
                    ->directory('pets')
                    ->visibility('public'),

                TextInput::make('name')
                    ->label('Nome')
                    ->required(),

                DatePicker::make('birthdate')
                    ->label('Aniversário'),

                Select::make('gender')
                    ->label('Sexo')
                    ->options([
                        'male' => 'Macho',
                        'female' => 'Fêmea',
                    ])
                    ->nullable(),

                TextInput::make('weight')
                    ->label('Peso (kg)')
                    ->numeric()
                    ->suffix('kg'),

                TextInput::make('color')
                    ->label('Cor'),

                Select::make('size')
                    ->label('Porte')
                    ->options([
                        'small' => 'Pequeno',
                        'medium' => 'Médio',
                        'large' => 'Grande',
                    ])
                    ->nullable(),

                Toggle::make('is_neutered')
                    ->label('Castrado?'),

                Select::make('animal_id')
                    ->label('Animal')
                    ->relationship('animal', 'name')
                    ->live()
                    ->required(),

                Select::make('breed_id')
                    ->label('Raça')
                    ->relationship('breed', 'name', fn($query, $get) => $query->where('animal_id', $get('animal_id')))
                    ->required()
                    ->disabled(fn($get) => !$get('animal_id'))
                    ->loadingMessage('Carregando raças...')
                    ->noSearchResultsMessage('Nenhuma raça encontrada'),
            ]),

            Textarea::make('notes')
                ->label('Observações')
                ->rows(4)
                ->columnSpanFull(),
        ];
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            ImageColumn::make('photo')
                ->label('Foto')
                ->disk('public')
                ->circular()
                ->size(50),
            TextColumn::make('name')->label('Nome')->sortable()->searchable(),
            TextColumn::make('user_id')
                ->label('Dono (contato)')
                ->html()
                ->formatStateUsing(function ($record) {
                    return view('components.tables.user-info-column', [
                        'user' => $record->user,
                    ])->render();
                }),
            TextColumn::make('animal.name')->label('Animal'),
            TextColumn::make('breed.name')->label('Raça'),
            TextColumn::make('gender')->label('Sexo')->formatStateUsing(fn ($state) => $state === 'male' ? 'Macho' : 'Fêmea'),
            TextColumn::make('birthdate')->label('Aniversário')->date('d/m/Y'),
            TextColumn::make('weight')->label('Peso')->suffix(' kg'),
            TextColumn::make('size')
                ->label('Porte')
                ->formatStateUsing(fn ($state) => match ($state) {
                    'small' => 'Pequeno',
                    'medium' => 'Médio',
                    'large' => 'Grande',
                    default => '-',
                }),
            IconColumn::make('is_neutered')
                ->label('Castrado')
                ->boolean()
                ->alignCenter(),
        ])
            ->filters([
                ...collect([
                    auth()->user()->hasRole('admin') || auth()->user()->hasRole('backoffice')
                        ? SelectFilter::make('user_id')
                        ->label('Cliente')
                        ->relationship('user', 'name')
                        ->searchable()
                        : null,
                ])->filter()->all(),
            ])
            ->actions([
                Action::make('schedule')
                    ->label('Agendar Serviço')
                    ->form([
                        Forms\Components\DatePicker::make('date')
                            ->label('Data')
                            ->required()
                            ->reactive(),

                        Forms\Components\Select::make('services')
                            ->label('Serviços')
                            ->multiple()
                            ->options(function ($record) {
                                if (!$record->animal) {
                                    return [];
                                }

                                return $record->animal
                                    ->services()
                                    ->select('services.id', 'services.name')
                                    ->pluck('services.name', 'services.id');
                            })
                            ->required()
                            ->reactive(),

                        Forms\Components\Select::make('time')
                            ->label('Horário')
                            ->options(fn (callable $get) =>
                            (new AppointmentService)->getAvailableTimesForDate(
                                $get('date') ?? now()->toDateString(),
                                $get('services') ?? []
                            )->mapWithKeys(fn ($time) => [$time => $time])
                            )
                            ->required(),
                    ])
                    ->action(function (array $data, $record) {
                        $appointment = Appointment::create([
                            'user_id' => auth()->id(),
                            'pet_id' => $record->id,
                            'date' => $data['date'],
                            'time' => $data['time'],
                            'status' => StatusAppointment::STATUS_AGENDADO,
                        ]);
                        $appointment->services()->sync($data['services']);
                    })
                    ->icon('heroicon-o-calendar')
                    ->color('primary'),
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make()
                        ->visible(fn($record): bool => self::canEdit($record)),
                    Tables\Actions\DeleteAction::make()
                        ->visible(fn($record): bool => self::canEdit($record)),
                ])
                    ->iconButton()
                    ->tooltip('Actions'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])->headerActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPets::route('/'),
            'create' => Pages\CreatePet::route('/create'),
            'edit' => Pages\EditPet::route('/{record}/edit'),
        ];
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\AppointmentsRelationManager::class
        ];
    }
    public static function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            DeleteAction::make(),
            Action::make('schedule')
                ->label('Agendar Serviço')
                ->form([
                    Forms\Components\DatePicker::make('date')
                        ->label('Data')
                        ->required()
                        ->reactive(),

                    Forms\Components\Select::make('services')
                        ->label('Serviços')
                        ->multiple()
                        ->options(function ($record) {
                            if (!$record->animal) {
                                return [];
                            }

                            return $record->animal
                                ->services()
                                ->select('services.id', 'services.name')
                                ->pluck('services.name', 'services.id');
                        })
                        ->required()
                        ->reactive(),

                    Forms\Components\Select::make('time')
                        ->label('Horário')
                        ->options(fn (callable $get) =>
                        (new AppointmentService)->getAvailableTimesForDate(
                            $get('date') ?? now()->toDateString(),
                            $get('services') ?? []
                        )->mapWithKeys(fn ($time) => [$time => $time])
                        )
                        ->required(),
                ])
                ->action(function (array $data, $record) {
                    $appointment = Appointment::create([
                        'user_id' => auth()->id(),
                        'pet_id' => $record->id,
                        'date' => $data['date'],
                        'time' => $data['time'],
                        'status' => StatusAppointment::STATUS_AGENDADO,
                    ]);
                    $appointment->services()->sync($data['services']);
                })
                ->icon('heroicon-o-calendar')
                ->color('primary'),
        ];
    }
}
