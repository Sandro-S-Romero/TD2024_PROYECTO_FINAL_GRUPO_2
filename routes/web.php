<?php 

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PagoController;



/*
|----------------------------------------------------------------------
| Rutas principales
|----------------------------------------------------------------------
*/

// Ruta principal (Home)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rutas de páginas estáticas (Quiénes somos, Contacto)
Route::get('/quienes-somos', [PageController::class, 'quienesSomos'])->name('quienes_somos');
Route::get('/contacto', [PageController::class, 'contacto'])->name('contacto');

// Rutas públicas para productos
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');

// Ruta para ver los detalles de un producto (pública)
Route::get('/productos/{producto}', [ProductoController::class, 'show'])->name('productos.show');

/*
|----------------------------------------------------------------------
| Rutas de autenticación
|----------------------------------------------------------------------
*/
Auth::routes(); // Genera rutas como login, register, logout, etc.

/*
|----------------------------------------------------------------------
| Rutas protegidas para administradores
|----------------------------------------------------------------------
*/
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    // Rutas para productos (administración)
    Route::get('/admin/productos/create', [ProductoController::class, 'create'])->name('productos.create');
    Route::post('/admin/productos', [ProductoController::class, 'store'])->name('productos.store');
});

/*
|----------------------------------------------------------------------
| Rutas protegidas para el carrito y compras
|----------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    // Rutas del carrito
    Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
    Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregarAlCarrito'])->name('carrito.agregar');
    Route::delete('/carrito/{id}', [CarritoController::class, 'destroy'])->name('carrito.destroy');
    Route::post('/carrito/compra', [CarritoController::class, 'procesarCompra'])->name('carrito.procesarCompra');

    // Ruta de checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/procesar', [CheckoutController::class, 'procesarPago'])->name('checkout.procesar');

    // Ruta para procesar la compra desde un producto
    Route::post('/productos/compra/{id}', [ProductoController::class, 'procesarCompra'])->name('productos.compra');
});

Route::get('/venta/{producto}', [ProductoController::class, 'venta'])->name('productos.venta');

Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregarAlCarrito'])->name('carrito.agregar');
// routes/web.php

Route::get('/home', [HomeController::class, 'index'])->name('home');
