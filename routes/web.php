<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormOrderController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LayoutPickerController;

use App\Http\Controllers\UserRequestController;
use App\Http\Controllers\ProgressController;

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
    return view('welcome');
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/form_order', FormOrderController::class)->except(['create', 'edit', 'show', 'destroy']);
    Route::resource('/layout_picker', LayoutPickerController::class)->except(['create', 'store', 'show', 'edit', 'destroy']);
    Route::resource('/produk', ProductController::class)->except(['index', 'create', 'show', 'edit']);
    Route::get('/pricing', [PricingController::class, 'index'])->name('pricing.index');

    Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::resource('/user_request', UserRequestController::class)->only(['index', 'show']);
        Route::resource('/progress', ProgressController::class)->only(['index', 'show', 'update']);
    });
});
