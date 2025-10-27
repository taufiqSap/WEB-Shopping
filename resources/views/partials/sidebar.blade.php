<aside class="w-64 bg-white shadow-lg min-h-screen fixed left-0 top-16 border-r border-gray-200">
    <div class="p-6">
    
        <nav>
            <ul class="space-y-1">
                <li>
                    <a href="{{ route('dashboard.index') }}" 
                       class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('dashboard*') ? 'bg-blue-50 text-blue-600 border-l-4 border-blue-600 font-semibold' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }}">
                        <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center mr-3">
                            <svg class="w-4 h-4 {{ request()->routeIs('dashboard*') ? 'text-blue-600' : 'text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                        </div>
                        Dashboard
                    </a>
                </li>
                
                <li>
                    <a href="{{ route('categories.index') }}" 
                       class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('categories*') ? 'bg-green-50 text-green-600 border-l-4 border-green-600 font-semibold' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }}">
                        <div class="w-8 h-8 rounded-lg bg-green-100 flex items-center justify-center mr-3">
                            <svg class="w-4 h-4 {{ request()->routeIs('categories*') ? 'text-green-600' : 'text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                        </div>
                        Categories
                    </a>
                </li>
                
                <li>
                    <button onclick="toggleProductsDropdown()" 
                            class="w-full flex items-center justify-between px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('products*') ? 'bg-purple-50 text-purple-600 border-l-4 border-purple-600 font-semibold' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }}">
                        <div class="flex items-center">
                            <div class="w-8 h-8 rounded-lg bg-purple-100 flex items-center justify-center mr-3">
                                <svg class="w-4 h-4 {{ request()->routeIs('products*') ? 'text-purple-600' : 'text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                            </div>
                            Products
                        </div>
                        <svg id="products-dropdown-icon" class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    
                    <!-- Dropdown Menu -->
                    <ul id="products-dropdown" class="hidden mt-2 ml-4 space-y-1">
                        <li>
                            <a href="{{ route('products.index') }}" 
                               class="flex items-center px-4 py-2 rounded-lg transition-all duration-200 {{ request()->routeIs('products.index') && !request()->has('category') ? 'bg-purple-50 text-purple-600' : 'text-gray-600 hover:bg-gray-50' }}">
                                <span class="text-sm">All Products</span>
                            </a>
                        </li>
                        @php
                            $categories = \App\Models\Category::orderBy('name')->get();
                        @endphp
                        @foreach($categories as $category)
                        <li>
                            <a href="{{ route('products.index', ['category' => $category->slug]) }}" 
                               class="flex items-center px-4 py-2 rounded-lg transition-all duration-200 {{ request()->get('category') == $category->slug ? 'bg-purple-50 text-purple-600' : 'text-gray-600 hover:bg-gray-50' }}">
                                <span class="text-sm">{{ $category->name }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>

<script>
function toggleProductsDropdown() {
    const dropdown = document.getElementById('products-dropdown');
    const icon = document.getElementById('products-dropdown-icon');
    dropdown.classList.toggle('hidden');
    icon.classList.toggle('rotate-180');
}

// Auto-expand dropdown if on products page
document.addEventListener('DOMContentLoaded', function() {
    if (window.location.pathname.includes('/products')) {
        const dropdown = document.getElementById('products-dropdown');
        const icon = document.getElementById('products-dropdown-icon');
        dropdown.classList.remove('hidden');
        icon.classList.add('rotate-180');
    }
});
</script>