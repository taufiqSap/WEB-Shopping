@extends('layouts.guest')

@section('content')
<div class="min-h-screen bg-gray-900 text-white">
    <!-- Hero Section -->
    <section class="relative py-16 md:py-24 bg-gradient-to-br from-gray-800 to-gray-900 overflow-hidden">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-black mb-4 md:mb-6">
                    Tentang <span class="text-blue-400">Sentul Fishing</span>
                </h1>
                <p class="text-lg md:text-xl text-gray-300 max-w-4xl mx-auto leading-relaxed">
                    Toko alat pancing terpercaya yang hadir untuk memenuhi kebutuhan para pemancing di Indonesia
                </p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-12 md:py-20 bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Introduction -->
            <div class="mb-16 md:mb-24">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12 items-center">
                    <div>
                        <h2 class="text-2xl md:text-4xl font-bold text-white mb-6 md:mb-8">
                            Selamat Datang di <span class="text-blue-400">Sentul Fishing</span>
                        </h2>
                        <div class="space-y-4 md:space-y-6 text-gray-300">
                            <p class="text-base md:text-lg leading-relaxed">
                                Sejak berdiri, kami berkomitmen untuk menjadi mitra terbaik bagi para penggemar memancing, 
                                baik pemula maupun profesional, dengan menyediakan peralatan pancing berkualitas tinggi 
                                dan pelayanan terbaik.
                            </p>
                            <p class="text-base md:text-lg leading-relaxed">
                                Kami menyediakan berbagai macam perlengkapan memancing yang lengkap, mulai dari joran, 
                                reel, senar, umpan, hingga berbagai aksesori pendukung lainnya.
                            </p>
                        </div>
                    </div>
                    <div class="bg-gray-700 rounded-2xl p-6 md:p-8 border border-gray-600">
                        <div class="aspect-w-16 aspect-h-12 bg-gray-600 rounded-lg flex items-center justify-center">
                            <svg class="w-24 h-24 md:w-32 md:h-32 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Products & Services -->
            <div class="mb-16 md:mb-24">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12 items-center">
                    <div class="order-2 lg:order-1">
                        <div class="bg-gray-700 rounded-2xl p-6 md:p-8 border border-gray-600">
                            <div class="aspect-w-16 aspect-h-12 bg-gray-600 rounded-lg flex items-center justify-center">
                                <svg class="w-24 h-24 md:w-32 md:h-32 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="order-1 lg:order-2">
                        <h2 class="text-2xl md:text-4xl font-bold text-white mb-6 md:mb-8">
                            Produk Berkualitas
                        </h2>
                        <div class="space-y-4 md:space-y-6 text-gray-300">
                            <p class="text-base md:text-lg leading-relaxed">
                                Produk-produk yang kami tawarkan berasal dari merek-merek ternama baik lokal maupun 
                                internasional, memastikan setiap pemancing mendapatkan peralatan yang sesuai dengan 
                                kebutuhan dan budget mereka.
                            </p>
                            <p class="text-base md:text-lg leading-relaxed">
                                Di Sentul Fishing, kepuasan pelanggan adalah prioritas utama kami. Tim kami yang 
                                berpengalaman siap memberikan konsultasi dan rekomendasi produk yang tepat.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Services -->
            <div class="bg-gray-700 rounded-2xl p-6 md:p-8 border border-gray-600 mb-16 md:mb-24">
                <h2 class="text-2xl md:text-3xl font-bold text-white text-center mb-8 md:mb-12">Layanan Kami</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
                    <div class="text-center p-6 bg-gray-800 rounded-xl border border-gray-600 hover:border-blue-400 transition-colors duration-300">
                        <div class="text-blue-400 mb-4">
                            <svg class="w-12 h-12 md:w-16 md:h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg md:text-xl font-semibold text-white mb-2">Konsultasi Profesional</h3>
                        <p class="text-gray-300 text-sm md:text-base">Tim berpengalaman siap membantu pemula hingga profesional</p>
                    </div>
                    
                    <div class="text-center p-6 bg-gray-800 rounded-xl border border-gray-600 hover:border-blue-400 transition-colors duration-300">
                        <div class="text-blue-400 mb-4">
                            <svg class="w-12 h-12 md:w-16 md:h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 8h6m-5 0a3 3 0 110 6H9l3 3m-3-6h6m6 1a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg md:text-xl font-semibold text-white mb-2">Eceran & Grosir</h3>
                        <p class="text-gray-300 text-sm md:text-base">Melayani penjualan retail maupun grosir dengan harga kompetitif</p>
                    </div>
                    
                    <div class="text-center p-6 bg-gray-800 rounded-xl border border-gray-600 hover:border-blue-400 transition-colors duration-300">
                        <div class="text-blue-400 mb-4">
                            <svg class="w-12 h-12 md:w-16 md:h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg md:text-xl font-semibold text-white mb-2">Lokasi Strategis</h3>
                        <p class="text-gray-300 text-sm md:text-base">Mudah diakses dengan segala kebutuhan memancing dalam satu tempat</p>
                    </div>
                </div>
            </div>

            <!-- Vision & Mission -->
            <div class="mb-16 md:mb-24">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12">
                    <!-- Vision -->
                    <div class="bg-gradient-to-br from-blue-900 to-blue-800 rounded-2xl p-6 md:p-8 border border-blue-700">
                        <h2 class="text-2xl md:text-3xl font-bold text-white mb-6">Visi Kami</h2>
                        <p class="text-lg md:text-xl text-blue-100 leading-relaxed">
                            Menjadi toko alat pancing pilihan utama yang dipercaya oleh komunitas pemancing di Indonesia.
                        </p>
                    </div>
                    
                    <!-- Mission -->
                    <div class="bg-gray-700 rounded-2xl p-6 md:p-8 border border-gray-600">
                        <h2 class="text-2xl md:text-3xl font-bold text-white mb-6">Misi Kami</h2>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <p class="text-gray-300 ml-3 text-base md:text-lg">Menyediakan produk berkualitas dengan harga terjangkau</p>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <p class="text-gray-300 ml-3 text-base md:text-lg">Memberikan pelayanan ramah dan profesional</p>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <p class="text-gray-300 ml-3 text-base md:text-lg">Membangun kepercayaan melalui komitmen, kualitas, dan ketepatan layanan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="text-center bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl p-8 md:p-12 border border-blue-500">
                <h2 class="text-2xl md:text-4xl font-bold text-white mb-4 md:mb-6">
                    Bergabunglah Bersama Kami
                </h2>
                <p class="text-lg md:text-xl text-blue-100 mb-6 md:mb-8 max-w-2xl mx-auto">
                    Ribuan pemancing telah mempercayai Sentul Fishing sebagai partner memancing mereka. 
                    Mari wujudkan pengalaman memancing yang lebih menyenangkan bersama kami!
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('shop') }}" 
                       class="bg-white text-blue-600 hover:bg-gray-100 px-6 py-3 md:px-8 md:py-4 rounded-lg font-semibold transition-colors duration-200 shadow-lg hover:shadow-xl">
                        Lihat Produk Kami
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    /* Smooth animations */
    .transition-all {
        transition: all 0.3s ease;
    }
    
    .transition-colors {
        transition: colors 0.3s ease;
    }

    /* Custom scrollbar for dark mode */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #1f2937;
    }

    ::-webkit-scrollbar-thumb {
        background: #3b82f6;
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #2563eb;
    }

    /* Touch-friendly buttons for mobile */
    @media (max-width: 640px) {
        button, a {
            min-height: 44px;
            min-width: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    }

    /* Optimize images */
    img {
        max-width: 100%;
        height: auto;
    }

    /* Aspect ratio utility */
    .aspect-w-16 {
        position: relative;
    }

    .aspect-w-16::before {
        content: '';
        display: block;
        padding-bottom: 75%; /* 12/16 = 0.75 */
    }

    .aspect-w-16 > * {
        position: absolute;
        height: 100%;
        width: 100%;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    }
</style>
@endsection