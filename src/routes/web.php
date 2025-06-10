<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RegisterController;


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

Route::get('/products', [IndexController::class, 'index']);
Route::get('/products/search', [IndexController::class, 'indexSearch']);

Route::get('/products/register', [RegisterController::class, 'index']);
Route::get('/products/{productId}', [ProductsController::class, 'productId']);