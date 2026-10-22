@props(['tittle'=>null])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $tittle ? $tittle. '-':''}}{{config('app.name','Ideas')}}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-50 text-slade-800 antialiased">
<x-navbar />
    <main class="mx-auto max-w-3xl px-4 py-8">
        {{-- <x-alert /> --}}
        {{ $slot }}
    </main>

</body>
</html>