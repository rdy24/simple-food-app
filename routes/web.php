<?php

use App\Http\Controllers\Web\Authentication\LoginController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\FoodManagement\CategoryController;
use App\Http\Controllers\Web\FoodManagement\FoodController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.authenticate');
});

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.','middleware' => 'auth'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    // Category Route
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::get('/category/{category}', [CategoryController::class, 'show'])->name('category.show');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');

    // Food Route
    Route::get('/food', [FoodController::class, 'index'])->name('food.index');
    Route::get('/food/create', [FoodController::class, 'create'])->name('food.create');
    Route::get('/food/{food}', [FoodController::class, 'show'])->name('food.show');
    Route::post('/food', [FoodController::class, 'store'])->name('food.store');
    Route::get('/food/{food}/edit', [FoodController::class, 'edit'])->name('food.edit');
    Route::put('/food/{food}', [FoodController::class, 'update'])->name('food.update');
    Route::delete('/food/{food}', [FoodController::class, 'destroy'])->name('food.destroy');
});