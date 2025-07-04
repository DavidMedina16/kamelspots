<?php

namespace Database\Seeders;

// Importamos nuestros seeders
use App\Models\Asset;
use App\Models\AssetAssignment;
use App\Models\Employee;
use Database\Seeders\EmployeeSeeder;
use Database\Seeders\AssetSeeder;
use Database\Seeders\AssetAssignmentSeeder;

// Asegúrate de importar el modelo User si lo vas a usar, aunque en este ejemplo no
// use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Deshabilitar la verificación de claves foráneas
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Borra datos anteriores (Orden importante: asignaciones -> activos -> empleados)
        AssetAssignment::truncate(); // Borra primero las asignaciones
        Asset::truncate();           // Borra los activos
        Employee::truncate();        // Borra los empleados

        // Habilitar la verificación de claves foráneas
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Llamamos a nuestros seeders
        $this->call([
            EmployeeSeeder::class,
            AssetSeeder::class,
            AssetAssignmentSeeder::class,
        ]);

        // Si quieres crear un usuario de ejemplo para loguearte, puedes hacerlo aquí
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
