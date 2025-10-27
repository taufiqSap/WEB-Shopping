<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class NewArrival extends Component
{
    public function render()
    {
        return view('livewire.new-arrival',[
            'products' => Product::latest()->take(9)->get()
        ])->layout('layouts.guest');
    }
}
