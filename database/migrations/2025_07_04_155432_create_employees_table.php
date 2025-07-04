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
        Schema::create('employees', function (Blueprint $table) {
            $table->id(); // id bigint [pk, increment]
            $table->string('first_name'); // Nombre del empleado
            $table->string('last_name'); // Apellido del empleado
            $table->string('employee_id_number')->unique(); // ID único de la empresa para el empleado
            $table->string('position'); // Cargo o puesto
            $table->date('hiring_date'); // Fecha de contratación
            $table->string('company_name')->nullable(); // Nombre de la empresa (opcional)
            $table->string('photo_path')->nullable(); // Ruta o URL de la foto del empleado (opcional)
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
