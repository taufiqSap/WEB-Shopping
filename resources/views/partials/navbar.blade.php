<nav class="bg-white shadow-lg py-3 px-6 md:px-8 flex justify-between items-center fixed top-0 left-0 right-0 z-50 border-b border-gray-100">
    <!-- Logo dan Nama Perusahaan -->
    <div class="flex items-center gap-3">
        <a href="/" class="flex items-center gap-3 hover:opacity-80 transition-opacity duration-300">
            <!-- Logo -->
            <div class="relative">
                <img src="{{ asset('assets/logo.jpg') }}" alt="Sentul Fishing Logo" class="w-12 h-12 md:w-14 md:h-14 object-contain rounded-lg">
            </div>
            <!-- Nama Perusahaan -->
            <div class="hidden sm:block">
                <div class="text-xl md:text-2xl font-bold text-blue-800 tracking-tight">SF</div>
                <div class="text-sm text-gray-600 font-medium">Sentul Fishing</div>
            </div>
        </a>
    </div>
    
    <!-- Desktop Navigation -->
    <ul class="hidden md:flex gap-6 lg:gap-8 items-center">
        <li>
            <a href="/" class="text-gray-700 font-medium hover:text-blue-500 transition-all duration-300 relative after:content-[''] after:absolute after:w-0 after:h-0.5 after:bg-blue-500 after:left-0 after:-bottom-1 hover:after:w-full after:transition-all after:duration-300 py-2">
                Home
            </a>
        </li>
        <li>
            <a href="/about" class="text-gray-700 font-medium hover:text-blue-500 transition-all duration-300 relative after:content-[''] after:absolute after:w-0 after:h-0.5 after:bg-blue-500 after:left-0 after:-bottom-1 hover:after:w-full after:transition-all after:duration-300 py-2">
                About Us
            </a>
        </li>
        <li>
            <a href="/blog" class="text-gray-700 font-medium hover:text-blue-500 transition-all duration-300 relative after:content-[''] after:absolute after:w-0 after:h-0.5 after:bg-blue-500 after:left-0 after:-bottom-1 hover:after:w-full after:transition-all after:duration-300 py-2">
                Blog
            </a>
        </li>
        <li>
            <a href="/new-arrivals" class="text-gray-700 font-medium hover:text-blue-500 transition-all duration-300 relative after:content-[''] after:absolute after:w-0 after:h-0.5 after:bg-blue-500 after:left-0 after:-bottom-1 hover:after:w-full after:transition-all after:duration-300 py-2">
                New Arrival
            </a>
        </li>
        <li>
            <a href="/shop" class="text-gray-700 font-medium hover:text-blue-500 transition-all duration-300 relative after:content-[''] after:absolute after:w-0 after:h-0.5 after:bg-blue-500 after:left-0 after:-bottom-1 hover:after:w-full after:transition-all after:duration-300 py-2">
                Shop
            </a>
        </li>
    </ul>

    <!-- Right Side - Cart Only -->
    <div class="flex items-center gap-3 md:gap-4">
        <!-- Cart Icon -->
        <a href="/cart" class="relative p-2 text-gray-700 hover:text-blue-500 transition-colors duration-300 group">
            <svg class="w-5 h-5 md:w-6 md:h-6 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5.5M7 13l2.5 5.5m0 0L17 21m-7.5-2.5h9"></path>
            </svg>
            <span class="absolute -top-1 -right-1 bg-blue-500 text-white text-xs rounded-full w-4 h-4 md:w-5 md:h-5 flex items-center justify-center text-[10px] md:text-xs cart-count">
                0
            </span>
        </a>

        <!-- Mobile Menu Button -->
        <button id="mobileMenuButton" class="md:hidden p-2 text-gray-700 hover:text-blue-500 transition-colors duration-300">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>
</nav>

<!-- Mobile Menu -->
<div id="mobileMenu" class="fixed top-16 left-0 right-0 bg-white shadow-lg border-t border-gray-200 z-40 transform -translate-y-full transition-transform duration-300 md:hidden">
    <div class="px-6 py-4 space-y-4">
        <!-- Logo di Mobile Menu -->
        <div class="flex items-center gap-3 pb-4 border-b border-gray-200">
            <img src="{{ asset('logo.jpg') }}" alt="Sentul Fishing Logo" class="w-10 h-10 object-contain rounded-lg">
            <div>
                <div class="text-lg font-bold text-blue-800">5F</div>
                <div class="text-xs text-gray-600">Sentul Fishing</div>
            </div>
        </div>
        
        <a href="/about" class="block py-3 text-gray-700 hover:text-blue-500 border-b border-gray-100 font-medium transition-colors duration-300">
            About Us
        </a>
        <a href="/blog" class="block py-3 text-gray-700 hover:text-blue-500 border-b border-gray-100 font-medium transition-colors duration-300">
            Blog
        </a>
        <a href="/new-arrivals" class="block py-3 text-gray-700 hover:text-blue-500 border-b border-gray-100 font-medium transition-colors duration-300">
            New Arrival
        </a>
        <a href="/shop" class="block py-3 text-gray-700 hover:text-blue-500 border-b border-gray-100 font-medium transition-colors duration-300">
            Shop
        </a>
        <a href="/cart" class="block py-3 text-gray-700 hover:text-blue-500 border-b border-gray-100 font-medium transition-colors duration-300 flex items-center">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5.5M7 13l2.5 5.5m0 0L17 21m-7.5-2.5h9"></path>
            </svg>
            Keranjang (<span class="cart-count">0</span>)
        </a>
    </div>
</div>

<!-- Spacer untuk konten -->
<div class="h-16"></div>