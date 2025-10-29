<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class OrderController extends Controller
{
    /**
     * Menampilkan daftar order (untuk admin)
     */
    public function index()
    {
        $orders = Order::latest()->paginate(10);
        return view('orders.index', compact('orders'));
    }

    /**
     * Menampilkan detail order
     */
    public function show($id)
    {
        $order = Order::with('items.product')->findOrFail($id);
        return view('orders.show', compact('order'));
    }

    /**
     * Menampilkan form pembuatan order manual (opsional)
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Simpan order baru dari Livewire Checkout atau form admin
     */
    public function store(Request|array $request)
    {
        // Jika request dari Livewire (array)
        $data = is_array($request) ? $request : $request->validate([
            'customer_name'     => 'required|string|max:255',
            'customer_email'    => 'required|email|max:255',
            'customer_phone'    => 'required|string|max:20',
            'shipping_address'  => 'required|string',
            'payment_method'    => 'required|string',
            'orderItems'        => 'required|array', // array produk yang dipesan
        ]);

        $totalPrice = 0;

        foreach ($data['orderItems'] as $item) {
            $product = Product::findOrFail($item['product_id']);
            $totalPrice += $product->price * $item['quantity'];
        }

        // Simpan order utama
        $order = Order::create([
            'customer_name'     => $data['customer_name'],
            'customer_email'    => $data['customer_email'],
            'customer_phone'    => $data['customer_phone'],
            'shipping_address'  => $data['shipping_address'],
            'total_price'       => $totalPrice,
            'payment_method'    => $data['payment_method'] ?? 'qris',
            'payment_status'    => 'unpaid',
            'status'            => 'pending',
        ]);

        // Simpan item-item produk
        foreach ($data['orderItems'] as $item) {
            $product = Product::findOrFail($item['product_id']);
            OrderItem::create([
                'order_id'  => $order->id,
                'product_id'=> $product->id,
                'quantity'  => $item['quantity'],
                'price'     => $product->price,
                'subtotal'  => $product->price * $item['quantity'],
            ]);
        }

        return $order;
    }
}
