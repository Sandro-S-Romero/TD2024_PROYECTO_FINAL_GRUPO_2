<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Carrito;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class CarritoController extends Controller
{
    public function agregarAlCarrito($id)
    {
        if (Auth::check()) {
            $producto = Producto::findOrFail($id);

            $carrito = Carrito::where('user_id', Auth::id())
                              ->where('producto_id', $producto->id)
                              ->first();

            if ($carrito) {
                $carrito->cantidad += 1;
                $carrito->save();
            } else {
                Carrito::create([
                    'user_id' => Auth::id(),
                    'producto_id' => $producto->id,
                    'cantidad' => 1,
                ]);
            }

            return redirect()->route('carrito.index')->with('success', 'Producto añadido al carrito');
        }

        return redirect()->route('login')->with('error', 'Necesitas iniciar sesión para agregar productos al carrito');
    }

    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para acceder al carrito');
        }
        $carrito = Carrito::with('producto')->where('user_id', Auth::id())->get();
       

        return view('carrito.index', compact('carrito'));
    }

    public function destroy($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para eliminar productos del carrito');
        }

        $carrito = Carrito::where('user_id', Auth::id())->where('id', $id)->first();

        if ($carrito) {
            $carrito->delete();
            return redirect()->route('carrito.index')->with('success', 'Producto eliminado del carrito');
        }

        return redirect()->route('carrito.index')->with('error', 'Producto no encontrado en el carrito');
    }


    public function store(Request $request)
{
    $producto = Producto::findOrFail($request->producto_id);

    // Agregar al carrito (puedes usar una sesión o un modelo específico)
    $carrito = session()->get('carrito', []);
    $id = $producto->id;

    if (isset($carrito[$id])) {
        $carrito[$id]['cantidad'] += $request->cantidad;
    } else {
        $carrito[$id] = [
            'producto' => $producto,
            'cantidad' => $request->cantidad,
        ];
    }

    session()->put('carrito', $carrito);

    return redirect()->back()->with('success', 'Producto añadido al carrito correctamente.');
}

}
