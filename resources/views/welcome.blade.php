@extends('layouts.guest')

@section('content')
<div class="min-h-screen bg-gray-900">
    <!-- Hero Section - Full Background Image -->
    <section class="relative text-white min-h-screen flex items-center justify-center overflow-hidden">
        <!-- Background Image with Lighter Overlay -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('assets/bg.png') }}" 
                 alt="Fishing Background" 
                 class="w-full h-full object-cover scale-150 md:scale-125">
            <!-- Lighter overlay untuk background lebih terlihat -->
            <div class="absolute inset-0 bg-gradient-to-b from-gray-900/20 via-gray-900/30 to-gray-900/50"></div>
        </div>

        <!-- Watermark Text - Desktop Only -->
        <div class="hidden lg:block absolute left-0 top-1/2 -translate-y-1/2 z-0 opacity-[0.03]">
            <div class="transform -rotate-90 origin-left">
                <h2 class="text-[15rem] font-black text-white whitespace-nowrap tracking-wider">
                    SENTUL FISHING
                </h2>
            </div>
        </div>

        <!-- Watermark Text - Desktop Only -->
        <div class="hidden lg:block absolute right-0 top-1/2 -translate-y-1/2 z-0 opacity-[0.03]">
            <div class="transform rotate-90 origin-right">
                <h2 class="text-[15rem] font-black text-white whitespace-nowrap tracking-wider">
                    SENTUL FISHING
                </h2>
            </div>
        </div>

        <!-- Hero Content - CENTER & Mobile Optimized -->
        <div class="relative z-10 w-full px-4 py-8">
            <div class="max-w-4xl mx-auto text-center">
                <!-- Main Title -->
                <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-black mb-4 md:mb-6 leading-tight">
                    <span class="bg-gradient-to-r from-white to-gray-200 bg-clip-text text-transparent drop-shadow-2xl">
                        SENTUL
                    </span>
                    <br class="sm:hidden">
                    <span class="bg-gradient-to-r from-blue-400 to-cyan-400 bg-clip-text text-transparent drop-shadow-2xl">
                        FISHING
                    </span>
                </h1>
                
                <!-- Subtitle -->
                <p class="text-base sm:text-lg md:text-xl lg:text-2xl text-gray-200 mb-6 md:mb-8 max-w-2xl mx-auto px-2 drop-shadow-lg font-medium">
                    Premium Fishing Experience in the Heart of Nature
                </p>
                
                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center items-center max-w-md mx-auto">
                    <a href="{{ route('shop') }}" 
                       class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 md:px-8 md:py-4 rounded-lg transition-all duration-300 font-semibold text-sm md:text-base shadow-2xl transform hover:scale-105 flex items-center justify-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                        <span>Explore Products</span>
                    </a>
                    <a href="{{ route('new-arrivals') }}" 
                       class="w-full sm:w-auto bg-white/10 backdrop-blur-md hover:bg-white/20 text-white px-6 py-3 md:px-8 md:py-4 rounded-lg transition-all duration-300 font-semibold text-sm md:text-base border-2 border-white/30 shadow-2xl transform hover:scale-105 flex items-center justify-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        <span>New Arrivals</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Scroll Down Indicator - Hidden on Mobile -->
        <div class="hidden md:block absolute bottom-8 left-1/2 -translate-x-1/2 z-10 animate-bounce">
            <svg class="w-6 h-6 text-white opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </section>

    <!-- New Arrivals -->
    <section class="py-12 md:py-16 bg-gray-800">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="flex flex-col sm:flex-row justify-between items-center mb-8 md:mb-12 space-y-4 sm:space-y-0">
                <h2 class="text-2xl md:text-3xl font-bold text-white text-center sm:text-left">New Arrivals</h2>
                <a href="{{ route('new-arrivals') }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 md:px-6 md:py-3 rounded-lg transition-colors duration-200 flex items-center space-x-2 shadow-lg text-sm md:text-base w-full sm:w-auto justify-center">
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
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 lg:gap-8">
                    @foreach($latestProducts as $product)
                    <div class="bg-gray-700 rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 border border-gray-600 transform hover:-translate-y-1">
                        <!-- Product Image -->
                        <div class="h-40 sm:h-48 bg-gray-600 flex items-center justify-center overflow-hidden">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" 
                                     alt="{{ $product->name }}" 
                                     class="h-full w-full object-cover transition-transform duration-300 hover:scale-105">
                            @else
                                <div class="flex flex-col items-center justify-center text-gray-400">
                                    <svg class="w-12 h-12 md:w-16 md:h-16 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <span class="text-xs md:text-sm">No Image</span>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Product Info -->
                        <div class="p-4 md:p-6">
                            <div class="mb-2">
                                <span class="inline-block px-2 py-1 text-xs font-semibold text-blue-400 bg-blue-900/50 rounded">
                                    {{ $product->category->name ?? 'Uncategorized' }}
                                </span>
                            </div>
                            <h3 class="text-base md:text-lg font-semibold mb-2 text-white line-clamp-1">{{ $product->name }}</h3>
                            <p class="text-gray-300 mb-3 md:mb-4 text-xs md:text-sm line-clamp-2">{{ Str::limit($product->description, 80) }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg md:text-xl font-bold text-blue-400">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </span>
                                @if($product->stock > 0)
                                    <span class="text-green-400 text-xs md:text-sm font-medium">
                                        Stock: {{ $product->stock }}
                                    </span>
                                @else
                                    <span class="text-red-400 text-xs md:text-sm font-medium">Out of Stock</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12 md:py-16">
                    <div class="bg-gray-700 rounded-lg shadow-md p-6 md:p-12 max-w-md mx-auto border border-gray-600">
                        <div class="text-gray-500 mb-4">
                            <svg class="w-16 h-16 md:w-24 md:h-24 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                            </svg>
                        </div>
                        <p class="text-gray-300 text-lg md:text-xl font-medium mb-2">No Products Available</p>
                        <p class="text-gray-400 text-sm md:text-base">Check back soon for new arrivals!</p>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Social Media -->
    <section class="py-12 md:py-16 bg-gray-900">
        <div class="container mx-auto px-4 sm:px-6 text-center">
            <h2 class="text-2xl md:text-3xl font-bold text-white mb-3 md:mb-4">Follow Us On Instagram</h2>
            <p class="text-gray-400 mb-6 md:mb-8 text-sm md:text-base">@SentulFishing</p>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 md:gap-4 max-w-2xl mx-auto">
                @foreach(range(1, 4) as $post)
                <div class="aspect-square bg-gray-700 rounded-lg flex items-center justify-center hover:bg-gray-600 transition-all duration-300 cursor-pointer border border-gray-600 transform hover:scale-105">
                    <div class="text-center p-2">
                        <svg class="w-6 h-6 md:w-8 md:h-8 mx-auto mb-1 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                        <span class="text-xs md:text-sm text-gray-400">Post {{ $post }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-12 md:py-16 bg-blue-900 text-white">
        <div class="container mx-auto px-4 sm:px-6">
            <h2 class="text-2xl md:text-3xl font-bold text-center mb-8 md:mb-12">What Our Customers Say</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 lg:gap-8">
                @foreach([
                    ['name' => 'Andi Wijaya', 'comment' => 'Kualitas produk sangat bagus, harga terjangkau!'],
                    ['name' => 'Budi Santoso', 'comment' => 'Pelayanan cepat, barang sampai dengan aman.'],
                    ['name' => 'Sari Dewi', 'comment' => 'Fishing rod-nya kokoh dan nyaman digunakan.']
                ] as $testimonial)
                <div class="bg-blue-800 p-4 md:p-6 rounded-lg hover:bg-blue-700 transition-all duration-300 border border-blue-700 transform hover:-translate-y-1">
                    <div class="flex items-center mb-3 md:mb-4">
                        <div class="w-10 h-10 md:w-12 md:h-12 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="font-bold text-sm md:text-lg">{{ substr($testimonial['name'], 0, 1) }}</span>
                        </div>
                        <div class="ml-3 md:ml-4">
                            <h4 class="font-semibold text-sm md:text-base">{{ $testimonial['name'] }}</h4>
                            <div class="flex text-yellow-400 text-sm md:text-base">
                                ★★★★★
                            </div>
                        </div>
                    </div>
                    <p class="text-blue-100 text-sm md:text-base">"{{ $testimonial['comment'] }}"</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Additional Info Section -->
    <section class="py-12 md:py-16 bg-gray-800">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8 text-center">
                <div class="bg-gray-700 p-6 rounded-lg border border-gray-600 transform hover:-translate-y-1 transition-all duration-300">
                    <div class="text-blue-400 mb-3">
                        <svg class="w-8 h-8 md:w-12 md:h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg md:text-xl font-bold text-white mb-2">Fast Delivery</h3>
                    <p class="text-gray-300 text-sm md:text-base">Quick shipping across Indonesia</p>
                </div>
                
                <div class="bg-gray-700 p-6 rounded-lg border border-gray-600 transform hover:-translate-y-1 transition-all duration-300">
                    <div class="text-blue-400 mb-3">
                        <svg class="w-8 h-8 md:w-12 md:h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg md:text-xl font-bold text-white mb-2">Quality Guarantee</h3>
                    <p class="text-gray-300 text-sm md:text-base">Premium quality products</p>
                </div>
                
                <div class="bg-gray-700 p-6 rounded-lg border border-gray-600 transform hover:-translate-y-1 transition-all duration-300">
                    <div class="text-blue-400 mb-3">
                        <svg class="w-8 h-8 md:w-12 md:h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg md:text-xl font-bold text-white mb-2">24/7 Support</h3>
                    <p class="text-gray-300 text-sm md:text-base">Always here to help you</p>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    /* Mobile-first responsive design */
    .container {
        max-width: 1200px;
        margin-left: auto;
        margin-right: auto;
    }

    .line-clamp-1 {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
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

    /* Custom scrollbar - Dark Mode */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #1f2937;
    }

    ::-webkit-scrollbar-thumb {
        background: #3b82f6;
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #2563eb;
    }

    /* Smooth animations */
    @keyframes bounce {
        0%, 100% {
            transform: translateY(0) translateX(-50%);
        }
        50% {
            transform: translateY(-10px) translateX(-50%);
        }
    }

    .animate-bounce {
        animation: bounce 2s infinite;
    }

    /* Touch-friendly buttons */
    @media (max-width: 640px) {
        button, a {
            min-height: 44px;
        }
    }

    /* Optimize images for mobile */
    img {
        max-width: 100%;
        height: auto;
    }

    /* Prevent text selection on touch */
    .select-none {
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
</style>
@endsection