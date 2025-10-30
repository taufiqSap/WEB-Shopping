<div class="container mx-auto px-4 py-8">
    <!-- Success Message -->
    @if(session()->has('success'))
        <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg flex items-center">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    <!-- Error Message -->
    @if(session()->has('error'))
        <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg flex items-center">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
            </svg>
            {{ session('error') }}
        </div>
    @endif

    <!-- Page Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-white">Online Shopping</h1>
        <p class="text-gray-600 mt-2">Found the special product and cheap products here</p>
    </div>

    <!-- Products Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($products as $product)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <!-- Product Image -->
                <div class="h-48 bg-gray-200 flex items-center justify-center">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="h-full w-full object-cover">
                    @else
                        <svg class="h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    @endif
                </div>

                <!-- Product Info -->
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $product->name }}</h3>
                    <p class="text-gray-600 text-sm mb-3 line-clamp-2">{{ $product->description ?? 'Deskripsi produk tidak tersedia' }}</p>
                    
                    <!-- Price -->
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-2xl font-bold text-blue-600">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        @if($product->stock > 0)
                            <span class="text-sm text-green-600 bg-green-100 px-2 py-1 rounded-full">
                                Stok: {{ $product->stock }}
                            </span>
                        @else
                            <span class="text-sm text-red-600 bg-red-100 px-2 py-1 rounded-full">
                                Stok Habis
                            </span>
                        @endif
                    </div>

                    <!-- Add to Cart Button -->
                    <button 
                        wire:click="addToCart({{ $product->id }})"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition duration-200 flex items-center justify-center disabled:bg-gray-400 disabled:cursor-not-allowed"
                        {{ $product->stock <= 0 ? 'disabled' : '' }}
                    >
                        @if($product->stock > 0)
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Tambah ke Keranjang
                        @else
                            Stok Habis
                        @endif
                    </button>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Empty State -->
    @if($products->count() == 0)
        <div class="text-center py-12">
            <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2M4 13h2m8-8V4a1 1 0 00-1-1h-2a1 1 0 00-1 1v1M9 7h6"></path>
            </svg>
            <h3 class="mt-4 text-lg font-medium text-gray-900">Tidak ada produk</h3>
            <p class="mt-1 text-gray-500">Belum ada produk yang tersedia di toko.</p>
        </div>
    @endif
</div>

<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>