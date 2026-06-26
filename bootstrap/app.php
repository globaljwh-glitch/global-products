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

        $middleware->alias([
            'frontauth' => \App\Http\Middleware\FrontAuth::class,
        ]);
        
        if ($_ENV['APP_ENV'] ?? 'local' === 'production') {
            $middleware->trustProxies(at: '*');
        }
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();

