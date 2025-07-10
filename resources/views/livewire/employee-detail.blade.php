<div class="container mx-auto p-6 bg-gray-100 min-h-screen">
    <a href="/" class="text-blue-600 hover:text-blue-800 flex items-center mb-6">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Volver a Empleados
    </a>

    <div class="bg-white rounded-lg shadow-xl p-8 mb-8">
        <div class="flex flex-col md:flex-row items-center md:items-start space-y-6 md:space-y-0 md:space-x-8">
            <div class="flex-shrink-0">
                <img src="{{ $employee->photo_path ? asset('storage/' . $employee->photo_path) : asset('user.png') }}" alt="{{ $employee->first_name }} {{ $employee->last_name }}" class="w-48 h-48 rounded-full object-cover object-center border-4 border-blue-200 shadow-md">
            </div>
            <div class="flex-grow text-center md:text-left">
                <h1 class="text-4xl font-extrabold text-gray-900 mb-2">{{ $employee->first_name }} {{ $employee->last_name }}</h1>
                <p class="text-2xl text-blue-700 font-semibold mb-4">{{ $employee->position }}</p>

                <div class="text-gray-700 space-y-2">
                    <p><strong class="font-semibold">ID de Empleado:</strong> {{ $employee->employee_id_number }}</p>
                    <p><strong class="font-semibold">Fecha de Ingreso:</strong> {{ \Carbon\Carbon::parse($employee->hiring_date)->translatedFormat('d F Y') }}</p>
                    <p><strong class="font-semibold">Tiempo en la Empresa:</strong> {{ $employee->time_in_company }}</p>
                    @if($employee->company_name)
                        <p><strong class="font-semibold">Empresa:</strong> {{ $employee->company_name }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <h2 class="text-3xl font-bold text-gray-800 mb-6 border-b-2 border-blue-400 pb-2">Inventario Asignado</h2>

    @forelse($assignedAssets as $assignment)
        <div class="bg-white rounded-lg shadow-md p-6 mb-4 flex flex-col md:flex-row items-center md:items-start space-y-4 md:space-y-0 md:space-x-6">
            <div class="flex-shrink-0">
                <img src="{{ $assignment->asset->photo_path ?: 'https://via.placeholder.com/120/CCCCCC/000000?text=Sin+Foto' }}" alt="{{ $assignment->asset->name }}" class="w-32 h-32 object-cover object-center rounded-lg border border-gray-200">
            </div>
            <div class="flex-grow">
                <h3 class="text-xl font-bold text-gray-800 mb-1">{{ $assignment->asset->name }}</h3>
                <p class="text-gray-600"><strong class="font-semibold">Tipo:</strong> {{ $assignment->asset->asset_type }}</p>
                <p class="text-gray-600"><strong class="font-semibold">ID Item:</strong> {{ $assignment->asset->internal_id ?? 'N/A' }}</p>
                <p class="text-gray-600"><strong class="font-semibold">Serial:</strong> {{ $assignment->asset->serial_number }}</p>
                <p class="text-gray-600"><strong class="font-semibold">Estado:</strong> <span class="font-bold text-blue-600">{{ $assignment->asset->status }}</span></p>
                <p class="text-gray-600 text-sm mt-2"><strong class="font-semibold">Asignado el:</strong> {{ \Carbon\Carbon::parse($assignment->assignment_date)->translatedFormat('d F Y') }}</p>
                @if($assignment->notes)
                    <p class="text-gray-600 text-sm"><strong class="font-semibold">Notas:</strong> {{ $assignment->notes }}</p>
                @endif
            </div>
        </div>
    @empty
        <p class="text-gray-600">Este empleado no tiene activos asignados actualmente.</p>
    @endforelse
</div>
