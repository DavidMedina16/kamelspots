<div class="p-6"> {{-- Añadimos un poco de padding --}}
    <h2 class="text-2xl font-bold mb-4">Nuestros Empleados</h2>

    <div class="p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Nuestros Empleados</h2>
            <a href="{{ route('employees.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                + Nuevo Empleado
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($employees as $employee)
            <a href="/employees/{{ $employee->id }}" class="block">
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <img src="{{ $employee->photo_path ? asset('storage/' . $employee->photo_path) : 'https://via.placeholder.com/150/000000/FFFFFF?text=Sin+Foto' }}" alt="{{ $employee->first_name }} {{ $employee->last_name }}" class="w-full h-48 object-cover object-center">
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
