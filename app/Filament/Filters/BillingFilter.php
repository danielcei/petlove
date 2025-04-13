<?php
namespace App\Filament\Filters;

use App\Models\Billing;
use Filament\Forms\Components\Select;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class BillingFilter extends Filter
{
    public function apply(Builder $query, array $data): Builder
    {
        if (isset($data['billing_id'])) {
            return $query->where('billing_id', $data['billing_id']);
        }

        return $query;
    }

    public function mutateFormDataBeforeApply(array $data): array
    {
        return $data;
    }

    public function getFormSchema(): array
    {
        return [
           Select::make('billing_id')
                ->label('Billing')
                ->options(Billing::query()->pluck('name', 'id'))
        ->placeholder('Select a billing'),
        ];
    }
}
