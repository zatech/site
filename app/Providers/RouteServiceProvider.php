<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public function map()
    {
        Route::prefix('slack')
            ->middleware('slack')
            ->namespace('App\Http\Controllers\Slack')
            ->group(base_path('routes/slack.php'))
            ;

        Route::middleware('web')
            ->namespace('App\Http\Controllers')
            ->group(base_path('routes/web.php'))
            ;
    }
}
