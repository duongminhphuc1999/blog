<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/user/create', [UserController::class, 'create']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/me', [UserController::class, 'me'])->middleware('auth:api');
Route::delete('/logout', [AuthController::class, 'logout'])->middleware('auth:api');
