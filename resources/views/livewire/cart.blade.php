<div class="container mx-auto px-4 py-8 max-w-6xl">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Keranjang Belanja</h1>
        @if(count($cart) > 0)
            <button 
                wire:click="clear"
                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition-colors duration-300 font-medium"
            >
                Kosongkan Keranjang
            </button>
        @endif
    </div>

    @if(count($cart) > 0)
        <!-- Desktop Table -->
        <div class="hidden md:block bg-white rounded-lg shadow-md overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-700">Produk</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-700">Harga</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-700">Quantity</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-700">Subtotal</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($cart as $productId => $item)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-4">
                                <div class="w-16 h-16 bg-gray-200 rounded-lg overflow-hidden flex items-center justify-center">
                                    @if(isset($item['image']) && $item['image'])
                                        <img src="{{ asset('storage/' . $item['image']) }}" 
                                             alt="{{ $item['name'] }}" 
                                             class="w-full h-full object-cover">
                                    @else
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    @endif
                                </div>
                                <div>
                                    <h3 class="font-medium text-gray-900">{{ $item['name'] }}</h3>
                                    <p class="text-sm text-gray-500">ID: {{ $productId }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-gray-900 font-medium">Rp {{ number_format($item['price'], 0, ',', '.') }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <button 
                                    wire:click="decrement({{ $productId }})"
                                    class="w-8 h-8 flex items-center justify-center border border-gray-300 rounded-lg hover:bg-gray-100 transition-colors duration-200"
                                    {{ $item['quantity'] <= 1 ? 'disabled' : '' }}
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                    </svg>
                                </button>
                                <span class="w-12 text-center font-medium">{{ $item['quantity'] }}</span>
                                <button 
                                    wire:click="increment({{ $productId }})"
                                    class="w-8 h-8 flex items-center justify-center border border-gray-300 rounded-lg hover:bg-gray-100 transition-colors duration-200"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-gray-900 font-medium">Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <button 
                                wire:click="remove({{ $productId }})"
                                class="text-red-500 hover:text-red-700 transition-colors duration-200 p-2"
                                title="Hapus dari keranjang"
                            >
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Mobile View -->
        <div class="md:hidden space-y-4">
            @foreach($cart as $productId => $item)
            <div class="bg-white rounded-lg shadow-md p-4">
                <div class="flex justify-between items-start mb-3">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-gray-200 rounded-lg overflow-hidden flex items-center justify-center flex-shrink-0">
                            @if(isset($item['image']) && $item['image'])
                                <img src="{{ asset('storage/' . $item['image']) }}" 
                                     alt="{{ $item['name'] }}" 
                                     class="w-full h-full object-cover">
                            @else
                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            @endif
                        </div>
                        <div>
                            <h3 class="font-medium text-gray-900">{{ $item['name'] }}</h3>
                            <p class="text-sm text-gray-500">Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
                        </div>
                    </div>
                    <button 
                        wire:click="remove({{ $productId }})"
                        class="text-red-500 hover:text-red-700 transition-colors duration-200"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-2">
                        <button 
                            wire:click="decrement({{ $productId }})"
                            class="w-8 h-8 flex items-center justify-center border border-gray-300 rounded-lg hover:bg-gray-100 transition-colors duration-200"
                            {{ $item['quantity'] <= 1 ? 'disabled' : '' }}
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                            </svg>
                        </button>
                        <span class="w-8 text-center font-medium">{{ $item['quantity'] }}</span>
                        <button 
                            wire:click="increment({{ $productId }})"
                            class="w-8 h-8 flex items-center justify-center border border-gray-300 rounded-lg hover:bg-gray-100 transition-colors duration-200"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                        </button>
                    </div>
                    <span class="font-medium text-gray-900">Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</span>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Order Summary -->
        <div class="mt-8 bg-white rounded-lg shadow-md p-6 max-w-md ml-auto">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Ringkasan Pesanan</h3>
            
            <div class="space-y-3 mb-6">
                <div class="flex justify-between">
                    <span class="text-gray-600">Subtotal</span>
                    <span class="text-gray-900">Rp {{ number_format($total, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Ongkos Kirim</span>
                    <span class="text-gray-900">Gratis</span>
                </div>
                <div class="border-t pt-3 flex justify-between text-lg font-semibold">
                    <span class="text-gray-900">Total</span>
                    <span class="text-blue-600">Rp {{ number_format($total, 0, ',', '.') }}</span>
                </div>
            </div>

            <a 
                href="{{ route('checkout') }}"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-4 rounded-lg transition-colors duration-300 text-center block"
            >
                Lanjut ke Checkout
            </a>
            
            <a 
                href="/shop"
                class="w-full border border-gray-300 text-gray-700 hover:bg-gray-50 font-medium py-3 px-4 rounded-lg transition-colors duration-300 text-center block mt-3"
            >
                Lanjut Belanja
            </a>
        </div>

    @else
        <!-- Empty Cart State -->
        <div class="bg-white rounded-lg shadow-md p-12 text-center">
            <svg class="w-24 h-24 text-gray-400 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5.5M7 13l2.5 5.5m0 0L17 21m-7.5-2.5h9"></path>
            </svg>
            <h3 class="text-2xl font-bold text-gray-900 mb-4">Keranjang Belanja Kosong</h3>
            <p class="text-gray-600 mb-8 max-w-md mx-auto">
                Belum ada produk yang ditambahkan ke keranjang belanja Anda. Mulai jelajahi produk kami dan temukan yang terbaik untuk kebutuhan memancing Anda.
            </p>
            <a 
                href="/shop"
                class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-8 rounded-lg transition-colors duration-300 inline-block"
            >
                Mulai Belanja
            </a>
        </div>
    @endif
</div>