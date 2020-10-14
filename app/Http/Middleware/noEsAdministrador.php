<?php

namespace App\Http\Middleware;

use Closure;

class noEsAdministrador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user()->empleado->cargo->nombre != 'Administrador') {
            abort(403, "¡Acceso Denegado!");
        }
        return $next($request);
    }
}
