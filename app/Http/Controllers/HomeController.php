<?php

namespace App\Http\Controllers;

use App\Models\Producto;

class HomeController extends Controller
{
    public function index()
    {
        $productos = Producto::all(); // Obtén los productos de la base de datos
        return view('welcome', compact('productos')); // Carga la vista welcome.blade.php
    }
}
