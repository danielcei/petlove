<?php

namespace App\Livewire;

use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class PriceTable extends Component
{
    public $search = '';

    public function getProduct(): Collection
    {
        return Product::query()
            ->with('optionals')
            ->when($this->search, function ($query) {
                $query->where(function ($subQuery) {
                    $subQuery->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('spc_name', 'like', '%' . $this->search . '%')
                        ->orWhere('spc_code', 'like', '%' . $this->search . '%');
                });
            })->get();
    }

    public function printProductPrice()
    {
        $pdf = PDF::loadView('livewire.price-table', [
            'products' => self::getProduct(),
        ]);

        // Baixar o PDF gerado
        return $pdf->download('price-table.pdf');

    }

    public function render()
    {
        return view('livewire.price-table', [
            'products' => self::getProduct(),
        ]);
    }
}
