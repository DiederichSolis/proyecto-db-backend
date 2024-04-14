<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/areas',
    '/areas/*',
    '/test',
    '/clientes',
    '/usuarios',
    '/login',
    '/mesas',
    '/cuenta',
    '/platos',
    '/drinks',
    '/ordenes',
    '/pagos',
    '/meseros',
    '/encuestas',
    '/quejas',
    '/facturas',
    '/getareas',
    '/getclientes',
    '/getcuenta',
    '/getdrinks',
    '/getencuestas',
    '/getfacturas',
    '/getmesas',
    '/getmeseros',
    '/getordenes',
    '/getpagos',
    '/getplatos',
    '/getquejas',
    '/getusuarios'
    ];
}