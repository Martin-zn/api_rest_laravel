<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\AuthController;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth',
], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
    Route::post('register', [AuthController::class, 'register']);
});

Route::get('/test', function () {
    return response()->json(['message' => 'API funcionando']);
});

Route::middleware('auth:api')->group(function () {
    Route::apiResource('proveedores', ProveedorController::class);
    //Esto genera las rutas:
    // /api/proveedores GET
    // /api/proveedores/{id} GET
    // /api/proveedores POST
    // /api/proveedores/{id} PUT
    // /api/proveedores/{id} DELETE

});