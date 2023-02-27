<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;


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


    Route::get('/user', [UserController::class, 'data']);
    Route::post('/user/create', [UserController::class, 'create']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'signup']);
    Route::post('/user', [UserController::class, 'store']);

    Route::post('book', [BookController::class, 'yandex']);
    Route::get('book/{id}', [BookController::class, 'spandex']);
    Route::post('book/create', [BookController::class, 'store']);
    Route::delete('book/delete/{id}', [BookController::class, 'destroy']);
    Route::put('book/update/{id}', [BookController::class, 'update']);






Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response()->json([ 'valid' => auth()->check() ]);
});
