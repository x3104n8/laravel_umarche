<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        // web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            //Route::middleware('web')->prefix('/')->name('user.')->group(__DIR__ . '/../routes/web.php');
            //Route::middleware('web')->prefix('owner')->name('owner.')->group(__DIR__ . '/../routes/owner.php');
            //Route::middleware('web')->prefix('admin')->name('admin.')->group(__DIR__ . '/../routes/admin.php');
            Route::prefix('/')->as('user.')->middleware('web')->group(__DIR__ . '/../routes/web.php');
            Route::prefix('owner')->as('owner.')->middleware('web')->group(__DIR__ . '/../routes/owner.php');
            Route::prefix('admin')->as('admin.')->middleware('web')->group(__DIR__ . '/../routes/admin.php');
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->redirectGuestsTo(function(Request $request){
            if(request()->routeIs('owner*')){
                return $request->expectsJson() ? null : route('owner.login');
            } else if(request()->routeIs('admin*')){
                return $request->expectsJson() ? null : route('admin.login');
            }
            return $request->expectsJson() ? null : route('user.login');
        });
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
