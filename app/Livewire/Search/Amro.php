<?php

namespace App\Livewire\Search; // Change the namespace if necessary

use Livewire\Component;
use App\Models\Product;

class Amro extends Component
{
    public $searchTerm;

    public function render()
    {
        $products = [];

        if ($this->searchTerm) {
            $products = Product::where('ar_name', 'like', '%' . $this->searchTerm . '%')
                               ->orWhere('barcode', 'like', '%' . $this->searchTerm . '%')
                               ->get(['id', 'ar_name', 'en_name', 'type1', 'type2', 'barcode', 'support']);
        } else {
            $products = Product::all(['id', 'ar_name', 'en_name', 'type1', 'type2', 'barcode', 'support']);
        }

        return view('livewire.product-search', ['products' => $products]);
    }
}
