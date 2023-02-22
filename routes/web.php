<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\SearchController;


//Auth::routes();
Route::get('/', [HomeController::class, 'home'])->name('home');
//Route::get('/clients', [OrdersController::class, 'clients'])->name('clients');
Route::get('/support', [HomeController::class, 'support'])->name('support');
//    ->middleware('auth');

Route::resource('orders', OrdersController::class)->except(
    ['create']
);

Route::resource('customers', CustomersController::class)->except(
    ['create', 'store']
);

Route::get('/customersSearch', [SearchController::class, 'customersSearch'])->name('customersSearch');
Route::get('/customerSearch', [SearchController::class, 'customerSearch'])->name('customerSearch');
Route::get('/phoneSearch', [SearchController::class, 'phoneSearch'])->name('phoneSearch');
Route::get('/suggestionsSearch', [SearchController::class, 'suggestionsSearch'])->name('suggestionsSearch');
Route::post('/search', [SearchController::class, 'search'])->name('search');
