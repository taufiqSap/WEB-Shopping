<?php

namespace App\Livewire;

use Livewire\Component;

class Cart extends Component
{
    public $cart=[];
    public $total=0;

    public function mount()
    {
        $this->cart=session()->get('cart',[]);
        $this->calculateTotal();
    }

    public function calculateTotal()
    {
        $this->total = 0;
        foreach($this->cart as $item){
            $this->total +=$item['price'] * $item['quantity'];
        }
    }

    public function increment($productId)
    {
        if(isset($this->cart[$productId])){
            $this->cart[$productId]['quantity']++;
            session()->put('cart',$this->cart);
            $this->calculateTotal();
        }
    }

    public function decrement($productId)
    {
        if(isset($this->cart[$productId])){
            if($this->cart[$productId]['quantity']>1){
                $this->cart[$productId]['quantity']--;
            } else {
                unset($this->cart[$productId]);
            }
            session()->put('cart',$this->cart);
            $this->calculateTotal();
        }
    }

    public function remove($productId)
    {
        if(isset($this->cart[$productId])){
            unset($this->cart[$productId]);
            session()->put('cart',$this->cart);
            $this->calculateTotal();
        }
    }

    public function clear()
    {
        session()->forget('cart');
        $this->cart=[];
        $this->total=0;
    }
    public function render()
    {
        return view('livewire.cart',[
            'cart' => $this->cart,
            'total' => $this->total
        ])->layout('layouts.livewire');
    }
}
