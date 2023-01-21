<?php

use App\Http\Controllers\Api\Authentication\LoginController;
use App\Http\Controllers\Api\Authentication\LogoutController;
use App\Http\Controllers\Api\FoodManagement\CategoryController;
use App\Http\Controllers\Api\FoodManagement\FoodController;
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

Route::middleware('jwt.verify')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', LoginController::class);
Route::post('/logout', LogoutController::class);

Route::middleware('jwt.verify')->group(function () {
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::get('/categories/{slug}', [CategoryController::class, 'show']);
    Route::put('/categories/{uuid}', [CategoryController::class, 'update']);
    Route::delete('/categories/{uuid}', [CategoryController::class, 'destroy']);

    Route::get('/foods', [FoodController::class, 'index']);
    Route::post('/foods', [FoodController::class, 'store']);
    Route::get('/foods/{uuid}', [FoodController::class, 'show']);
    Route::put('/foods/{uuid}', [FoodController::class, 'update']);
    Route::delete('/foods/{uuid}', [FoodController::class, 'destroy']);
});


