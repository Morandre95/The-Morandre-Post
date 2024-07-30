<?php

use App\Http\Middleware\UserIsAdmin;
use App\Http\Middleware\UserIsWriter;
use App\Http\Middleware\UserIsRevisor;
use Illuminate\Foundation\Application;
use App\Http\Middleware\SetLocaleMiddleware;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => App\Http\Middleware\UserIsAdmin::class,
            'revisor' => App\Http\Middleware\UserIsRevisor::class,
            'writer' => App\Http\Middleware\UserIsWriter::class,
        ]);
        $middleware->web(append: [SetLocaleMiddleware::class]);
        $middleware->alias([
            'isRevisor' => UserIsRevisor::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
