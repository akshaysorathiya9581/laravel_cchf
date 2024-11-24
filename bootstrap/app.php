<?php

use App\Http\Middleware\checkOrganizationId;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\RoleMiddleware;
use  App\Http\Middleware\SetDatabaseConnection;
use  App\Http\Middleware\AdminSessionMiddleware;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php', // Make sure API routes are included
        commands: __DIR__ . '/../routes/console.php',

        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //


        $middleware->alias([
            'role' => RoleMiddleware::class,
            'isSetOrganization' => checkOrganizationId::class,
            'setDatabase' => SetDatabaseConnection::class,
            'admin.session' => AdminSessionMiddleware::class,
            'auth:sanctum' => \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'visitor' => \App\Http\Middleware\TrackVisitor::class,
        ]);

        $middleware->group('api', [
            EnsureFrontendRequestsAreStateful::class,
            // 'throttle:api',
            // \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ]);
        // $middleware->add('auth', \App\Http\Middleware\Authenticate::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
