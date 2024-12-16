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
        Schema::create('carrito_detalles', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->foreignId('carrito_cabecera_id')->constrained('carrito_cabeceras')->onDelete('cascade');
            // Relación con la tabla 'carrito_cabeceras'
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade'); 
            // Relación con la tabla 'productos'
            $table->integer('cantidad'); // Cantidad de productos
            $table->decimal('precio', 8, 2); // Precio por unidad al momento de la compra
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrito_detalles');
    }
};
