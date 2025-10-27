@extends('layouts.app')

@section('title', 'Categories')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Categories</h1>
            <p class="text-gray-600 mt-2">Manage your product categories</p>
        </div>
        <a href="{{ route('categories.create') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors duration-200 flex items-center space-x-2 shadow-sm">
            <i class="fas fa-plus"></i>
            <span>Add Category</span>
        </a>
    </div>

    <!-- Categories Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($categories as $category)
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow duration-200">
            <div class="flex justify-between items-start mb-4">
                <h3 class="text-lg font-semibold text-gray-900">{{ $category->name }}</h3>
                <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">
                    {{ $category->products_count ?? 0 }} products
                </span>
            </div>
            <p class="text-gray-600 text-sm mb-4">
                Slug: <code class="bg-gray-100 px-2 py-1 rounded text-blue-600">{{ $category->slug }}</code>
            </p>
            <div class="flex justify-between items-center">
                <span class="text-gray-500 text-sm">
                    Created {{ $category->created_at->diffForHumans() }}
                </span>
                <div class="flex space-x-2">
                    <a href="#" class="text-blue-600 hover:text-blue-800 transition-colors duration-200">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="#" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800 transition-colors duration-200"
                                onclick="return confirm('Are you sure you want to delete this category?')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-3 text-center py-12">
            <div class="bg-gray-50 rounded-2xl p-8 border border-gray-200">
                <i class="fas fa-tags text-4xl text-gray-300 mb-4"></i>
                <h3 class="text-lg font-medium text-gray-900 mb-2">No categories yet</h3>
                <p class="text-gray-600 mb-4">Get started by creating your first category</p>
                <a href="{{ route('categories.create') }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition-colors duration-200 inline-flex items-center space-x-2">
                    <i class="fas fa-plus"></i>
                    <span>Create Category</span>
                </a>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection