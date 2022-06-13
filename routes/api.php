<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProdukApiController;
use Illuminate\Http\Request;
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

Route::controller(AuthController::class)->group(function() {
    Route::post('/regis', 'regis');
    Route::post('/login', 'login');
    
});

Route::controller(ProdukApiController::class)->group(function() {
    Route::get('/produk', 'getProduk');

 
    
});