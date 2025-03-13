<?php

namespace App\Livewire\Products;

use App\Models\Produit;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.products.index',[
            'products'=>Produit::all(),
        ]);
    }
}
