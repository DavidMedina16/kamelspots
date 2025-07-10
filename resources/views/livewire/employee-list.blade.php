{{-- Contenedor principal de la sección de empleados --}}
<div class="p-6 pt-0"> {{-- Añadimos un poco de padding --}}
    {{-- Barra superior con título y botón de nuevo empleado --}}
    <div class="p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Nuestros Empleados</h2>
            {{-- Botón para crear un nuevo empleado --}}
            <a href="{{ route('employees.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                + Nuevo Empleado
            </a>
        </div>
    </div>
    {{-- Grid de tarjetas de empleados --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($employees as $employee)
            {{-- Tarjeta individual de empleado --}}
            <a href="/employees/{{ $employee->id }}" class="block">
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    {{-- Foto del empleado o imagen por defecto --}}
                    <img src="{{ $employee->photo_path ? asset('storage/' . $employee->photo_path) : asset('user.png') }}" alt="{{ $employee->first_name }} {{ $employee->last_name }}" class="w-full h-48 object-cover object-center">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold text-gray-800">{{ $employee->first_name }} {{ $employee->last_name }}</h3>
                        <p class="text-gray-600">{{ $employee->position }}</p>
                    </div>
                </div>
            </a>
        @empty
            <p class="text-gray-600">No hay empleados registrados aún.</p>
        @endforelse
    </div>
</div>
