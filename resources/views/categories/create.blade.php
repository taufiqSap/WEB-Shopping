@extends('layouts.app')

@section('title', 'Create Category')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Create New Category</h1>
            <p class="text-gray-600 mt-2">Add a new product category to your store</p>
        </div>
        <a href="{{ route('categories.index') }}" 
           class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors duration-200 flex items-center space-x-2 shadow-sm">
            <i class="fas fa-arrow-left"></i>
            <span>Back to Categories</span>
        </a>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6 flex items-center">
            <i class="fas fa-check-circle mr-2"></i>
            {{ session('success') }}
        </div>
    @endif

    <!-- Form Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900 flex items-center">
                <i class="fas fa-tags mr-2 text-blue-500"></i>
                Category Information
            </h2>
        </div>

        <form action="{{ route('categories.store') }}" method="POST" class="p-6">
            @csrf

            <div class="space-y-6">
                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                        Category Name <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        value="{{ old('name') }}"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('name') border-red-500 @enderror"
                        placeholder="Enter category name (e.g., Fishing Rods, Baits, etc.)"
                    >
                    @error('name')
                        <p class="text-red-500 text-sm mt-2 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            {{ $message }}
                        </p>
                    @enderror
                    <p class="text-gray-500 text-sm mt-2">
                        The name of your category as it will appear to customers.
                    </p>
                </div>

                <!-- Slug Field -->
                <div>
                    <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">
                        Category Slug <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="slug" 
                        name="slug" 
                        value="{{ old('slug') }}"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('slug') border-red-500 @enderror"
                        placeholder="Enter URL-friendly slug (e.g., fishing-rods, baits)"
                    >
                    @error('slug')
                        <p class="text-red-500 text-sm mt-2 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            {{ $message }}
                        </p>
                    @enderror
                    <p class="text-gray-500 text-sm mt-2">
                        The URL-friendly version of the name. Use lowercase letters, numbers, and hyphens only.
                    </p>
                </div>

                <!-- Preview Section -->
                <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                    <h3 class="text-sm font-medium text-gray-700 mb-3 flex items-center">
                        <i class="fas fa-eye mr-2 text-gray-500"></i>
                        Preview
                    </h3>
                    <div class="flex items-center space-x-3">
                        <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                        <span id="namePreview" class="text-gray-600">
                            {{ old('name', 'Category name will appear here') }}
                        </span>
                        <span class="text-gray-400 text-sm">→</span>
                        <span id="slugPreview" class="text-blue-600 text-sm bg-blue-50 px-2 py-1 rounded">
                            {{ old('slug', 'category-slug') }}
                        </span>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                    <a href="{{ route('categories.index') }}" 
                       class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-6 py-3 rounded-lg transition-colors duration-200 flex items-center space-x-2">
                        <i class="fas fa-times"></i>
                        <span>Cancel</span>
                    </a>
                    <button 
                        type="submit" 
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition-colors duration-200 flex items-center space-x-2 shadow-sm">
                        <i class="fas fa-save"></i>
                        <span>Create Category</span>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Tips Section -->
    <div class="mt-8 bg-blue-50 rounded-2xl p-6 border border-blue-200">
        <h3 class="text-lg font-semibold text-blue-900 mb-3 flex items-center">
            <i class="fas fa-lightbulb mr-2 text-yellow-500"></i>
            Tips for Creating Categories
        </h3>
        <ul class="space-y-2 text-blue-800">
            <li class="flex items-start">
                <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                <span>Use clear, descriptive names that customers will understand</span>
            </li>
            <li class="flex items-start">
                <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                <span>Keep slugs short and URL-friendly</span>
            </li>
            <li class="flex items-start">
                <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                <span>Organize categories in a logical hierarchy</span>
            </li>
            <li class="flex items-start">
                <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                <span>Avoid special characters in slugs</span>
            </li>
        </ul>
    </div>
</div>

<script>
    // Auto-generate slug from name
    document.getElementById('name').addEventListener('input', function() {
        const name = this.value;
        const slug = name
            .toLowerCase()
            .trim()
            .replace(/[^\w\s-]/g, '')
            .replace(/[\s_-]+/g, '-')
            .replace(/^-+|-+$/g, '');
        
        document.getElementById('slug').value = slug;
        updatePreview();
    });

    // Update preview in real-time
    document.getElementById('slug').addEventListener('input', updatePreview);
    document.getElementById('name').addEventListener('input', updatePreview);

    function updatePreview() {
        const name = document.getElementById('name').value || 'Category name will appear here';
        const slug = document.getElementById('slug').value || 'category-slug';
        
        document.getElementById('namePreview').textContent = name;
        document.getElementById('slugPreview').textContent = slug;
    }

    // Initialize preview on page load
    document.addEventListener('DOMContentLoaded', updatePreview);
</script>
@endsection