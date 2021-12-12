<?php

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

//Auth
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);


//Public
Route::get('/product', [\App\Http\Controllers\ProductController::class, 'index']);
Route::get('/product/show/{id}', [\App\Http\Controllers\ProductController::class, 'show']);
Route::get('/product/search/{name}', [\App\Http\Controller\ProductController::class, 'search']);
//Protect
Route::middleware('auth:sanctum')->post('/product/store', [\App\Http\Controllers\ProductController::class, 'store']);
Route::middleware('auth:sanctum')->post('/product/update', [\App\Http\Controllers\ProductController::class, 'update']);
Route::delete('/product/{id}', [\App\Http\Controller\ProductController::class, 'delete']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
