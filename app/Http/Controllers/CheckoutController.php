<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrito;
use Illuminate\Support\Facades\Auth; 

class CheckoutController extends Controller
{
    public function index()
    {
        // Verificar si el usuario está autenticado
        if (!Auth::check()) { // Cambié auth()->check() por Auth::check()
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para acceder al carrito');
        }

        // Obtener el carrito del usuario autenticado
        $carrito = Carrito::where('user_id', Auth::id())->get(); 

        // Si el carrito está vacío, redirigir al carrito
        if ($carrito->isEmpty()) {
            return redirect()->route('carrito.index')->with('error', 'No tienes productos en tu carrito.');
        }

        // Pasar el carrito a la vista de checkout
        return view('checkout.index', compact('carrito'));
    }

    public function procesarPago(Request $request)
    {
        // Validar los datos del formulario de pago
        $validated = $request->validate([
            'card_number' => 'required|string',
            'expiry_date' => 'required|string',
            'cvv' => 'required|string',
        ]);

        // Aquí iría la integración con la API de pago (Stripe, PayPal, etc.)

        // Si el pago es exitoso
        return redirect()->route('home')->with('success', 'Pago procesado correctamente');
    }
}
