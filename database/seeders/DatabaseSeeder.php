<?php

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductosSeeder extends Seeder
{
    public function run()
    {
        Producto::create([
            'nombre' => 'Lector Biométrico Básico',
            'precio' => 99.99,
            'imagen_url' => 'https://via.placeholder.com/150',
        ]);

        Producto::create([
            'nombre' => 'Lector Biométrico Avanzado',
            'precio' => 199.99,
            'imagen_url' => 'https://via.placeholder.com/150',
        ]);
    }
}
