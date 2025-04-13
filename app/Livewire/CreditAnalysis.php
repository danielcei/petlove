<?php

namespace App\Livewire;

use App\Models\Optional;
use App\Models\Product;
use App\Models\ProductCustomer;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Support\Str;
use Livewire\Component;

class CreditAnalysis extends Component
{
    public function mount(): void
    {
        $this->form->fill([
            'product_customer_id' => null,
            'parameters' => [],
        ]);
    }

    public function render()
    {
        return view('livewire.credit-analysis', [
        ]);
    }
}
