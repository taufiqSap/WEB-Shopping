<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Sentul Fishing')</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="bg-gray-900">

    {{-- Navbar di atas konten --}}
    @include('partials.navbar')

    <main class="py-8">
        @yield('content')
    </main>

    {{-- Footer di bawah konten --}}
    @include('partials.footer')

    @livewireScripts
</body>
</html>