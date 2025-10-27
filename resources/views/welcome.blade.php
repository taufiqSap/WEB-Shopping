@extends('layouts.guest')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Hero Section - Full Background Image -->
    <section class="relative text-white min-h-screen flex items-end overflow-hidden">
        <!-- Background Image with Subtle Overlay -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('assets/unnamed.jpg') }}" 
                 alt="Fishing Background" 
                 class="w-full h-full object-cover">
            <!-- Lighter overlay for better image visibility -->
            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-gray-900/30"></div>
        </div>

        <!-- Watermark Text - Left Side (More Subtle) -->
        <div class="absolute left-0 top-1/2 -translate-y-1/2 z-0 opacity-5">
            <div class="transform -rotate-90 origin-left">
                <h2 class="text-[15rem] font-black text-white whitespace-nowrap tracking-wider">
                    SENTUL FISHING
                </h2>
            </div>
        </div>

        <!-- Watermark Text - Right Side (More Subtle) -->
        <div class="absolute right-0 top-1/2 -translate-y-1/2 z-0 opacity-5">
            <div class="transform rotate-90 origin-right">
                <h2 class="text-[15rem] font-black text-white whitespace-nowrap tracking-wider">
                    SENTUL FISHING
                </h2>
            </div>
        </div>
    </section>

    <!-- New Arrivals -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800">New Arrivals</h2>
                <a href="{{ route('new-arrivals') }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition-colors duration-200 flex items-center space-x-2 shadow-lg">
                    <span>View All Products</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
            
            @php
                $latestProducts = \App\Models\Product::with('category')->latest()->take(3)->get();
            @endphp

            @if($latestProducts->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($latestProducts as $product)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <!-- Product Image -->
                        <div class="h-48 bg-gray-200 flex items-center justify-center overflow-hidden">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" 
                                     alt="{{ $product->name }}" 
                                     class="h-full w-full object-cover">
                            @else
                                <div class="flex flex-col items-center justify-center text-gray-400">
                                    <svg class="w-16 h-16 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <span class="text-sm">No Image</span>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Product Info -->
                        <div class="p-4">
                            <div class="mb-2">
                                <span class="inline-block px-2 py-1 text-xs font-semibold text-blue-600 bg-blue-100 rounded">
                                    {{ $product->category->name ?? 'Uncategorized' }}
                                </span>
                            </div>
                            <h3 class="text-lg font-semibold mb-2 text-gray-800">{{ $product->name }}</h3>
                            <p class="text-gray-600 mb-4 text-sm line-clamp-2">{{ Str::limit($product->description, 80) }}</p>
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-xl font-bold text-blue-600">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </span>
                                @if($product->stock > 0)
                                    <span class="text-green-600 text-sm font-medium">
                                        Stock: {{ $product->stock }}
                                    </span>
                                @else
                                    <span class="text-red-600 text-sm font-medium">Out of Stock</span>
                                @endif
                            </div>
                           
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-16">
                    <div class="bg-white rounded-lg shadow-md p-12 max-w-md mx-auto">
                        <div class="text-gray-300 mb-4">
                            <svg class="w-24 h-24 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                            </svg>
                        </div>
                        <p class="text-gray-500 text-xl font-medium mb-2">No Products Available</p>
                        <p class="text-gray-400 text-sm">Check back soon for new arrivals!</p>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Social Media -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Follow Us On Instagram</h2>
            <p class="text-gray-600 mb-8">@SentulFishing</p>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach(range(1, 4) as $post)
                <div class="aspect-square bg-gray-200 rounded-lg flex items-center justify-center hover:bg-gray-300 transition-colors cursor-pointer">
                    <span class="text-gray-500">Fishing Post {{ $post }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-16 bg-blue-900 text-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">This Is What Our Customers Say</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach([
                    ['name' => 'Andi Wijaya', 'comment' => 'Kualitas produk sangat bagus, harga terjangkau!'],
                    ['name' => 'Budi Santoso', 'comment' => 'Pelayanan cepat, barang sampai dengan aman.'],
                    ['name' => 'Sari Dewi', 'comment' => 'Fishing rod-nya kokoh dan nyaman digunakan.']
                ] as $testimonial)
                <div class="bg-blue-800 p-6 rounded-lg hover:bg-blue-700 transition-colors duration-300">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center">
                            <span class="font-bold text-lg">{{ substr($testimonial['name'], 0, 1) }}</span>
                        </div>
                        <div class="ml-4">
                            <h4 class="font-semibold">{{ $testimonial['name'] }}</h4>
                            <div class="flex text-yellow-400">
                                ★★★★★
                            </div>
                        </div>
                    </div>
                    <p class="text-blue-100">"{{ $testimonial['comment'] }}"</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>

<style>
    @media (max-width: 768px) {
        .container {
            padding-left: 1rem;
            padding-right: 1rem;
        }
        
        .text-6xl {
            font-size: 3rem;
        }
        
        .text-3xl {
            font-size: 1.5rem;
        }
    }

    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Smooth scroll */
    html {
        scroll-behavior: smooth;
    }

    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 10px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    ::-webkit-scrollbar-thumb {
        background: #3b82f6;
        border-radius: 5px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #2563eb;
    }
</style>
@endsection