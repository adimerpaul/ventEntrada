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
Route::post('sociallogin/{provider}', [\App\Http\Controllers\AuthController::class,'SocialSignup']);
Route::get('disponibles',[\App\Http\Controllers\CarteleraController::class,'disponibles']);
Route::get('searchCatelera/{movie_id}',[\App\Http\Controllers\CarteleraController::class,'searchCatelera']);
Route::post('upload/{id}/{option}', [\App\Http\Controllers\UploadController::class, 'upload']);
Route::apiResource('carousels',\App\Http\Controllers\CarouselController::class);
Route::apiResource('movies',\App\Http\Controllers\MovieController::class);
Route::post('/login', [\App\Http\Controllers\UserController::class,'login']);

Route::group(['middleware'=>'auth:sanctum'],function (){
    Route::get('seatsSearch/{cartelera_id}',[\App\Http\Controllers\SeatsController::class,'seatsSearch']);
    Route::post('/me', [\App\Http\Controllers\UserController::class,'me']);
    Route::post('/logout', [\App\Http\Controllers\UserController::class,'logout']);
    Route::apiResource('sales',\App\Http\Controllers\SaleController::class);
    Route::post('cantidadPedidaUserMax4',[\App\Http\Controllers\SaleController::class,'cantidadPedidaUserMax4']);

    Route::apiResource('carteleras',\App\Http\Controllers\CarteleraController::class);
//    Route::resource('/user',\App\Http\Controllers\UserController::class);
//    Route::resource('/address',\App\Http\Controllers\AddressController::class);
//    Route::resource('/sales',\App\Http\Controllers\SaleController::class);
//    Route::resource('/invoices',\App\Http\Controllers\InvoiceController::class);
});
