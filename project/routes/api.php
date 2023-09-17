<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::POST('login',  [AuthController::class, 'login'])->name('login');

Route::middleware('auth:api')->prefix('/order')->group(function () {
    Route::POST('create',[OrderController::class, 'store'])->name('order-create');
});

Route::middleware('auth:api')->group(function () {
    Route::POST('logout',  [AuthController::class, 'logout'])->name('login');
});
