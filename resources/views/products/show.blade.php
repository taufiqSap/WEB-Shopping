@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Product Details</h1>
            <p class="text-gray-600 mt-2">View product information</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('products.edit', $product->id) }}" 
               class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg transition-colors duration-200 flex items-center space-x-2 shadow-sm">
                <i class="fas fa-edit"></i>
                <span>Edit</span>
            </a>
            <a href="{{ route('products.index') }}" 
               class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors duration-200 flex items-center space-x-2 shadow-sm">
                <i class="fas fa-arrow-left"></i>
                <span>Back to Products</span>
            </a>
        </div>
    </div>

    <!-- Product Details Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900 flex items-center">
                <i class="fas fa-info-circle mr-2 text-blue-500"></i>
                Product Information
            </h2>
        </div>

        <div class="p-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Product Image -->
                <div class="flex justify-center">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             alt="{{ $product->name }}" 
                             class="w-full max-w-md h-64 object-cover rounded-2xl shadow-lg">
                    @else
                        <div class="w-full max-w-md h-64 bg-gray-100 rounded-2xl flex items-center justify-center">
                            <div class="text-center">
                                <i class="fas fa-image text-4xl text-gray-400 mb-3"></i>
                                <p class="text-gray-500">No image available</p>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Product Details -->
                <div class="space-y-6">
                    <!-- Basic Info -->
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $product->name }}</h3>
                        <div class="flex items-center space-x-4 mb-4">
                            <span class="text-3xl font-bold text-green-600">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $product->stock > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $product->stock }} in stock
                            </span>
                        </div>
                    </div>

                    <!-- Details Grid -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="text-sm font-medium text-gray-500">Category ID</label>
                            <p class="text-gray-900 font-semibold">{{ $product->category_id }}</p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-500">Product ID</label>
                            <p class="text-gray-900 font-semibold">#{{ $product->id }}</p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-500">Created</label>
                            <p class="text-gray-900">{{ $product->created_at->format('d M Y') }}</p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-500">Last Updated</label>
                            <p class="text-gray-900">{{ $product->updated_at->format('d M Y') }}</p>
                        </div>
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="text-sm font-medium text-gray-500 block mb-2">Description</label>
                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                            <p class="text-gray-700 leading-relaxed">{{ $product->description }}</p>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex space-x-3 pt-4">
                        <a href="{{ route('products.edit', $product->id) }}" 
                           class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition-colors duration-200 flex items-center space-x-2 flex-1 justify-center">
                            <i class="fas fa-edit"></i>
                            <span>Edit Product</span>
                        </a>
                        <form action="{{ route('products.destroy', $product->id) }}" 
                              method="POST" 
                              class="flex-1"
                              onsubmit="return confirm('Are you sure you want to delete this product?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="w-full bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg transition-colors duration-200 flex items-center space-x-2 justify-center">
                                <i class="fas fa-trash"></i>
                                <span>Delete</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stock Status Alert -->
    @if($product->stock == 0)
    <div class="mt-6 bg-red-50 border border-red-200 rounded-2xl p-4">
        <div class="flex items-center">
            <i class="fas fa-exclamation-triangle text-red-500 mr-3"></i>
            <div>
                <h4 class="text-red-800 font-semibold">Out of Stock</h4>
                <p class="text-red-600 text-sm">This product is currently out of stock. Consider updating the stock quantity.</p>
            </div>
        </div>
    </div>
    @elseif($product->stock < 10)
    <div class="mt-6 bg-yellow-50 border border-yellow-200 rounded-2xl p-4">
        <div class="flex items-center">
            <i class="fas fa-exclamation-circle text-yellow-500 mr-3"></i>
            <div>
                <h4 class="text-yellow-800 font-semibold">Low Stock</h4>
                <p class="text-yellow-600 text-sm">This product is running low on stock. Consider restocking soon.</p>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection