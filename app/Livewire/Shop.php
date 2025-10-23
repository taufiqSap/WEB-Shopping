<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class Shop extends Component
{
    public function render()
    {
        return view('livewire.shop',[
            'product' => Product::all()->get()
        ]);

    }
}
