<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        // using: function (): void {
        //     require __DIR__.'/../routes/admin.php';
        //     require __DIR__.'/../routes/client.php';
        // },
    )
    ->withExceptions()
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'is_admin' => \App\Http\Middleware\IsAdmin::class,
            'ensure_wishlist' => \App\Http\Middleware\EnsureWishlistExists::class,
            'role' => \App\Http\Middleware\RoleMiddleware::class,
        ]);
    })->create();
