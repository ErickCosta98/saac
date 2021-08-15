<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     * Proyecto creado por Erick Fernando Hernandez Costa
     * @var array
     */
    protected $except = [
        'proyecto/img/subir',
        //
    ];
}
