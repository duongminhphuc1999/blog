<?php

use App\Enums\Permissions;
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

Route::post('/login', [AuthController::class, 'login']);
Route::get('/me', [UserController::class, 'me'])->middleware('auth:api');
Route::delete('/logout', [AuthController::class, 'logout'])->middleware('auth:api');
Route::delete('/logout', [AuthController::class, 'register'])->middleware(['auth:api', 'permission:' . Permissions::CREATE_USER->value]);


Route::post('/users/store', [UserController::class, 'store']);
Route::get('/users/{users}', [UserController::class, 'showProfile'])->middleware('auth:api');
Route::get('/users', [UserController::class, 'index'])->middleware('auth:api');
