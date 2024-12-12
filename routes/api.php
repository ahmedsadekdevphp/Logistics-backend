<?php

use App\Http\Controllers\Api\User\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Api\User\OrderController;
use App\Http\Controllers\Api\User\RegisterController;
use Illuminate\Support\Facades\DB;
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


Route::post('/register', [RegisterController::class, 'store']);
Route::post('/login', [AuthController::class, 'store']);

Route::middleware('auth:api')->group(function () {
    Route::resource('orders', OrderController::class)->only(['index', 'store']);
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});
