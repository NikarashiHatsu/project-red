<?php

use App\Http\Controllers\FormOrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return view('welcome');
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function() {
    // Dashboard
    Route::get('/dashboard', function() {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // Form Order
    Route::group(['prefix' => 'form-order', 'as' => 'form-order.'], function() {
        Route::resource('/', FormOrderController::class)->except(['create', 'edit', 'show', 'destroy']);
        Route::get('/check_information/{user_id}', [FormOrderController::class, 'check_information'])->name('check_information');
    });

    // Produk
    Route::group(['prefix' => 'produk', 'as' => 'produk.'], function() {
        Route::resource('/', ProductController::class);
    });
});
