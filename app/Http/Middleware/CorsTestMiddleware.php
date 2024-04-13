<?php

namespace App\Http\Middleware;

use Closure;

class CorsTestMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        // Imprimir la configuración de CORS en la respuesta HTTP
        $response->header('X-Cors-Test', json_encode(config('cors')));

        return $response;
    }
}
