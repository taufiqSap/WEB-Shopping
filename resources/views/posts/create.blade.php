@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Create New Post</h1>
                    <p class="text-gray-600 mt-2">Add a new blog post, promotion, or tip</p>
                </div>
                <a href="{{ route('posts.index') }}" 
                   class="text-gray-600 hover:text-gray-900 font-medium flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <span>Back to Posts</span>
                </a>
            </div>
        </div>

        <!-- Form -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="px-6 py-6 space-y-6">
                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                        <input type="text" 
                               name="title" 
                               id="title"
                               value="{{ old('title') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                               required>
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Slug -->
                    <div>
                        <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">Slug</label>
                        <input type="text" 
                               name="slug" 
                               id="slug"
                               value="{{ old('slug') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                               placeholder="Auto-generated if empty">
                        @error('slug')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image -->
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Featured Image</label>
                        <input type="file" 
                               name="image" 
                               id="image"
                               accept="image/*"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Excerpt -->
                    <div>
                        <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-2">Excerpt *</label>
                        <textarea name="excerpt" 
                                  id="excerpt"
                                  rows="3"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                  required>{{ old('excerpt') }}</textarea>
                        @error('excerpt')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Content -->
                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content *</label>
                        <textarea name="content" 
                                  id="content"
                                  rows="10"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                  required>{{ old('content') }}</textarea>
                        @error('content')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Type and Status -->
                    <div class="grid grid-cols-2 gap-6">
                        <!-- Type -->
                        <div>
                            <label for="type" class="block text-sm font-medium text-gray-700 mb-2">Type *</label>
                            <select name="type" 
                                    id="type"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                    required>
                                <option value="">Select Type</option>
                                <option value="promo" {{ old('type') == 'promo' ? 'selected' : '' }}>Promo</option>
                                <option value="news" {{ old('type') == 'news' ? 'selected' : '' }}>News</option>
                                <option value="tips" {{ old('type') == 'tips' ? 'selected' : '' }}>Tips</option>
                            </select>
                            @error('type')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div>
                            <label for="is_published" class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
                            <select name="is_published" 
                                    id="is_published"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                    required>
                                <option value="1" {{ old('is_published') == '1' ? 'selected' : '' }}>Published</option>
                                <option value="0" {{ old('is_published') == '0' ? 'selected' : '' }}>Draft</option>
                            </select>
                            @error('is_published')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Published At -->
                    <div>
                        <label for="published_at" class="block text-sm font-medium text-gray-700 mb-2">Publish Date</label>
                        <input type="datetime-local" 
                               name="published_at" 
                               id="published_at"
                               value="{{ old('published_at') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('published_at')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end space-x-3">
                    <a href="{{ route('posts.index') }}" 
                       class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Create Post
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Auto-generate slug from title
    document.getElementById('title').addEventListener('input', function() {
        const title = this.value;
        const slugInput = document.getElementById('slug');
        
        if (!slugInput.value) {
            slugInput.value = title.toLowerCase()
                .replace(/[^\w ]+/g, '')
                .replace(/ +/g, '-');
        }
    });
</script>
@endsection