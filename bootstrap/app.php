<?php

use App\Http\Middleware\EnsureGuest;
use App\Http\Middleware\LoginAdmin;
use App\Http\Middleware\LoginCustomer;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->appendToGroup('login-admin', [
            LoginAdmin::class,
        ]);
    })
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->appendToGroup('login-customer', [
            LoginCustomer::class,
        ]);
    })
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->appendToGroup('guest', [
            EnsureGuest::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
