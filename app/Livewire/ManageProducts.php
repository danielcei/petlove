<?php

namespace App\Livewire;

use App\Enums\TypePerson;
use App\Models\Optional;
use App\Models\Product;
use Filament\Notifications\Notification;
use Illuminate\Support\Str;
use Livewire\Component;

class ManageProducts extends Component
{
    public $search = '';
    public $products = [];
    public $kindsOfPerson = [];

    public function mount()
    {
        $this->products = Product::with('optionals')->get();
        $this->kindsOfPerson = TypePerson::cases();
    }

    public function updateOptionalPrice($optionalId, $field, $value)
    {
        $optional = Optional::find($optionalId);
        $value = (float)Str::replace(',', '.', $value);


        if ($field === 'suggested_price' && $value < (float)Str::replace(',', '.', $optional->minimum_price)) {
            Notification::make()
                ->title('O valor sugerido deve ser maior que o valor mínimo')
                ->danger()
                ->send();
            return;
        }

        if ($field === 'minimum_price' && $value > (float)Str::replace(',', '.', $optional->suggested_price)) {
            $this->forceRender = true;
            Notification::make()
                ->title('O valor mínimo deve ser maior que o valor sugerido')
                ->danger()
                ->send();
            return;
        }

        if ($optional) {
            $optional->$field = $value;
            $optional->save();
            Notification::make()
                ->title('Salvo com Sucesso!')
                ->success()
                ->send();
        }
    }

    public function updateProductPrice($productId, $field, $value)
    {
        $value = (float)Str::replace(',', '.', $value);

        $product = Product::find($productId);


        if ($field === 'suggested_price' && $value < (float)Str::replace(',', '.', $product->minimum_price)) {
            Notification::make()
                ->title('O valor sugerido deve ser maior que o valor mínimo')
                ->danger()
                ->send();

            $product->$field = $product->suggested_price;

            return;
        }

        if ($field === 'minimum_price' && $value > (float)Str::replace(',', '.', $product->suggested_price)) {
            Notification::make()
                ->title('O valor mínimo deve ser maior que o valor sugerido')
                ->danger()
                ->send();
            $product->$field = $product->minimum_price;
            return;
        }

        $product->$field = $value;
        $product->save();

        Notification::make()
            ->title('Salvo com Sucesso!')
            ->success()
            ->send();
    }

    public function updateOptionalType($optionalId, $value)
    {

        $optional = Optional::find($optionalId);
        $optional->type_person = $value;
        $optional->save();

        Notification::make()
            ->title('Salvo com Sucesso!')
            ->success()
            ->send();
    }


    public function updateProductType($productId, $value)
    {

        $product = Product::find($productId);
        $product->type_person = $value;
        $product->save();

        Notification::make()
            ->title('Salvo com Sucesso!')
            ->success()
            ->send();
    }


    public function updateSearch($value)
    {
        $this->search = $value;
        $this->products = Product::query()
            ->with('optionals')
            ->when($this->search, function ($query) {
                $query->where(function ($subQuery) {
                    $subQuery->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('spc_name', 'like', '%' . $this->search . '%')
                        ->orWhere('spc_code', 'like', '%' . $this->search . '%');
                });
            })->get();
    }

    public function render()
    {
        return view('livewire.manage-products', [
            'products' => $this->products,
            'kindsOfPerson' => $this->kindsOfPerson,
        ]);
    }
}
