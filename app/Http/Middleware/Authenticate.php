<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Maneja una solicitud entrante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        // Verificar si el usuario está autenticado
        if (Auth::check()) {
            return $next($request);
        }

        // Si no está autenticado, redirigir a la página de inicio de sesión
        return redirect()->route('login');
    }
    protected function redirectTo($request)
{
    if (!$request->expectsJson()) {
        session()->flash('error', 'Debes iniciar sesión para acceder al carrito');
        return route('login');
    }
}

}
