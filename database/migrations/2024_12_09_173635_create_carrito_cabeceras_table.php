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
        Schema::create('carrito_cabeceras', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->dateTime('fecha'); // Fecha y hora de la compra
            $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade'); 
            // Relación con la tabla 'users' (si estás usando el sistema de autenticación de Laravel)
            $table->decimal('total', 10, 2); // Total de la compra
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrito_cabeceras');
    }
};
