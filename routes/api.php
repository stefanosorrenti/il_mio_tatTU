<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TattooApiController;


/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); */


Route::get('/tattoos', [TattooApiController::class, 'index']);
Route::get('/tattoos/{id}', [TattooApiController::class, 'show']);