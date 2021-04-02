<?php

use App\Application\API\Controllers\{
    LoginController,
    ProfileController,
    UsersController
};
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

Route::prefix('auth')
    ->as('auth.')
    ->group(function () {
        Route::post('login', [LoginController::class, 'login'])->name('login');
        Route::middleware('auth:sanctum')->group(function () {
            Route::delete('logout', [LoginController::class, 'logout'])->name('logout');
            Route::get('profile', ProfileController::class)->name('profile');
        });
    });

Route::middleware('auth:sanctum')
    ->group(function () {
        Route::get('users', [UsersController::class, 'index']);
    });
