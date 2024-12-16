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
        Schema::create('productos', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->string('descripcion'); // Descripción del producto
            $table->string('codigo')->unique(); // Código único del producto
            $table->decimal('precio', 8, 2); // Precio con 8 dígitos y 2 decimales
            $table->integer('incremento')->default(0); // Porcentaje de incremento, por defecto 0
            $table->integer('stock'); // Cantidad de unidades en inventario
            $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade'); 
            // Relación con la tabla 'categorias'
            $table->timestamps(); // Crea 'created_at' y 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
