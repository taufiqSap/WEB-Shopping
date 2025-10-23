@extends('layouts.guest')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Hero Section -->
    <section class="relative bg-blue-900 text-white py-20">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-5xl font-bold mb-4">SENTUL FISHING</h1>
            <p class="text-2xl mb-8">PREMIUM FISHING GEAR</p>
            <div class="bg-red-600 inline-block px-6 py-2 rounded-full">
                <span class="text-xl font-bold">ULTIMATE SALE</span>
            </div>
        </div>
    </section>

    <!-- Brands Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">TOP BRANDS</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                @foreach(['SHIMANO', 'DAIWA', 'PENN', 'ABU GARCIA'] as $brand)
                <div class="bg-gray-100 p-6 rounded-lg text-center hover:shadow-lg transition-shadow">
                    <div class="h-16 flex items-center justify-center">
                        <span class="text-xl font-bold text-gray-700">{{ $brand }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- New Arrivals -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">New Arrivals</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach(range(1, 3) as $item)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow">
                    <div class="h-48 bg-blue-200 flex items-center justify-center">
                        <span class="text-gray-600">Fishing Rod {{ $item }}</span>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold mb-2">Premium Fishing Rod {{ $item }}</h3>
                        <p class="text-gray-600 mb-4">Latest technology for better fishing experience</p>
                        <div class="flex justify-between items-center">
                            <span class="text-blue-600 font-bold">Rp 450.000</span>
                            <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition-colors">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Social Media -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Follow Us On Instagram</h2>
            <p class="text-gray-600 mb-8">@SentulFishing</p>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach(range(1, 4) as $post)
                <div class="aspect-square bg-gray-200 rounded-lg flex items-center justify-center">
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
                <div class="bg-blue-800 p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center">
                            <span class="font-bold">{{ substr($testimonial['name'], 0, 1) }}</span>
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
        
        .text-5xl {
            font-size: 2.5rem;
        }
        
        .text-2xl {
            font-size: 1.25rem;
        }
    }
</style>
@endsection