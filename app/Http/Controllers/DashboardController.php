<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $productCount = Product::count();
        $orderCount = Order::count();
        $totalRevenue = Order::sum('total_price');

        return view('dashboard.index', compact('productCount', 'orderCount', 'totalRevenue'));
    }
}
