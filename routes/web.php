<?php

use App\Http\Controllers\CartController;
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

Route::post('/addtocart', [CartController::class, 'addCart'])->name('addtocart');


Route::get('/events', [CartController::class, 'index'])->name('events');

Route::get('/updatecart/{id}', [CartController::class, 'updateCart']);

Route::get('/events/cart/checkout ', [CartController::class, 'checkoutCart'])->name('checkout');
