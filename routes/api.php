<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\ListtController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\CommentController;;
use App\Http\Controllers\ActivityController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::controller(AuthController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
});
Route::middleware('auth:sanctum')->group(function () {
    Route::ApiResource('activities', ActivityController::class);
});
Route::middleware('auth:sanctum')->group(function () {
    Route::ApiResource('boards', BoardController::class);
});
Route::middleware('auth:sanctum')->group(function () {
    Route::ApiResource('listts', ListtController::class);
});
Route::middleware('auth:sanctum')->group(function () {
    Route::ApiResource('cards', CardController::class);
});
Route::middleware('auth:sanctum')->group(function () {
    Route::ApiResource('comments', CommentController::class);
});