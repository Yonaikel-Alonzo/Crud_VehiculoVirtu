<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('vehiculo', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_vehiculo'); // Ejemplo: automóvil, moto
            $table->text('descripcion_vehiculo'); // Descripción
            $table->string('categoria'); // Categoría del vehículo
            $table->date('fecha_creacion_matricula'); // Fecha de creación de la matrícula
            $table->date('fecha_caducidad_matricula'); // Fecha de caducidad de la matrícula
            $table->timestamps(); // created_at, updated_at
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculo');
    }
};
