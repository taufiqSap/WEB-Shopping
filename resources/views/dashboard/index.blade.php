@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Dashboard</h1>
            <p class="text-gray-600 mt-2">Welcome to your admin dashboard</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('products.create') }}" 
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors duration-200 flex items-center space-x-2 shadow-sm">
                <i class="fas fa-plus"></i>
                <span>Add Product</span>
            </a>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Products Card -->
        <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-2xl shadow-lg p-6 transform hover:scale-105 transition-transform duration-200">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-blue-100 text-sm font-medium">Total Products</p>
                    <h3 class="text-3xl font-bold mt-2">{{ $productCount }}</h3>
                </div>
                <div class="bg-blue-400 bg-opacity-20 p-3 rounded-full">
                    <i class="fas fa-boxes text-2xl"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center text-blue-100 text-sm">
                <i class="fas fa-chart-line mr-1"></i>
                <span>All products in inventory</span>
            </div>
        </div>

        <!-- Orders Card -->
        <div class="bg-gradient-to-r from-green-500 to-green-600 text-white rounded-2xl shadow-lg p-6 transform hover:scale-105 transition-transform duration-200">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-green-100 text-sm font-medium">Total Orders</p>
                    <h3 class="text-3xl font-bold mt-2">{{ $orderCount }}</h3>
                </div>
                <div class="bg-green-400 bg-opacity-20 p-3 rounded-full">
                    <i class="fas fa-shopping-cart text-2xl"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center text-green-100 text-sm">
                <i class="fas fa-receipt mr-1"></i>
                <span>All customer orders</span>
            </div>
        </div>

        <!-- Revenue Card -->
        <div class="bg-gradient-to-r from-purple-500 to-purple-600 text-white rounded-2xl shadow-lg p-6 transform hover:scale-105 transition-transform duration-200">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-purple-100 text-sm font-medium">Total Revenue</p>
                    <h3 class="text-3xl font-bold mt-2">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</h3>
                </div>
                <div class="bg-purple-400 bg-opacity-20 p-3 rounded-full">
                    <i class="fas fa-chart-line text-2xl"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center text-purple-100 text-sm">
                <i class="fas fa-wallet mr-1"></i>
                <span>Total sales revenue</span>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Monthly Revenue Chart -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                    <i class="fas fa-chart-bar mr-2 text-blue-500"></i>
                    Monthly Revenue {{ now()->year }}
                </h3>
                <span class="text-sm text-gray-500 bg-gray-100 px-2 py-1 rounded">This Year</span>
            </div>
            <div class="h-80">
                <canvas id="monthlyRevenueChart"></canvas>
            </div>
        </div>

        <!-- Yearly Revenue Chart -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                    <i class="fas fa-chart-line mr-2 text-green-500"></i>
                    Yearly Revenue Trend
                </h3>
                <span class="text-sm text-gray-500 bg-gray-100 px-2 py-1 rounded">Last 5 Years</span>
            </div>
            <div class="h-80">
                <canvas id="yearlyRevenueChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Recent Items & Quick Stats -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Recent Products -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden lg:col-span-2">
            <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                    <i class="fas fa-clock mr-2 text-blue-500"></i>
                    Recent Products
                </h3>
            </div>
            <div class="divide-y divide-gray-100">
                @php
                    $recentProducts = \App\Models\Product::latest()->take(5)->get();
                @endphp
                
                @forelse($recentProducts as $product)
                <div class="px-6 py-4 hover:bg-gray-50 transition-colors duration-150">
                    <div class="flex justify-between items-center">
                        <div class="flex-1">
                            <h4 class="font-medium text-gray-900">{{ $product->name }}</h4>
                            <p class="text-sm text-gray-500 mt-1">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        </div>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $product->stock > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $product->stock }} stock
                        </span>
                    </div>
                </div>
                @empty
                <div class="px-6 py-8 text-center text-gray-500">
                    <i class="fas fa-box-open text-3xl mb-3 text-gray-300"></i>
                    <p>No products found</p>
                </div>
                @endforelse
            </div>
            <div class="bg-gray-50 px-6 py-3 border-t border-gray-200">
                <a href="{{ route('products.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center justify-center">
                    View all products
                    <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="space-y-6">
            <!-- Recent Orders -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                        <i class="fas fa-shopping-bag mr-2 text-green-500"></i>
                        Recent Orders
                    </h3>
                </div>
                <div class="divide-y divide-gray-100 max-h-64 overflow-y-auto">
                    @php
                        $recentOrders = \App\Models\Order::latest()->take(5)->get();
                    @endphp
                    
                    @forelse($recentOrders as $order)
                    <div class="px-6 py-4 hover:bg-gray-50 transition-colors duration-150">
                        <div class="flex justify-between items-center">
                            <div class="flex-1">
                                <h4 class="font-medium text-gray-900 text-sm">Order #{{ $order->id }}</h4>
                                <p class="text-xs text-gray-500 mt-1">{{ $order->created_at->format('d M Y H:i') }}</p>
                            </div>
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                Rp {{ number_format($order->total_price, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                    @empty
                    <div class="px-6 py-8 text-center text-gray-500">
                        <i class="fas fa-receipt text-2xl mb-3 text-gray-300"></i>
                        <p class="text-sm">No orders found</p>
                    </div>
                    @endforelse
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-tachometer-alt mr-2 text-purple-500"></i>
                    Quick Stats
                </h3>
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Avg Order Value</span>
                        <span class="text-sm font-semibold text-gray-900">
                            @php
                                $avgOrderValue = $orderCount > 0 ? $totalRevenue / $orderCount : 0;
                            @endphp
                            Rp {{ number_format($avgOrderValue, 0, ',', '.') }}
                        </span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Products Low Stock (< 10)</span>
                        <span class="text-sm font-semibold text-red-600">
                            {{ \App\Models\Product::where('stock', '<', 10)->count() }}
                        </span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Out of Stock</span>
                        <span class="text-sm font-semibold text-red-600">
                            {{ \App\Models\Product::where('stock', 0)->count() }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Monthly Revenue Chart
    const monthlyCtx = document.getElementById('monthlyRevenueChart').getContext('2d');
    const monthlyChart = new Chart(monthlyCtx, {
        type: 'bar',
        data: {
            labels: @json($months),
            datasets: [{
                label: 'Revenue (Rp)',
                data: @json($monthlyData),
                backgroundColor: 'rgba(59, 130, 246, 0.6)',
                borderColor: 'rgba(59, 130, 246, 1)',
                borderWidth: 2,
                borderRadius: 8,
                borderSkipped: false,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + value.toLocaleString('id-ID');
                        }
                    },
                    grid: {
                        color: 'rgba(0, 0, 0, 0.1)'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return 'Revenue: Rp ' + context.parsed.y.toLocaleString('id-ID');
                        }
                    }
                }
            }
        }
    });

    // Yearly Revenue Chart
    const yearlyCtx = document.getElementById('yearlyRevenueChart').getContext('2d');
    const yearlyChart = new Chart(yearlyCtx, {
        type: 'line',
        data: {
            labels: @json($yearlyRevenue->pluck('year')),
            datasets: [{
                label: 'Yearly Revenue (Rp)',
                data: @json($yearlyRevenue->pluck('total')),
                backgroundColor: 'rgba(16, 185, 129, 0.1)',
                borderColor: 'rgba(16, 185, 129, 1)',
                borderWidth: 3,
                tension: 0.4,
                fill: true,
                pointBackgroundColor: 'rgba(16, 185, 129, 1)',
                pointBorderColor: '#fff',
                pointBorderWidth: 2,
                pointRadius: 6,
                pointHoverRadius: 8
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + value.toLocaleString('id-ID');
                        }
                    },
                    grid: {
                        color: 'rgba(0, 0, 0, 0.1)'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return 'Revenue: Rp ' + context.parsed.y.toLocaleString('id-ID');
                        }
                    }
                }
            }
        }
    });
</script>
@endsection