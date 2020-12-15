<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormOrderController;

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

Route::group(['middleware' => ['auth:sanctum', 'verified'], 'prefix' => 'form-order', 'as' => 'form-order.'], function() {
    Route::resource('/', FormOrderController::class);
    Route::get('/check_information/{user_id}', [FormOrderController::class, 'check_information'])->name('check_information');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');
