<?php

namespace App\Livewire;

use App\Models\Client;
use App\Models\Optional;
use App\Models\Product;
use Filament\Actions\Concerns\HasForm;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Support\Collection;
use Livewire\Component;

class ProposalSimulator extends Component implements HasForms
{
    use InteractsWithForms;

    public $client;
    public Collection $products;
    public $optionals;
    public $selectedProduct;


    public function mount($client)
    {
        $this->form->fill([]);
        $this->client = $client;
        $this->products = Product::all();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('selectedProduct')
                    ->label('Produto')
                    ->options(Product::all()->pluck('name', 'id'))
                    ->searchable()
                    ->placeholder('Escolha um produto')
                    ->transformOptionsForJsUsing(function ($record) {
                        $this->optionals = Optional::where('product_id', $record)->get();
                    }),
            ]);
    }

    public function updatedOpcionais()
    {
        $this->optionals = Optional::where('product_id', $this->selectedProduct)->get();
    }

    public function updatedSelectedProduct($productId)
    {
        //dd($productId);
       // $this->optionals = Optional::where('product_id', $productId)->get();
    }


    public function addToCart()
    {
        // Adiciona o produto e opcionais selecionados ao carrinho
    }

    public function getSubtotalProperty()
    {
        // Calcula subtotal dos itens no carrinho
    }


    public function render()
    {
        return view('livewire.proposal-simulator', [
            'client' => $this->client,
            'product' => $this->products,
            'optionals' => $this->optionals
        ]);
    }
}
