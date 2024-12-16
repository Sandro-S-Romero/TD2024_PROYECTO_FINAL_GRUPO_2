<?php 


use Illuminate\Support\Facades\Route;
use App\Models\CarritoCabecera;
use App\Models\CarritoDetalle;

// Obtener productos del carrito
Route::get('/carrito', function () {
    // Obtener el carrito con sus detalles y productos relacionados
    $carrito = CarritoCabecera::with('detalles.producto')->first(); // Cambiar según el usuario autenticado

    if (!$carrito) {
        return response()->json(['message' => 'El carrito está vacío'], 404);
    }

    $productos = $carrito->detalles;
    $total = $productos->sum(function ($detalle) {
        return $detalle->cantidad * $detalle->producto->precio;
    });

    return response()->json([
        'productos' => $productos,
        'total' => $total,
    ]);
});

// Eliminar producto del carrito
Route::delete('/carrito/{detalle_id}', function ($detalle_id) {
    $detalle = CarritoDetalle::findOrFail($detalle_id);
    $detalle->delete();

    return response()->json(['message' => 'Producto eliminado']);
});
