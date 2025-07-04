<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id(); // id bigint [pk, increment]
            $table->string('asset_type'); // Tipo de item (ej. Laptop, Monitor)
            $table->string('name'); // Nombre del item (ej. Laptop Dell Latitude 7420)
            $table->string('serial_number')->unique(); // Número de serie único
            $table->string('internal_id')->unique()->nullable(); // ID interno del item (opcional y único)
            $table->string('status'); // Estado actual (En Uso, En Reparación, etc.)
            $table->string('photo_path')->nullable(); // Ruta o URL de la foto del item (opcional)
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
