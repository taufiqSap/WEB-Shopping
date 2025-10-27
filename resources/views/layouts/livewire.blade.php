<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Sentul Fishing' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-900">

    {{-- Navbar di atas konten --}}
    @include('partials.navbar')

    <main class="pt-24 py-8">
        {{ $slot }}
    </main>

    {{-- Footer di bawah konten --}}
    @include('partials.footer')

    @livewireScripts
</body>
</html>