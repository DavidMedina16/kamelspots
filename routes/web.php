<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\EmployeeList; // ¡Importa nuestro componente Livewire!
use App\Livewire\EmployeeDetail; // Importa el componente para el detalle del empleado
use App\Livewire\CreateEmployee; // Importa el componente para crear un empleado
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Aquí es donde puedes registrar las rutas web para tu aplicación.
| Estas rutas son cargadas por el RouteServiceProvider y todas ellas
| serán asignadas al grupo de middleware "web". ¡Haz algo grandioso!
|
*/

// Rutas protegidas por autenticación (solo usuarios logueados pueden acceder)
Route::middleware('auth')->group(function () {
    // Ruta principal: listado de empleados
    Route::get('/', EmployeeList::class);
    // Ruta para crear un nuevo empleado
    Route::get('/employees/create', CreateEmployee::class)->name('employees.create');
    // Ruta para el detalle del empleado
    Route::get('/employees/{employee}', EmployeeDetail::class)->name('employees.show');
});

// Rutas de autenticación (login, registro, logout)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
