<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'Premium Store') }}</title>

    <!-- SEO Meta Tags -->
    <meta name="description" content="{{ $meta_description ?? 'La mejor tienda online con productos premium y experiencia de usuario excepcional.' }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <!-- Flux Appearance -->
    @fluxAppearance

    <!-- Scripts and Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen font-sans antialiased bg-zinc-950 text-zinc-100">
    <div class="relative flex min-h-screen flex-col">
        <main class="flex-1">
            {{ $slot }}
        </main>
    </div>

    <livewire:toast />

    @fluxScripts
</body>
</html>
