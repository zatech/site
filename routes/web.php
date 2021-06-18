<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [ 'as' => 'welcome', 'uses' => WelcomeController::class, ]);
Route::post('invite', [ 'as' => 'invite:post', 'uses' => InvitePostController::class, ]);

Route::get('report', [ 'as' => 'report', 'uses' => ReportGetController::class, ]);
Route::post('report', [ 'as' => 'report:post', 'uses' => ReportPostController::class, ]);

Route::group([ 'as' => 'auth.', 'prefix' => 'auth', ], function () {
    Route::get('connect', [ 'as' => 'connect', 'uses' => AuthConnectController::class, ]);
});
