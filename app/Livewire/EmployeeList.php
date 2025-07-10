<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Employee;

class EmployeeList extends Component
{
    public function render()
    {
        // Aquí obtenemos todos los empleados de la base de datos
        $employees = Employee::all();

        // Pasamos los empleados a la vista
        return view('livewire.employee-list', [
            'employees' => $employees,
        ]);
    }
}
