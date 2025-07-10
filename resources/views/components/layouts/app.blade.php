<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'KamelSpots' }}</title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    {{-- Incluye los assets de Vite (CSS y JS) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- Incluye Alpine.js para el minipanel interactivo de usuario --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">
    <header class="flex items-center p-4 bg-white shadow mb-6 justify-between">
        <div class="flex items-center">
            {{-- Logo de la aplicación --}}
            <img src="/logo.png" alt="KamelSpots Logo" class="h-10 w-10 mr-3">
            {{-- Nombre de la aplicación --}}
            <span class="text-2xl font-bold text-gray-800">KamelSpots</span>
        </div>
        @auth
        {{-- Minipanel de usuario autenticado (círculo con iniciales y modal de logout) --}}
        <div x-data="{ open: false }" class="relative">
            {{-- Botón con las iniciales del usuario --}}
            <button @click="open = !open" class="focus:outline-none">
                <span class="inline-flex items-center justify-center h-10 w-10 rounded-full bg-blue-600 text-white text-lg font-bold">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}{{ strtoupper(substr(explode(' ', auth()->user()->name)[1] ?? '', 0, 1)) }}
                </span>
            </button>
            {{-- Modal desplegable con datos y botón de cerrar sesión --}}
            <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-50 border border-gray-200" style="display: none;" x-transition>
                <div class="p-4 border-b border-gray-100">
                    <div class="font-semibold text-gray-800">{{ auth()->user()->name }}</div>
                    <div class="text-sm text-gray-500">{{ auth()->user()->email }}</div>
                </div>
                <form method="POST" action="{{ route('logout') }}" class="p-2">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100 rounded">Cerrar sesión</button>
                </form>
            </div>
        </div>
        @endauth
    </header>
    @yield('content')
    {{ $slot ?? '' }}

@livewireScripts
</body>
</html>
