<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Sentul Fishing</title>
       @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .slider-container {
            perspective: 1000px;
        }
        .slider {
            transform-style: preserve-3d;
            transition: transform 0.8s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }
        .slide {
            backface-visibility: hidden;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        .slide-2 {
            transform: rotateY(180deg);
        }
        .slider.flipped {
            transform: rotateY(180deg);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-blue-100 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-md w-full bg-white rounded-2xl shadow-xl overflow-hidden relative h-[500px]">
        <!-- Slider Container -->
        <div class="slider-container w-full h-full">
            <div id="slider" class="slider w-full h-full">
                <!-- Slide 1: Welcome Message -->
                <div class="slide slide-1 flex flex-col justify-center items-center p-8 text-center bg-gradient-to-br from-blue-600 to-blue-800 text-white">
                    <div class="mb-6">
                        <svg class="w-16 h-16 mx-auto mb-4 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold mb-4">Halo Admin!</h2>
                    <p class="text-blue-100 text-lg mb-8 leading-relaxed">
                        Selamat datang di Sistem Admin<br>Sentul Fishing
                    </p>
                    <button onclick="nextSlide()" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-blue-50 transition-all duration-300 transform hover:scale-105">
                        Masuk ke Sistem ›
                    </button>
                </div>

                <!-- Slide 2: Login Form -->
                <div class="slide slide-2 bg-white">
                    <!-- Back Button -->
                    <button onclick="prevSlide()" class="absolute top-4 left-4 text-gray-500 hover:text-gray-700 transition-colors duration-200 z-10">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>

                    <!-- Header -->
                    <div class="bg-gradient-to-r from-gray-800 to-blue-900 py-6 px-6 text-center">
                        <h1 class="text-2xl font-bold text-white">Sentul Fishing</h1>
                        <p class="text-blue-200 text-sm mt-1">Admin Portal</p>
                    </div>

                    <!-- Form -->
                    <form method="POST" action="{{ route('login') }}" class="p-8 pt-6">
                        @csrf

                        <!-- Email Input -->
                        <div class="mb-6">
                            <label for="email" class="block text-gray-700 text-sm font-medium mb-2">
                                Email Admin
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                    </svg>
                                </div>
                                <input 
                                    id="email" 
                                    type="email" 
                                    name="email" 
                                    value="{{ old('email') }}" 
                                    required 
                                    autofocus
                                    class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                                    placeholder="admin@sentulfishing.com"
                                >
                            </div>
                        </div>

                        <!-- Password Input -->
                        <div class="mb-6">
                            <label for="password" class="block text-gray-700 text-sm font-medium mb-2">
                                Password
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                </div>
                                <input 
                                    id="password" 
                                    type="password" 
                                    name="password" 
                                    required 
                                    class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                                    placeholder="Masukkan password"
                                >
                            </div>
                        </div>

                        <!-- Remember Me -->
                        <div class="flex items-center mb-6">
                            <label class="flex items-center">
                                <input type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
                            </label>
                        </div>

                        <!-- Error Messages -->
                        @if ($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-sm">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <!-- Login Button -->
                        <button type="submit" class="w-full bg-gradient-to-r from-gray-800 to-blue-900 text-white py-3 px-4 rounded-lg font-semibold hover:from-gray-900 hover:to-blue-800 focus:ring-4 focus:ring-blue-200 transition-all duration-200">
                            Masuk ke Dashboard
                        </button>

                        <!-- Forgot Password -->
                        <div class="text-center mt-4">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:text-blue-800 transition-colors duration-200">
                                    Lupa password?
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const slider = document.getElementById('slider');
        let currentSlide = 1;

        function nextSlide() {
            slider.classList.add('flipped');
            currentSlide = 2;
        }

        function prevSlide() {
            slider.classList.remove('flipped');
            currentSlide = 1;
        }


        // Optional: Auto advance to login form after 3 seconds on welcome screen
        setTimeout(() => {
            if (currentSlide === 1) {
                nextSlide();
            }
        }, 3000);
    </script>
</body>
</html>