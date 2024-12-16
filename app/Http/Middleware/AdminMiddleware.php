<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // Verificar si el usuario está autenticado y si su rol es 'admin'
        if (Auth::check() && Auth::user()->role == 'admin') {
            return $next($request);  // Permitir el acceso si es administrador
        }

        // Redirigir a la página principal con un mensaje de error si no es administrador
        return redirect('/')->with('error', 'No tienes permiso para acceder a esta página.');
    }
}
