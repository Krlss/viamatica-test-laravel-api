<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\api\PersonController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\RolController;
use App\Http\Controllers\api\RolOptionController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/person', [PersonController::class, 'store']);
Route::get('/person', [PersonController::class, 'index']);
Route::get('/person/{id}', [PersonController::class, 'show']);
Route::put('/person/{id}', [PersonController::class, 'update']);
Route::delete('/person/{id}', [PersonController::class, 'destroy']);

Route::post('/rol', [RolController::class, 'store']);
Route::get('/rol', [RolController::class, 'index']);
Route::get('/rol/{id}', [RolController::class, 'show']);
Route::put('/rol/{id}', [RolController::class, 'update']);
Route::delete('/rol/{id}', [RolController::class, 'destroy']);

Route::post('/rol_option', [RolOptionController::class, 'store']);
Route::get('/rol_option', [RolOptionController::class, 'index']);
Route::get('/rol_option/{id}', [RolOptionController::class, 'show']);
Route::put('/rol_option/{id}', [RolOptionController::class, 'update']);
Route::delete('/rol_option/{id}', [RolOptionController::class, 'destroy']);

Route::post('/user', [UserController::class, 'store']);
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'show']);
Route::put('/user/{id}', [UserController::class, 'update']);
Route::delete('/user/{id}', [UserController::class, 'destroy']);


Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

