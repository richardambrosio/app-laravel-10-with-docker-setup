<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\ReplySupportController;
use App\Http\Controllers\Api\SupportController;
use Illuminate\Support\Facades\Route;


Route::post('/login', [AuthController::class, 'auth']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('/supports', SupportController::class);

    Route::get('/replies/{support_id}', [ReplySupportController::class, 'index']);
    Route::post('/replies/{support_id}', [ReplySupportController::class, 'store']);
    Route::delete('/replies/{id}', [ReplySupportController::class, 'destroy']);
});