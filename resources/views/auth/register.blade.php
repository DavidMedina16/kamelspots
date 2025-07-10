@extends('components.layouts.app')

@section('content')
{{-- Contenedor principal del formulario de registro --}}
<div class="max-w-md mx-auto mt-10 bg-white p-8 rounded shadow">
    {{-- Título del formulario --}}
    <h2 class="text-2xl font-bold mb-6 text-center">Registro</h2>
    {{-- Formulario de registro --}}
    <form method="POST" action="{{ route('register') }}">
        @csrf
        {{-- Campo de nombre --}}
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Nombre</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus class="w-full border rounded px-3 py-2 mt-1">
            @error('name')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>
        {{-- Campo de correo electrónico --}}
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Correo electrónico</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required class="w-full border rounded px-3 py-2 mt-1">
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
        {{-- Campo de confirmación de contraseña --}}
        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700">Confirmar contraseña</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required class="w-full border rounded px-3 py-2 mt-1">
        </div>
        {{-- Botón de enviar --}}
        <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">Registrarse</button>
    </form>
    {{-- Enlace a login --}}
    <div class="mt-4 text-center">
        <a href="{{ route('login') }}" class="text-blue-600 hover:underline">¿Ya tienes cuenta? Inicia sesión</a>
    </div>
</div>
@endsection 