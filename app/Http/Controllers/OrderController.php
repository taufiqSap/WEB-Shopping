<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::latest()->paginate(10);
        return view('admin.orders.index', compact('order'));
    }

    public function show($id)
    {
        $order = Order::findOrfail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function create()
    {
        return view('admin.orders.create');
    }

    public function store(Request $request)
    {
        $validate->Validate([
        'customer_name'     => 'required|string|max:255',
            'customer_email'    => 'required|email|max:255',
            'customer_phone'    => 'required|string|max:20',
            'shipping_address'  => 'required|string',
            'total_price'       => 'required|numeric|min:0',
            'payment_method'    => 'required|string',
            'payment_status'    => 'required|in:unpaid,paid,failed',
            'status'            => 'required|in:pending,processing,shipped,delivered,canceled',
        ]);

        $order = Order::create([
            'customer_name'     => $request->customer_name,
            'customer_email'    => $request->customer_email,
            'customer_phone'    => $request->customer_phone,
            'shipping_address'  => $request->shipping_address,
            'total_price'       => $request->total_price,
            'payment_method'    => $request->payment_method,
            'payment_status'    => $request->payment_status,
            'status'            => $request->status,
        ]);

        return redirect()->route('admin.orders.index')->with('success', 'Order created successfully.');
    }
}
