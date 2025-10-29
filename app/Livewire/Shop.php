<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class Shop extends Component
{
    public function addToCart($productId)
    {
        $product = Product::findOrFail($productId); 

        if($product->stock <= 0) {
            session()->flash('error', 'Stok produk habis.');
            return;
        }

        $cart = session()->get('cart', []);

        if(isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                'name' => $product->name, 
                'price' => $product->price, 
                'quantity' => 1,
                'image' => $product->image
            ];
        }

        session()->put('cart', $cart);
        $this->dispatch('cartUpdated');
        session()->flash('success', "{$product->name} berhasil ditambahkan ke keranjang."); 
    }

    public function render()
    {
        $products = Product::where('stock', '>', 0)->get();
        
        return view('livewire.shop', [
            'products' => $products 
        ])->layout('layouts.livewire'); // Tambahkan ini
    }
}