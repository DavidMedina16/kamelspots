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
        Schema::create('asset_assignments', function (Blueprint $table) {
            $table->id(); // id bigint [pk, increment]
            // Clave foránea para el empleado
            $table->foreignId('employee_id')->constrained()->onDelete('cascade');
            // Esto es una forma concisa de hacer:
            // $table->unsignedBigInteger('employee_id');
            // $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');

            // Clave foránea para el activo
            $table->foreignId('asset_id')->constrained()->onDelete('cascade');
            // Esto es una forma concisa de hacer:
            // $table->unsignedBigInteger('asset_id');
            // $table->foreign('asset_id')->references('id')->on('assets')->onDelete('cascade');

            $table->date('assignment_date'); // Fecha de asignación
            $table->date('return_date')->nullable(); // Fecha de devolución (puede ser nulo)
            $table->text('notes')->nullable(); // Notas adicionales sobre la asignación (puede ser nulo)
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_assignments');
    }
};
