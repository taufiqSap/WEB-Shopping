<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - Sentul Fishing')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-50">

    {{-- Navbar di atas --}}
    @include('partials.adminbar')

    <div class="flex pt-16"> {{-- Added pt-16 untuk offset fixed navbar --}}
        {{-- Sidebar --}}
        @include('partials.sidebar')

        {{-- Main Content --}}
        <main class="flex-1 p-6 ml-64"> {{-- Added ml-64 untuk offset sidebar --}}
            @yield('content')
        </main>
    </div>

    {{-- Footer di bawah --}}
    @include('partials.adminter')

    @livewireScripts
</body>
</html>