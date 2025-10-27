<nav class="fixed top-0 left-0 right-0 bg-white shadow-lg z-50 border-b border-gray-200">
    <div class="flex justify-between items-center px-6 py-4">
        <!-- Brand -->
        <a href="{{ route('dashboard.index') }}" class="flex items-center space-x-2">
            <div class="w-8 h-8 bg-gradient-to-r from-blue-600 to-blue-800 rounded-lg flex items-center justify-center">
                <i class="fas fa-fish text-white text-sm"></i>
            </div>
            <span class="text-xl font-bold text-gray-800">Admin</span>
        </a>

        <!-- User Info & Logout -->
        <div class="flex items-center space-x-4">
            <span class="text-sm text-gray-600 bg-gray-100 px-3 py-1 rounded-full">
                <i class="fas fa-user-circle mr-2 text-blue-500"></i>
                Hello, {{ Auth::user()->name }}
            </span>
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition-colors duration-200 flex items-center space-x-2 shadow-sm">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </div>
</nav>

<!-- Spacer for fixed navbar -->
<div class="h-16"></div>