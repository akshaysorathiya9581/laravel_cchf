<?php


use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UsersController;

// Route::post('/login', [AuthenticatedSessionController::class, 'login']);
// Route::post('/register', [AuthenticatedSessionController::class, 'register']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('payment/process/{campaignId}', [PaymentController::class, 'processPayment']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'logout']);
    Route::get('/users', [UsersController::class, 'index']);
});
