<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">New Arrivals</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($products as $product)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <!-- Product Image -->
                <div class="h-48 bg-gray-200 flex items-center justify-center">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="h-full w-full object-cover">
                    @else
                        <span class="text-gray-400">No Image</span>
                    @endif
                </div>
                
                <!-- Product Info -->
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $product->name }}</h3>
                    <p class="text-gray-600 text-sm mb-3 line-clamp-2">{{ $product->description }}</p>
                    
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-blue-600">${{ number_format($product->price, 2) }}</span>
                        
                        @if($product->stock > 0)
                            <span class="text-green-600 text-sm font-medium">In Stock ({{ $product->stock }})</span>
                        @else
                            <span class="text-red-600 text-sm font-medium">Out of Stock</span>
                        @endif
                    </div>
                    
                    <button class="w-full mt-4 bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md transition-colors duration-200">
                        Add to Cart
                    </button>
                </div>
            </div>
        @endforeach
    </div>
    
    @if($products->isEmpty())
        <div class="text-center py-8">
            <p class="text-gray-500 text-lg">No new products available</p>
        </div>
    @endif
</div>