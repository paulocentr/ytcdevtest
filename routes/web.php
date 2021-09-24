<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\NumberController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [SiteController::class, 'home'])->name('home');
Auth::routes(['register' => false]);

Route::middleware('auth')->name('auth.')->group(function() {
    Route::resource('customers', CustomerController::class);
    Route::resource('{customer}/numbers', NumberController::class);
});


