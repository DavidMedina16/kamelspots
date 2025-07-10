<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Employee; // Importa el modelo Employee
use App\Models\AssetAssignment; // Importa el modelo AssetAssignment (para las asignaciones)

class EmployeeDetail extends Component
{
    public Employee $employee; // Propiedad pública para almacenar el objeto Employee

    // Método 'mount' es como un constructor de Livewire, se ejecuta al inicio
    public function mount(Employee $employee)
    {
        $this->employee = $employee;
    }

    public function render()
    {
        // Carga las asignaciones de activos relacionadas con este empleado
        // con el activo asociado, y que no hayan sido devueltas aún.
        $assignedAssets = AssetAssignment::where('employee_id', $this->employee->id)
            ->whereNull('return_date') // Activos que no han sido devueltos
            ->with('asset') // Carga el activo relacionado
            ->get();

        return view('livewire.employee-detail', [
            'assignedAssets' => $assignedAssets, // Pasa las asignaciones a la vista
        ]);
    }
}
