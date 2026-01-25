<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
        $middleware->validateCsrfTokens(except: [
            //'*' // El asterisco actúa como comodín para todas las rutas
//            'stripe/*',
//            'webhook/pagos',
//            'http://mi-sitio.com/api-sin-proteccion',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
