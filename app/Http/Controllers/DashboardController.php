<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $productCount = Product::count();
        $orderCount = Order::count();
        $totalRevenue = Order::sum('total_price');

        // === GRAFIK BULANAN ===
        $monthlyRevenue = Order::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('SUM(total_price) as total')
            )
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Format agar mudah dikirim ke chart JS
        $months = collect(range(1, 12))->map(function ($m) {
            return date('F', mktime(0, 0, 0, $m, 1)); // Nama bulan
        });

        $monthlyData = $months->map(function ($monthName, $index) use ($monthlyRevenue) {
            $monthIndex = $index + 1;
            $found = $monthlyRevenue->firstWhere('month', $monthIndex);
            return $found ? $found->total : 0;
        });

        // === GRAFIK TAHUNAN ===
        $yearlyRevenue = Order::select(
                DB::raw('YEAR(created_at) as year'),
                DB::raw('SUM(total_price) as total')
            )
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->take(5)
            ->get();

        return view('dashboard.index', [
            'productCount' => $productCount,
            'orderCount' => $orderCount,
            'totalRevenue' => $totalRevenue,
            'months' => $months,
            'monthlyData' => $monthlyData,
            'yearlyRevenue' => $yearlyRevenue,
        ]);
    }
}
