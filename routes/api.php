<?php

use Application\API\Controllers\LoginController;
use Application\API\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('auth')->group(function () {
    Route::post('login', [LoginController::class, 'login']);
    Route::middleware('auth:sanctum')->group(function () {
        Route::delete('logout', [LoginController::class, 'logout']);
        Route::get('profile', ProfileController::class);
    });
});
