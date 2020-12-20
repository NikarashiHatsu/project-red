<?php

use App\Http\Controllers\FormOrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LayoutPickerController;
use App\Models\LayoutPicker;
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
    
    Route::resource('/form_order', FormOrderController::class)->except(['create', 'edit', 'show', 'destroy']);
    Route::resource('/layout_picker', LayoutPickerController::class)->except(['create', 'store', 'show', 'edit', 'destroy']);
    Route::resource('/produk', ProductController::class)->except(['index', 'create', 'show', 'edit']);
});
