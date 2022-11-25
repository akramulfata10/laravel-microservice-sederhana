<?php

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

Route::get('posts', [\App\Http\Controllers\PostController::class, 'index']);
Route::post('posts', [\App\Http\Controllers\PostController::class, 'store']);
Route::post('posts/{id}/comments', [\App\Http\Controllers\PostController::class, 'comment']);