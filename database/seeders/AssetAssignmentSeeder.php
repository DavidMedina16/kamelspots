<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee; // Importa el modelo Employee
use App\Models\Asset; // Importa el modelo Asset
use App\Models\AssetAssignment; // Importa el modelo AssetAssignment

class AssetAssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtenemos algunos IDs de empleados y activos para asignar
        $employee1 = Employee::where('employee_id_number', 'EMP001')->first(); // Juan Perez
        $employee2 = Employee::where('employee_id_number', 'EMP002')->first(); // Maria Gomez
        $employee3 = Employee::where('employee_id_number', 'EMP003')->first(); // Carlos Ruiz

        $asset1 = Asset::where('serial_number', 'MACBPRO2022-001')->first(); // MacBook Pro
        $asset2 = Asset::where('serial_number', 'DELLMON27-001')->first(); // Monitor Dell
        $asset3 = Asset::where('serial_number', 'KEYCHRONK2-001')->first(); // Teclado
        $asset4 = Asset::where('serial_number', 'LOGIMX3S-001')->first(); // Mouse
        $asset5 = Asset::where('serial_number', 'HMAERON-001')->first(); // Silla

        // Creamos asignaciones de ejemplo
        if ($employee1 && $asset1) {
            AssetAssignment::create([
                'employee_id' => $employee1->id,
                'asset_id' => $asset1->id,
                'assignment_date' => '2023-01-20',
                'notes' => 'Laptop principal',
            ]);
        }

        if ($employee1 && $asset2) {
            AssetAssignment::create([
                'employee_id' => $employee1->id,
                'asset_id' => $asset2->id,
                'assignment_date' => '2023-01-20',
                'notes' => 'Monitor secundario',
            ]);
        }

        if ($employee2 && $asset3) {
            AssetAssignment::create([
                'employee_id' => $employee2->id,
                'asset_id' => $asset3->id,
                'assignment_date' => '2023-03-05',
                'notes' => 'Asignado con teclado nuevo',
            ]);
        }

        if ($employee2 && $asset4) {
            AssetAssignment::create([
                'employee_id' => $employee2->id,
                'asset_id' => $asset4->id,
                'assignment_date' => '2023-03-05',
                'notes' => 'Mouse estándar',
            ]);
        }

        if ($employee3 && $asset5) {
            AssetAssignment::create([
                'employee_id' => $employee3->id,
                'asset_id' => $asset5->id,
                'assignment_date' => '2023-07-01',
                'notes' => 'Silla ergonómica nueva',
            ]);
        }
    }
}
