<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CreateOrder extends Component
{
    public $customer_name = '';
    public $customer_email = '';
    public $customer_phone = '';
    public $shipping_address = '';
    public $payment_method = 'qris';
    public $cart = [];
    public $total = 0;

    protected $rules = [
        'customer_name' => 'required|string|min:3|max:255',
        'customer_email' => 'required|email|max:255',
        'customer_phone' => 'required|string|min:10|max:15',
        'shipping_address' => 'required|string|min:10',
        'payment_method' => 'required|in:qris,bank_transfer,cod',
    ];

    protected $messages = [
        'customer_name.required' => 'Nama lengkap wajib diisi',
        'customer_name.min' => 'Nama lengkap minimal 3 karakter',
        'customer_email.required' => 'Email wajib diisi',
        'customer_email.email' => 'Format email tidak valid',
        'customer_phone.required' => 'Nomor telepon wajib diisi',
        'customer_phone.min' => 'Nomor telepon minimal 10 digit',
        'shipping_address.required' => 'Alamat pengiriman wajib diisi',
        'shipping_address.min' => 'Alamat pengiriman minimal 10 karakter',
        'payment_method.required' => 'Metode pembayaran wajib dipilih',
    ];

    public function mount()
    {
        $this->cart = session()->get('cart', []);
        
        if (empty($this->cart)) {
            session()->flash('error', 'Keranjang belanja Anda kosong!');
            return redirect()->route('shop');
        }

        $this->calculateTotal();
    }

    public function calculateTotal()
    {
        $this->total = 0;
        foreach($this->cart as $item) {
            $this->total += $item['price'] * $item['quantity'];
        }
    }

    public function submitOrder()
    {
        // Validasi input
        $this->validate();

        // Cek apakah cart masih ada
        if (empty($this->cart)) {
            session()->flash('error', 'Keranjang belanja kosong!');
            return redirect()->route('shop');
        }

        try {
            DB::beginTransaction();

            // Buat order
            $order = Order::create([
                'customer_name' => $this->customer_name,
                'customer_email' => $this->customer_email,
                'customer_phone' => $this->customer_phone,
                'shipping_address' => $this->shipping_address,
                'payment_method' => $this->payment_method,
                'total_price' => $this->total,
                'status' => 'pending',
            ]);

            // Simpan order items dan update stock
            foreach ($this->cart as $productId => $item) {
                $product = Product::findOrFail($productId);

                // Cek stock
                if ($product->stock < $item['quantity']) {
                    throw new \Exception("Stok produk {$product->name} tidak mencukupi!");
                }

                // Hitung subtotal
                $subtotal = $item['price'] * $item['quantity'];

                // Buat order item
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'subtotal' => $subtotal,
                ]);

                // Update stock produk - GUNAKAN DB QUERY LANGSUNG
                DB::table('products')
                    ->where('id', $productId)
                    ->decrement('stock', $item['quantity']);
            }

            DB::commit();

            // Hapus cart dari session
            session()->forget('cart');
            $this->dispatch('cartUpdated');

            // Redirect dengan pesan sukses
            session()->flash('success', 'Anda Berhasil membuat pesananan. Admin akan menghubungi anda terkait paket anda');
            return redirect()->route('shop');

        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Gagal membuat pesanan: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.create-order', [
            'cart' => $this->cart,
            'total' => $this->total
        ])->layout('layouts.livewire');
    }
}
