@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Posts Management</h1>
                    <p class="text-gray-600 mt-2">Manage your blog posts, promotions, and tips</p>
                </div>
                <a href="{{ route('posts.create') }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors duration-200 flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    <span>Create New Post</span>
                </a>
            </div>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Posts Grid -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-800">Recent Posts</h2>
            </div>

            @if($posts->count() > 0)
                <div class="divide-y divide-gray-200">
                    @foreach($posts as $post)
                    <div class="px-6 py-4 hover:bg-gray-50 transition-colors duration-150">
                        <div class="flex items-start justify-between">
                            <div class="flex items-start space-x-4 flex-1">
                                @if($post->image)
                                    <div class="w-20 h-20 bg-gray-200 rounded-lg overflow-hidden flex-shrink-0">
                                        <img src="{{ asset('storage/' . $post->image) }}" 
                                             alt="{{ $post->title }}" 
                                             class="w-full h-full object-cover">
                                    </div>
                                @else
                                    <div class="w-20 h-20 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @endif
                                
                                <div class="flex-1">
                                    <div class="flex items-center space-x-2 mb-2">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                            @if($post->type === 'promo') bg-yellow-100 text-yellow-800
                                            @elseif($post->type === 'news') bg-blue-100 text-blue-800
                                            @else bg-green-100 text-green-800
                                            @endif">
                                            {{ ucfirst($post->type) }}
                                        </span>
                                        @if($post->is_published)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                Published
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                                Draft
                                            </span>
                                        @endif
                                    </div>
                                    
                                    <h3 class="text-lg font-semibold text-gray-900 mb-1">{{ $post->title }}</h3>
                                    <p class="text-gray-600 text-sm mb-2">{{ $post->excerpt }}</p>
                                    
                                    <div class="flex items-center space-x-4 text-sm text-gray-500">
                                        <span>Created: {{ $post->created_at->format('M d, Y') }}</span>
                                        @if($post->published_at)
                                            <span>Published: {{ $post->published_at->format('M d, Y') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex items-center space-x-2">
                                <a href="#" class="text-blue-600 hover:text-blue-900 transition-colors duration-200">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </a>
                                <a href="#" class="text-green-600 hover:text-green-900 transition-colors duration-200">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                <form action="#" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 transition-colors duration-200" onclick="return confirm('Are you sure?')">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="px-6 py-12 text-center">
                    <svg class="w-16 h-16 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">No posts found</h3>
                    <p class="mt-2 text-gray-500">Get started by creating your first post.</p>
                    <div class="mt-6">
                        <a href="{{ route('posts.create') }}" 
                           class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Create New Post
                        </a>
                    </div>
                </div>
            @endif
        </div>

        <!-- Pagination or View All -->
        @if($posts->count() > 0)
            <div class="mt-6 flex justify-between items-center">
                <p class="text-sm text-gray-700">
                    Showing {{ $posts->count() }} recent posts
                </p>
                <a href="#" class="text-blue-600 hover:text-blue-900 font-medium text-sm">
                    View all posts →
                </a>
            </div>
        @endif
    </div>
</div>
@endsection