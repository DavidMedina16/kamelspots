<div class="container mx-auto p-6 bg-gray-100 min-h-screen">
    <a href="/" class="text-blue-600 hover:text-blue-800 flex items-center mb-6">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Volver a Empleados
    </a>

    <div class="bg-white rounded-lg shadow-xl p-8 mb-8 max-w-2xl mx-auto">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 border-b-2 border-blue-400 pb-2">Crear Nuevo Empleado</h2>

        {{-- Mensaje de éxito --}}
        @if (session()->has('message'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                <p class="font-bold">¡Éxito!</p>
                <p>{{ session('message') }}</p>
            </div>
        @endif

        <form wire:submit.prevent="saveEmployee" enctype="multipart/form-data">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="first_name" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                    <input type="text" id="first_name" wire:model.live="first_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('first_name') border-red-500 @enderror">
                    @error('first_name') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="last_name" class="block text-gray-700 text-sm font-bold mb-2">Apellido:</label>
                    <input type="text" id="last_name" wire:model.live="last_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('last_name') border-red-500 @enderror">
                    @error('last_name') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="mb-6">
                <label for="employee_id_number" class="block text-gray-700 text-sm font-bold mb-2">ID de Empleado:</label>
                <input type="text" id="employee_id_number" wire:model.live="employee_id_number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('employee_id_number') border-red-500 @enderror">
                @error('employee_id_number') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label for="position" class="block text-gray-700 text-sm font-bold mb-2">Cargo:</label>
                <input type="text" id="position" wire:model.live="position" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('position') border-red-500 @enderror">
                @error('position') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label for="hiring_date" class="block text-gray-700 text-sm font-bold mb-2">Fecha de Contratación:</label>
                <input type="date" id="hiring_date" wire:model.live="hiring_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('hiring_date') border-red-500 @enderror">
                @error('hiring_date') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label for="company_name" class="block text-gray-700 text-sm font-bold mb-2">Empresa (Opcional):</label>
                <input type="text" id="company_name" wire:model.live="company_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('company_name') border-red-500 @enderror">
                @error('company_name') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label for="photo" class="block text-gray-700 text-sm font-bold mb-2">Foto (Opcional, Max 1MB):</label>
                <input type="file" id="photo" wire:model="photo" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 @error('photo') border-red-500 @enderror">
                @error('photo') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror

                @if ($photo)
                    <img src="{{ $photo->temporaryUrl() }}" class="mt-4 h-32 w-32 object-cover rounded-full shadow-md">
                @endif
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Guardar Empleado
                </button>
            </div>
        </form>
    </div>
</div>
