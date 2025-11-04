<div class="min-h-screen bg-gray-900 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="text-center mb-12 md:mb-16">
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-black text-white mb-4">
                Blog <span class="text-blue-400">Sentul Fishing</span>
            </h1>
            <p class="text-lg md:text-xl text-gray-300 max-w-3xl mx-auto">
                Tips, berita, dan promo terbaru seputar dunia memancing
            </p>
        </div>

        <!-- Blog Posts -->
        <div class="space-y-12 md:space-y-16 mb-16 md:mb-20">
            @foreach($posts as $index => $post)
            <div class="bg-gray-800 rounded-2xl shadow-lg overflow-hidden border border-gray-700 hover:border-gray-600 transition-all duration-300 transform hover:-translate-y-1">
                <div class="grid grid-cols-1 {{ $index % 2 == 0 ? 'lg:grid-cols-2' : 'lg:grid-cols-2' }}">
                    <!-- Image Section -->
                    <div class="{{ $index % 2 == 0 ? 'lg:order-1' : 'lg:order-2' }} h-64 md:h-80 lg:h-96">
                        @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" 
                                 alt="{{ $post->title }}"
                                 class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-blue-600 to-blue-800 flex items-center justify-center">
                                <div class="text-center text-white">
                                    <svg class="w-16 h-16 md:w-20 md:h-20 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    <p class="text-lg font-semibold">No Image</p>
                                </div>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Content Section -->
                    <div class="{{ $index % 2 == 0 ? 'lg:order-2' : 'lg:order-1' }} p-6 md:p-8 lg:p-10 flex flex-col justify-center bg-gray-800">
                        <!-- Badge -->
                        <div class="mb-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium 
                                @if($post->type === 'promo') bg-yellow-500/20 text-yellow-400 border border-yellow-500/30
                                @elseif($post->type === 'news') bg-blue-500/20 text-blue-400 border border-blue-500/30
                                @else bg-green-500/20 text-green-400 border border-green-500/30
                                @endif">
                                {{ ucfirst($post->type) }}
                            </span>
                        </div>
                        
                        <!-- Title -->
                        <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-white mb-4 leading-tight">
                            {{ $post->title }}
                        </h2>
                        
                        <!-- Excerpt -->
                        <p class="text-gray-300 text-base md:text-lg mb-6 leading-relaxed">
                            {{ $post->excerpt }}
                        </p>
                        
                        <!-- Date -->
                        <div class="flex items-center text-gray-400 mb-6">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span class="text-sm md:text-base">
                                {{ $post->published_at->format('d M Y') }}
                            </span>
                        </div>
                        
                        <!-- Read More Button -->
                        <a href="#" 
                           class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 transition-all duration-200 w-fit shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            Baca Selengkapnya
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Tips Section -->
        <div class="bg-gradient-to-br from-blue-700 to-blue-900 rounded-2xl shadow-2xl overflow-hidden border border-blue-600/30">
            <div class="px-6 py-8 md:px-12 md:py-16 text-center text-white">
                <h2 class="text-2xl md:text-4xl font-black mb-4 md:mb-6">
                    Tips Memancing: Laut vs Kolam vs Sungai
                </h2>
                <p class="text-blue-100 text-lg md:text-xl mb-8 md:mb-12 max-w-4xl mx-auto">
                    Pahami perbedaan teknik dan peralatan yang dibutuhkan untuk setiap jenis memancing
                </p>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
                    <!-- Laut -->
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 md:p-8 border border-white/20 hover:bg-white/15 transition-all duration-300 transform hover:-translate-y-1">
                        <div class="text-4xl mb-4">🌊</div>
                        <h3 class="text-xl md:text-2xl font-bold mb-4">Memancing Laut</h3>
                        <ul class="text-blue-100 text-left space-y-2 text-sm md:text-base">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Perlukan reel yang kuat dan tahan air asin</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Senar dengan ketahanan tinggi terhadap korosi</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Umpan hidup lebih efektif untuk ikan predator</span>
                            </li>
                        </ul>
                    </div>
                    
                    <!-- Kolam -->
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 md:p-8 border border-white/20 hover:bg-white/15 transition-all duration-300 transform hover:-translate-y-1">
                        <div class="text-4xl mb-4">🐟</div>
                        <h3 class="text-xl md:text-2xl font-bold mb-4">Memancing Kolam</h3>
                        <ul class="text-blue-100 text-left space-y-2 text-sm md:text-base">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Cocok untuk pemula dengan peralatan standar</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Umpan pelet atau dough ball sangat efektif</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Teknik casting yang presisi diperlukan</span>
                            </li>
                        </ul>
                    </div>
                    
                    <!-- Sungai -->
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 md:p-8 border border-white/20 hover:bg-white/15 transition-all duration-300 transform hover:-translate-y-1">
                        <div class="text-4xl mb-4">🌿</div>
                        <h3 class="text-xl md:text-2xl font-bold mb-4">Memancing Sungai</h3>
                        <ul class="text-blue-100 text-left space-y-2 text-sm md:text-base">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Perhatikan arus dan struktur sungai</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Joran medium action cocok untuk berbagai kondisi</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Umpan alami seperti cacing atau serangga</span>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <!-- Additional Tips -->
                <div class="mt-12 bg-white/5 rounded-xl p-6 md:p-8 border border-white/10 hover:bg-white/10 transition-all duration-300">
                    <h3 class="text-xl md:text-2xl font-bold mb-4">Tips Pembelian Peralatan</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-left">
                        <div>
                            <h4 class="font-semibold text-lg mb-3 text-yellow-300">Untuk Pemula</h4>
                            <ul class="text-blue-100 space-y-2 text-sm md:text-base">
                                <li>• Mulai dengan set komplit yang terjangkau</li>
                                <li>• Pilih joran dengan aksi medium</li>
                                <li>• Reel spinning lebih mudah dipelajari</li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-semibold text-lg mb-3 text-yellow-300">Untuk Advanced</h4>
                            <ul class="text-blue-100 space-y-2 text-sm md:text-base">
                                <li>• Investasi pada reel berkualitas tinggi</li>
                                <li>• Sesuaikan peralatan dengan target ikan</li>
                                <li>• Pertimbangkan rod material (graphite/fiber)</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="text-center mt-16 md:mt-20 bg-gray-800 rounded-2xl p-8 md:p-12 border border-gray-700">
            <h2 class="text-2xl md:text-3xl font-bold text-white mb-4">
                Butuh Perlengkapan Memancing?
            </h2>
            <p class="text-gray-300 text-lg mb-8 max-w-2xl mx-auto">
                Temukan berbagai peralatan memancing terbaik dengan kualitas terjamin di Sentul Fishing
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('shop') }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-lg font-semibold transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    Lihat Katalog Produk
                </a>
                <a href="{{ route('about') }}" 
                   class="border-2 border-gray-600 text-gray-300 hover:bg-gray-700 hover:border-gray-500 px-8 py-4 rounded-lg font-semibold transition-all duration-200">
                    Tentang Kami
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    /* Smooth transitions */
    .transition-all {
        transition: all 0.3s ease;
    }
    
    /* Custom scrollbar - Dark Mode */
    ::-webkit-scrollbar {
        width: 10px;
    }
    
    ::-webkit-scrollbar-track {
        background: #1f2937;
    }
    
    ::-webkit-scrollbar-thumb {
        background: #3b82f6;
        border-radius: 5px;
    }
    
    ::-webkit-scrollbar-thumb:hover {
        background: #2563eb;
    }
    
    /* Mobile optimizations */
    @media (max-width: 768px) {
        .text-4xl {
            font-size: 2rem;
        }
        
        .text-3xl {
            font-size: 1.75rem;
        }
        
        .text-2xl {
            font-size: 1.5rem;
        }
    }

    /* Smooth scroll */
    html {
        scroll-behavior: smooth;
    }
</style>