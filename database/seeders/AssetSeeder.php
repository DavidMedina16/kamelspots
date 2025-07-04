<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Asset; // Importa el modelo Asset

class AssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creamos algunos activos de ejemplo
        Asset::create([
            'asset_type' => 'Laptop',
            'name' => 'MacBook Pro 16" M1 Pro',
            'serial_number' => 'MACBPRO2022-001',
            'internal_id' => 'IT-LP-001',
            'status' => 'En Uso',
            'photo_path' => 'https://via.placeholder.com/200/CCCCCC/000000?text=MacBook',
        ]);

        Asset::create([
            'asset_type' => 'Monitor',
            'name' => 'Monitor Dell UltraSharp U2723QE',
            'serial_number' => 'DELLMON27-001',
            'internal_id' => 'IT-MON-001',
            'status' => 'En Uso',
            'photo_path' => 'https://via.placeholder.com/200/CCCCCC/000000?text=Monitor',
        ]);

        Asset::create([
            'asset_type' => 'Teclado',
            'name' => 'Teclado Mecánico Keychron K2',
            'serial_number' => 'KEYCHRONK2-001',
            'internal_id' => 'IT-KEY-001',
            'status' => 'En Uso',
            'photo_path' => 'https://via.placeholder.com/200/CCCCCC/000000?text=Teclado',
        ]);

        Asset::create([
            'asset_type' => 'Mouse',
            'name' => 'Mouse Logitech MX Master 3S',
            'serial_number' => 'LOGIMX3S-001',
            'internal_id' => 'IT-MOU-001',
            'status' => 'En Uso',
            'photo_path' => 'https://via.placeholder.com/200/CCCCCC/000000?text=Mouse',
        ]);

        Asset::create([
            'asset_type' => 'Silla Ergonómica',
            'name' => 'Silla Ergonómica Herman Miller Aeron',
            'serial_number' => 'HMAERON-001',
            'internal_id' => 'OFF-CHR-001',
            'status' => 'En Uso',
            'photo_path' => 'https://via.placeholder.com/200/CCCCCC/000000?text=Silla',
        ]);

        Asset::create([
            'asset_type' => 'Laptop',
            'name' => 'Dell XPS 15',
            'serial_number' => 'DELLXPS15-001',
            'internal_id' => 'IT-LP-002',
            'status' => 'Disponible',
            'photo_path' => 'https://via.placeholder.com/200/CCCCCC/000000?text=DellXPS',
        ]);

        Asset::create([
            'asset_type' => 'Monitor',
            'name' => 'Samsung Odyssey G7',
            'serial_number' => 'SAMSG7-001',
            'internal_id' => 'IT-MON-002',
            'status' => 'En Reparación',
            'photo_path' => 'https://via.placeholder.com/200/CCCCCC/000000?text=Odyssey',
        ]);
    }
}
