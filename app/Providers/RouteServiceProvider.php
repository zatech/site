<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public const HOME = '/';

    public function boot()
    {
        $this->routes(function () {
            Route::prefix('slack')
                ->middleware('slack')
                ->namespace('App\Http\Controllers\Slack')
                ->group(base_path('routes/slack.php'))
                ;

            Route::middleware('web')
                ->namespace('App\Http\Controllers')
                ->group(base_path('routes/web.php'));
        });
    }
}
