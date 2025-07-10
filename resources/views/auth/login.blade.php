@extends('components.layouts.app')

@section('content')
{{-- Contenedor principal del formulario de login --}}
<div class="max-w-md mx-auto mt-10 bg-white p-8 rounded shadow">
    {{-- Título del formulario --}}
    <h2 class="text-2xl font-bold mb-6 text-center">Iniciar sesión</h2>
    {{-- Formulario de login --}}
    <form method="POST" action="{{ route('login') }}">
        @csrf
        {{-- Campo de correo electrónico --}}
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Correo electrónico</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full border rounded px-3 py-2 mt-1">
            @error('email')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>
        {{-- Campo de contraseña --}}
        <div class="mb-4">
            <label for="password" class="block text-gray-700">Contraseña</label>
            <input id="password" type="password" name="password" required class="w-full border rounded px-3 py-2 mt-1">
            @error('password')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>
        {{-- Checkbox de recordar sesión --}}
        <div class="mb-4 flex items-center">
            <input type="checkbox" name="remember" id="remember" class="mr-2">
            <label for="remember" class="text-gray-700">Recordarme</label>
        </div>
        {{-- Botón de enviar --}}
        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Entrar</button>
    </form>
    {{-- Enlace a registro --}}
    <div class="mt-4 text-center">
        <a href="{{ route('register') }}" class="text-blue-600 hover:underline">¿No tienes cuenta? Regístrate</a>
    </div>
</div>
@endsection 