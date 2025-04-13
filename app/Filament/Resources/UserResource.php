<?php

namespace App\Filament\Resources;

use App\Enums\Status;
use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers\PetsRelationManager;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Leandrocfe\FilamentPtbrFormFields\Cep;
use Leandrocfe\FilamentPtbrFormFields\Document;
use Leandrocfe\FilamentPtbrFormFields\PhoneNumber;
use Spatie\Permission\Models\Role;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';



    public static function getNavigationGroup(): string
    {
        return __('Cliente/Funcionário');
    }

    public static function getNavigationLabel(): string
    {
        return __('Users');
    }

    public static function getLabel(): string
    {
        return __('User');
    }

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        $query = parent::getEloquentQuery();
        return $query;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true),
                Document::make('cpf')
                    ->label(__('CPF'))
                    ->cpf()
                    ->required()
                    ->maxLength(255),
                PhoneNumber::make('telephone')
                    ->label(__('Phone'))
                    ->required(),
                Forms\Components\Select::make('role_id')
                    ->label(__('Perfil'))
                    ->relationship('roles', 'role_id')
                    ->options(function (callable $get) {
                        $minRoleId = auth()->user()->roles()->orderBy('id', 'asc')->first()->id ?? 0;
                        return  Role::where('id', '>=', $minRoleId)->pluck('name', 'id');
                    })
                    ->required(),
                Select::make('status')
                    ->label(__('Status'))
                    ->options(Status::class)
                    ->required(),

                Fieldset::make(__('Adrress'))
                    ->schema([
                        Cep::make('zipcode')
                            ->label(__('Zipcode'))
                            ->viaCep(
                                mode: 'prefix',
                                errorMessage: 'CEP inválido',
                                setFields: [
                                    'street' => 'logradouro',
                                    'number' => 'numero',
                                    'complement' => 'complemento',
                                    'district' => 'bairro',
                                    'city' => 'localidade',
                                    'state' => 'uf',
                                    'street_field' => 'logradouro',
                                    'district_field' => 'bairro',
                                    'city_field' => 'localidade',
                                    'state_field' => 'uf'
                                ]
                            )->live(onBlur: true),
                        TextInput::make('street')
                            ->label(__('street'))
                            ->disabled()
                            ->dehydrated(),
                        TextInput::make('number')
                            ->label(__('Number'))
                            ->required(),
                        TextInput::make('complement')
                            ->label(__('complement')),
                        TextInput::make('district')
                            ->label(__('district'))
                            ->disabled()
                            ->dehydrated(),
                        TextInput::make('city')
                            ->label(__('city'))
                            ->disabled()
                            ->dehydrated(),
                        TextInput::make('state')
                            ->label(__('state'))
                            ->disabled()
                            ->dehydrated(),
                    ])->columns(4),
            ])->columns(3);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('Name'))
                    ->sortable()
                    ->searchable(),
                TextColumn::make('email')
                    ->sortable()
                    ->label(__('E-mail'))
                    ->searchable(),
                TextColumn::make('cpf')
                    ->label(__('CPF'))
                    ->searchable(),
                TextColumn::make('client.associate_code')
                    ->sortable()
                    ->label(__('Associado'))
                    ->searchable()
                    ->visible(function () {
                        return auth()->user()->can('view-client-name');
                    }),
                TextColumn::make('client.name')
                    ->sortable()
                    ->label(__('Client'))
                    ->searchable()
                    ->visible(function () {
                        return auth()->user()->can('view-client-name');
                    }),
                TextColumn::make('roles.name')
                    ->label(__('Perfil'))
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(function ($state) {
                        return collect($state)->join(', ');
                    }),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('created_at_br')
                    ->label(__('Created at')),
                TextColumn::make('createdBy.name')
                    ->label(__('Created by')),
                TextColumn::make('updated_at_br')
                    ->label(__('Updated at')),
                TextColumn::make('updatedBy.name')
                    ->label(__('Updated by')),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')
                    ->options(Status::class)
                    ->query(function ($query, $data) {
                        if (blank($data['value'])) {
                            return $query;
                        }

                        return $query->where('status', $data);
                    }),
                SelectFilter::make('role')
                    ->label('Role')
                    ->options(function () {
                        $minRoleId = auth()->user()->roles()->orderBy('id', 'asc')->first()->id ?? 0;
                        if ($minRoleId > 4) {
                            return Role::where('id', '>=', $minRoleId)->pluck('name', 'id')->toArray();
                        }

                        return Role::pluck('name', 'id')->toArray();

                    })->query(function ($query, $data) {
                        if (blank($data['value'])) {
                            return $query;
                        }
                        $query->whereHas('roles', function ($query) use ($data) {
                            $query->where('id', $data);
                        });
                    }),
            ])
            ->actions([
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
            ]);
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getRelations(): array
    {
        return [
            PetsRelationManager::class
        ];
    }
}
