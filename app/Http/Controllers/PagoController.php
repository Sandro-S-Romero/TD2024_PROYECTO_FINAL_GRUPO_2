<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function procesar(Request $request)
    {
        // Lógica para procesar el pago
        return redirect()->route('home')->with('success', 'Pago procesado correctamente.');
    }
}
