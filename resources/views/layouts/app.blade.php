<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Company Profile')</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="bg-gray-100">

    {{-- Navbar di atas konten --}}
    @include('partials.adminbar')

    <main class="py-8">
        @yield('content')
    </main>

    {{-- Footer di bawah konten --}}
    @include('partials.adminter')

    @livewireScripts
</body>
</html>