<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akses Ditolak - Sistem Privasi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
    </style>
</head>
<body class="bg-white min-h-screen flex items-center justify-center p-4">
    <div class="max-w-md w-full bg-gray-100 rounded-2xl shadow-xl overflow-hidden border border-gray-300">
        <div class="p-8 text-center">
            <!-- Icon danger dengan animasi -->
            <div class="mb-6 animate-float">
                <div class="w-24 h-24 mx-auto bg-red-100 rounded-full flex items-center justify-center border-4 border-red-300">
                    <!-- SVG Icon Danger -->
                    <svg class="w-12 h-12 text-red-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
            
            <!-- Judul -->
            <h1 class="text-4xl font-bold text-gray-800 mb-2">404</h1>
            <h2 class="text-2xl font-semibold text-red-600 mb-4">Akses Ditolak</h2>
            
            <!-- Pesan -->
            <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
                <p class="text-red-700 text-lg font-medium">
                    <!-- SVG Icon Exclamation -->
                    <svg class="w-5 h-5 inline mr-2 text-red-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                    Mohon Maaf, Anda Tidak Dapat Registrasi
                </p>
                <p class="text-gray-600 mt-2 text-sm">
                    Ini adalah sistem privat yang tidak menerima pendaftaran dari pengguna eksternal.
                </p>
            </div>
            
            <!-- Informasi tambahan -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                <h3 class="text-blue-700 font-semibold mb-2">
                    <!-- SVG Icon Info -->
                    <svg class="w-5 h-5 inline mr-2 text-blue-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                    </svg>
                    Informasi Sistem
                </h3>
                <ul class="text-gray-600 text-sm text-left space-y-2">
                    <li>
                        <!-- SVG Icon Lock -->
                        <svg class="w-4 h-4 inline mr-2 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                        </svg>
                        Sistem ini bersifat privat
                    </li>
                    <li>
                        <!-- SVG Icon Shield -->
                        <svg class="w-4 h-4 inline mr-2 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        Hanya untuk pengguna terotorisasi
                    </li>
                    <li>
                        <!-- SVG Icon Circle Exclamation -->
                        <svg class="w-4 h-4 inline mr-2 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        Registrasi ditutup untuk umum
                    </li>
                </ul>
            </div>
            
            <!-- Tombol aksi -->
            <div class="flex justify-center">
                <a href="/" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition duration-300 flex items-center justify-center">
                    <!-- SVG Icon Home -->
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                    </svg>
                    Kembali ke Beranda
                </a>
            </div>
            
            <!-- Footer -->
            <div class="mt-8 pt-4 border-t border-gray-300">
                <p class="text-gray-500 text-sm">
                    &copy; System Sentul Fishing.
                </p>
            </div>
        </div>
    </div>
</body>
</html>