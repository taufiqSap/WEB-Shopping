<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Company Profile')</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="bg-gray-100">

    {{-- Navbar di atas --}}
    @include('partials.adminbar')

    <div class="flex">
        {{-- Sidebar --}}
        @include('partials.sidebar')

        {{-- Main Content --}}
        <main class="flex-1 p-8">
            @yield('content')
        </main>
    </div>

    {{-- Footer di bawah --}}
    @include('partials.adminter')

    @livewireScripts
</body>
</html>