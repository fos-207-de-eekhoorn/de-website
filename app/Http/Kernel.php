<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
        \Fruitcake\Cors\HandleCors::class,
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            'encrypt_cookies',
            'queued_cookies',
            'start_session',
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            'errors_session',
            'csrf',
            'bindings',
            'frame_guard',
        ],

        'api' => [
            'encrypt_cookies',
            'queued_cookies',
            'start_session',
            'csrf',
            'throttle:60,1',
            'bindings',
            'frame_guard',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'auth' => \App\Http\Middleware\Authenticate::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'csrf' => \App\Http\Middleware\VerifyCsrfToken::class,
        'decrypt' => \App\Http\Middleware\DecryptRequestData::class,
        'encrypt_cookies' => \App\Http\Middleware\EncryptCookies::class,
        'errors_session' => \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        'frame_guard' => \Illuminate\Http\Middleware\FrameGuard::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'queued_cookies' => \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'start_session' => \Illuminate\Session\Middleware\StartSession::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
    ];
}
