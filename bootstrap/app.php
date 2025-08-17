<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web:[
            __DIR__.'/../routes/web.php',
            __DIR__.'/../routes/docs/0.2x.php',
            __DIR__.'/../routes/docs/0.3x.php',
            ],
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
        health: '/up',

    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'docsRoute'       => \App\Facades\DocsRoute::class,
            'Docs' => App\Facades\Docs::class,
            ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
