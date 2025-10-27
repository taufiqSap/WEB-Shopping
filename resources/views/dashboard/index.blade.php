@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <div class="btn-group">
            ]
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title">{{ $productCount }}</h4>
                            <p class="card-text">Total Products</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-boxes fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title">{{ $orderCount }}</h4>
                            <p class="card-text">Total Orders</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-shopping-cart fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</h4>
                            <p class="card-text">Total Revenue</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-chart-line fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Items -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Recent Products</h5>
                </div>
                <div class="card-body">
                    @php
                        $recentProducts = \App\Models\Product::latest()->take(5)->get();
                    @endphp
                    
                    @foreach($recentProducts as $product)
                    <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                        <div>
                            <h6 class="mb-0">{{ $product->name }}</h6>
                            <small class="text-muted">Rp {{ number_format($product->price, 0, ',', '.') }}</small>
                        </div>
                        <span class="badge bg-{{ $product->stock > 0 ? 'success' : 'danger' }}">
                            {{ $product->stock }}
                        </span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Recent Orders</h5>
                </div>
                <div class="card-body">
                    @php
                        $recentOrders = \App\Models\Order::latest()->take(5)->get();
                    @endphp
                    
                    @foreach($recentOrders as $order)
                    <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                        <div>
                            <h6 class="mb-0">Order #{{ $order->id }}</h6>
                            <small class="text-muted">{{ $order->created_at->format('d M Y H:i') }}</small>
                        </div>
                        <span class="badge bg-primary">
                            Rp {{ number_format($order->total_price, 0, ',', '.') }}
                        </span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection