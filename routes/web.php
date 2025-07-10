<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\EmployeeList; // ¡Importa nuestro componente Livewire!
use App\Livewire\EmployeeDetail; // Importa el componente para el detalle del empleado
use App\Livewire\CreateEmployee; // Importa el componente para crear un empleado

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Esta ruta mostrará el componente EmployeeList en la raíz de tu aplicación
Route::get('/', EmployeeList::class);
// Ruta para crear un nuevo empleado
Route::get('/employees/create', CreateEmployee::class)->name('employees.create');
// Ruta para el detalle del empleado (empleados/ID_DEL_EMPLEADO)
Route::get('/employees/{employee}', EmployeeDetail::class)->name('employees.show');
