<?php

use App\Http\Middleware\UserIsAdmin;
use App\Http\Middleware\UserIsWriter;
use App\Http\Middleware\UserIsRevisor;
use Illuminate\Foundation\Application;
use App\Http\Middleware\EnsureTokenIsValid;
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
        // Configura alias per middleware
        $middleware->alias([
            'admin' => UserIsAdmin::class,
            'revisor' => UserIsRevisor::class,
            'writer' => UserIsWriter::class,
        ]);

        // Appendi middleware per le rotte web
        $middleware->web(append: [
            SetLocaleMiddleware::class,
            UserIsAdmin::class, // Aggiunto esempio per il middleware di esempio
        ]);

        // Configura alias aggiuntivo se necessario
        $middleware->alias([
            'isRevisor' => UserIsRevisor::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Gestione delle eccezioni (da completare se necessario)
    })
    ->create();


// use App\Http\Middleware\UserIsAdmin;
// use App\Http\Middleware\UserIsWriter;
// use App\Http\Middleware\UserIsRevisor;
// use Illuminate\Foundation\Application;
// use App\Http\Middleware\EnsureTokenIsValid;
// use App\Http\Middleware\SetLocaleMiddleware;
// use Illuminate\Foundation\Configuration\Exceptions;
// use Illuminate\Foundation\Configuration\Middleware;

// return Application::configure(basePath: dirname(__DIR__))

//     ->withRouting(
//         web: __DIR__.'/../routes/web.php',
//         commands: __DIR__.'/../routes/console.php',
//         health: '/up',
//     )
//     ->withMiddleware(function (Middleware $middleware) {
//         $middleware->alias([
//             'admin' => App\Http\Middleware\UserIsAdmin::class,
//             'revisor' => App\Http\Middleware\UserIsRevisor::class,
//             'writer' => App\Http\Middleware\UserIsWriter::class,
//         ]);
//         $middleware->web(append: [SetLocaleMiddleware::class]);
//         $middleware->alias([
//             'isRevisor' => UserIsRevisor::class
//         ]);
//     })
//     ->withExceptions(function (Exceptions $exceptions) {
//         //
//     })->create();
