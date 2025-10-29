<div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Buat Pesanan</h2>

    <!-- Success Message -->
    @if(session()->has('success'))
        <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- Error Message -->
    @if(session()->has('error'))
        <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
            {{ session('error') }}
        </div>
    @endif

    <form wire:submit.prevent="submitOrder" class="space-y-6">
        <!-- Customer Name -->
        <div>
            <label for="customer_name" class="block text-sm font-medium text-gray-700 mb-1">
                Nama Lengkap *
            </label>
            <input 
                type="text" 
                id="customer_name"
                wire:model="customer_name" 
                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Masukkan nama lengkap"
                required
            >
            @error('customer_name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Customer Email -->
        <div>
            <label for="customer_email" class="block text-sm font-medium text-gray-700 mb-1">
                Email *
            </label>
            <input 
                type="email" 
                id="customer_email"
                wire:model="customer_email" 
                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Masukkan alamat email"
                required
            >
            @error('customer_email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Customer Phone -->
        <div>
            <label for="customer_phone" class="block text-sm font-medium text-gray-700 mb-1">
                Nomor Telepon *
            </label>
            <input 
                type="tel" 
                id="customer_phone"
                wire:model="customer_phone" 
                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Masukkan nomor telepon"
                required
            >
            @error('customer_phone')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Shipping Address -->
        <div>
            <label for="shipping_address" class="block text-sm font-medium text-gray-700 mb-1">
                Alamat Pengiriman *
            </label>
            <textarea 
                id="shipping_address"
                wire:model="shipping_address" 
                rows="4"
                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Masukkan alamat lengkap pengiriman"
                required
            ></textarea>
            @error('shipping_address')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Payment Method -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-3">
                Metode Pembayaran
            </label>
            <div class="space-y-2">
                <div class="flex items-center">
                    <input 
                        type="radio" 
                        id="qris"
                        wire:model="payment_method" 
                        value="qris"
                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300"
                        checked
                    >
                    <label for="qris" class="ml-3 block text-sm font-medium text-gray-700">
                        QRIS
                    </label>
                </div>
                <div class="flex items-center">
                    <input 
                        type="radio" 
                        id="bank_transfer"
                        wire:model="payment_method" 
                        value="bank_transfer"
                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300"
                    >
                    <label for="bank_transfer" class="ml-3 block text-sm font-medium text-gray-700">
                        Transfer Bank
                    </label>
                </div>
                <div class="flex items-center">
                    <input 
                        type="radio" 
                        id="cod"
                        wire:model="payment_method" 
                        value="cod"
                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300"
                    >
                    <label for="cod" class="ml-3 block text-sm font-medium text-gray-700">
                        Cash on Delivery (COD)
                    </label>
                </div>
            </div>
            @error('payment_method')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="pt-4">
            <button 
                type="submit"
                class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-200"
            >
                Buat Pesanan
            </button>
        </div>
    </form>

    <!-- Cart Summary (Optional) -->
    @if(count(session()->get('cart', [])) > 0)
        <div class="mt-8 pt-6 border-t border-gray-200">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Ringkasan Keranjang</h3>
            <div class="space-y-3">
                @foreach(session()->get('cart', []) as $id => $item)
                    <div class="flex justify-between items-center py-2">
                        <div>
                            <p class="text-sm font-medium text-gray-900">{{ $item['name'] ?? 'Produk' }}</p>
                            <p class="text-sm text-gray-500">Qty: {{ $item['quantity'] }}</p>
                        </div>
                        <p class="text-sm font-medium text-gray-900">
                            Rp {{ number_format(($item['price'] ?? 0) * $item['quantity'], 0, ',', '.') }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>