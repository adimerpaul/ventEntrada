<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::apiResource('carousels',\App\Http\Controllers\CarouselController::class);
Route::apiResource('carteleras',\App\Http\Controllers\CarteleraController::class);
Route::apiResource('movies',\App\Http\Controllers\MovieController::class);
Route::get('disponibles',[\App\Http\Controllers\CarteleraController::class,'disponibles']);
Route::get('searchCatelera/{movie_id}',[\App\Http\Controllers\CarteleraController::class,'searchCatelera']);
