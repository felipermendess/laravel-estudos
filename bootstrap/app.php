<?php

use App\Http\Middleware\HasEmailVerified;
use App\Http\Middleware\OnlyAdmins;
use App\Http\Middleware\Test1;
use App\Http\Middleware\Test2;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // duas camadas nativas
        $middleware->web([], []);
        $middleware->api([], []);
        // $middleware->append(Test1::class);
        $middleware->appendToGroup('test', [
            Test1::class,
            Test2::class
        ]);
        $middleware->alias([
            'test1' => Test1::class,
            'test2' => Test2::class,
            'onlyAdmin' => OnlyAdmins::class,
            'emailVerified' => HasEmailVerified::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
