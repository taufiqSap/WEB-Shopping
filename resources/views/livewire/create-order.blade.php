<div class="container mx-auto px-4 py-8 max-w-7xl">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Form Section -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Checkout</h2>

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

                <form wire:submit.prevent="submitOrder" class="space-y-6">
                    <!-- Customer Information -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Informasi Pelanggan
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Customer Name -->
                            <div>
                                <label for="customer_name" class="block text-sm font-medium text-gray-700 mb-1">
                                    Nama Lengkap <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    id="customer_name"
                                    wire:model="customer_name" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('customer_name') border-red-500 @enderror"
                                    placeholder="Masukkan nama lengkap"
                                >
                                @error('customer_name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Customer Email -->
                            <div>
                                <label for="customer_email" class="block text-sm font-medium text-gray-700 mb-1">
                                    Email <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="email" 
                                    id="customer_email"
                                    wire:model="customer_email" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('customer_email') border-red-500 @enderror"
                                    placeholder="contoh@email.com"
                                >
                                @error('customer_email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Customer Phone -->
                        <div class="mt-4">
                            <label for="customer_phone" class="block text-sm font-medium text-gray-700 mb-1">
                                Nomor Telepon <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="tel" 
                                id="customer_phone"
                                wire:model="customer_phone" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('customer_phone') border-red-500 @enderror"
                                placeholder="08xxxxxxxxxx"
                            >
                            @error('customer_phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Shipping Address -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Alamat Pengiriman
                        </h3>

                        <label for="shipping_address" class="block text-sm font-medium text-gray-700 mb-1">
                            Alamat Lengkap <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            id="shipping_address"
                            wire:model="shipping_address" 
                            rows="4"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('shipping_address') border-red-500 @enderror"
                            placeholder="Jalan, RT/RW, Kelurahan, Kecamatan, Kota, Provinsi, Kode Pos"
                        ></textarea>
                        @error('shipping_address')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Payment Method -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                            </svg>
                            Metode Pembayaran
                        </h3>

                        <div class="space-y-3">
                            <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors">
                                <input 
                                    type="radio" 
                                    wire:model="payment_method" 
                                    value="qris"
                                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300"
                                >
                                <div class="ml-3 flex items-center">
                                    <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path>
                                    </svg>
                                    <span class="font-medium text-gray-900">QRIS</span>
                                </div>
                            </label>

                            <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors">
                                <input 
                                    type="radio" 
                                    wire:model="payment_method" 
                                    value="bank_transfer"
                                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300"
                                >
                                <div class="ml-3 flex items-center">
                                    <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
                                    </svg>
                                    <span class="font-medium text-gray-900">Transfer Bank</span>
                                </div>
                            </label>

                            <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors">
                                <input 
                                    type="radio" 
                                    wire:model="payment_method" 
                                    value="cod"
                                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300"
                                >
                                <div class="ml-3 flex items-center">
                                    <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    <span class="font-medium text-gray-900">Cash on Delivery (COD)</span>
                                </div>
                            </label>
                        </div>
                        @error('payment_method')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4 flex gap-4">
                        <a 
                            href="{{ route('cart') }}"
                            class="flex-1 border border-gray-300 text-gray-700 hover:bg-gray-50 font-medium py-3 px-6 rounded-lg transition-colors duration-300 text-center"
                        >
                            Kembali ke Keranjang
                        </a>
                        <button 
                            type="submit"
                            class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-lg transition-colors duration-300 flex items-center justify-center"
                        >
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Buat Pesanan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow-md p-6 sticky top-24">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Ringkasan Pesanan</h3>
                
                <!-- Cart Items -->
                <div class="space-y-3 mb-6 max-h-64 overflow-y-auto">
                    @foreach($cart as $id => $item)
                        <div class="flex justify-between items-start py-2 border-b border-gray-200">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900">{{ $item['name'] }}</p>
                                <p class="text-xs text-gray-500">Qty: {{ $item['quantity'] }} × Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
                            </div>
                            <p class="text-sm font-medium text-gray-900 ml-4">
                                Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                            </p>
                        </div>
                    @endforeach
                </div>

                <!-- Pricing Details -->
                <div class="space-y-3 mb-6">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Subtotal</span>
                        <span class="text-gray-900">Rp {{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Ongkos Kirim</span>
                        <span class="text-green-600 font-medium">Gratis</span>
                    </div>
                    <div class="border-t pt-3 flex justify-between text-lg font-bold">
                        <span class="text-gray-900">Total</span>
                        <span class="text-blue-600">Rp {{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                </div>

                <!-- Security Badge -->
                <div class="bg-gray-50 p-4 rounded-lg">
                    <div class="flex items-center text-sm text-gray-600">
                        <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                        <span>Transaksi Aman & Terpercaya</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>