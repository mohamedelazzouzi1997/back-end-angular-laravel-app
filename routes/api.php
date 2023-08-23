<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\BookController;

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

route::post('login',[AuthController::class,'login']);
route::post('register',[AuthController::class,'register']);

Route::post('number/messages', [BookController::class, 'index']);
Route::get('books', [BookController::class, 'getAll']);
Route::post('books', [BookController::class, 'store']);
Route::get('book/{id}', [BookController::class, 'show']);
Route::put('book/update/{id}', [BookController::class, 'update']);
Route::delete('book/delete/{id}', [BookController::class, 'destroy']);
route::post('logout',[AuthController::class,'logout']);
// Route::middleware(['auth:sanctum'])->group(function () {

// });