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
        Schema::create('reservas', function (Blueprint $table) {
            $table->bigIncrements('id'); // ID de la reserva
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Clave foránea user_id
            $table->foreignId('cancha_id')->constrained()->onDelete('cascade'); // Clave foránea cancha_id
            $table->date('fecha'); // Solo fecha de la reserva
            $table->time('hora_inicio'); // Hora de inicio de la reserva
            $table->time('hora_fin'); // Hora de fin de la reserva
            $table->string('motivo'); // Motivo de la reserva
            $table->timestamps(); // Tiempos de creación y actualización
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
