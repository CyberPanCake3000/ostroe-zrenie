<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientsController;


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
//Auth::routes();
Route::get('/', [HomeController::class, 'home'])->name('home');
//Route::get('/clients', [OrdersController::class, 'clients'])->name('clients');
Route::get('/support', [HomeController::class, 'support'])->name('support');
//    ->middleware('auth');

Route::resource('orders', OrdersController::class);
Route::resource('clients', ClientsController::class);
