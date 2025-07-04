<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee; // Importa el modelo Employee

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creamos 5 empleados de ejemplo
        Employee::create([
            'first_name' => 'Juan',
            'last_name' => 'Perez',
            'employee_id_number' => 'EMP001',
            'position' => 'Gerente de Proyectos',
            'hiring_date' => '2020-01-15',
            'company_name' => 'KamelSpots Tech',
            'photo_path' => 'https://via.placeholder.com/150/0000FF/FFFFFF?text=JP', // URL de una imagen de ejemplo
        ]);

        Employee::create([
            'first_name' => 'Maria',
            'last_name' => 'Gomez',
            'employee_id_number' => 'EMP002',
            'position' => 'Desarrollador Senior',
            'hiring_date' => '2021-03-01',
            'company_name' => 'KamelSpots Tech',
            'photo_path' => 'https://via.placeholder.com/150/FF0000/FFFFFF?text=MG',
        ]);

        Employee::create([
            'first_name' => 'Carlos',
            'last_name' => 'Ruiz',
            'employee_id_number' => 'EMP003',
            'position' => 'Diseñador UX/UI',
            'hiring_date' => '2022-06-20',
            'company_name' => 'KamelSpots Tech',
            'photo_path' => 'https://via.placeholder.com/150/00FF00/FFFFFF?text=CR',
        ]);

        Employee::create([
            'first_name' => 'Laura',
            'last_name' => 'Diaz',
            'employee_id_number' => 'EMP004',
            'position' => 'Analista de Datos',
            'hiring_date' => '2023-09-10',
            'company_name' => 'KamelSpots Tech',
            'photo_path' => 'https://via.placeholder.com/150/FFFF00/000000?text=LD',
        ]);

        Employee::create([
            'first_name' => 'Pedro',
            'last_name' => 'Silva',
            'employee_id_number' => 'EMP005',
            'position' => 'Soporte Técnico',
            'hiring_date' => '2024-02-01',
            'company_name' => 'KamelSpots Tech',
            'photo_path' => 'https://via.placeholder.com/150/00FFFF/000000?text=PS',
        ]);
    }
}
