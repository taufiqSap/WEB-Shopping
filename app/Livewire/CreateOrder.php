<?php

namespace App\Livewire;

use Livewire\Component;
use App\Http\Controllers\OrderController;

class CreateOrder extends Component
{
    public $customer_name, $customer_email, $customer_phone, $shipping_address, $payment_method ='qris';

    public function submitOrder()
    {
        $cart = session()->get('cart',[]);
        if(empty($cart)){
            session()->flash('error','Anda belum menambahkan produk ke keranjang.');
            return;
        }
        $orderItem =[];
        foreach ($cart as $id => $item){
            $orderItem[]=[
                'product_id'=>$id,
                'quantity'=>$item['quantity'],
            ];
        }
        $controller = new OrderController();
        $order = $controller->store([
            'customer_name' => $this->customer_name,
            'customer_email' => $this->customer_email,
            'customer_phone' => $this->customer_phone,
            'shipping_address' => $this->shipping_address,
            'payment_method' => $this->payment_method,
            'orderItems' => $orderItem,
        ]);
        session()->forget('cart');
        session()->flash('success','Order berhasil dibuat dengan ID Order: '.$order->id);
        return redirect()->route('shop');
    }
    public function render()
    {
        return view('livewire.create-order');
    }
}
