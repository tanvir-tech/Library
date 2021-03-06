<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/login', function () {
    return view('auth/login');
});
Route::post('/login',[UserController::class,'login']);
Route::get('/logout',[UserController::class,'logout']);
Route::get('/registration', function () {
    return view('auth/registration');
});

Route::post('/registration',[UserController::class,'registration']);


// book
Route::get('/insertBook', function () {
    return view('admin/insertBook');
});
Route::post('/insertBook',[BookController::class,'insertBook']);

Route::get('/',[BookController::class,'showBooks']);
Route::get('/home',[BookController::class,'showBooks']);
Route::get('/search',[BookController::class,'search']);
Route::get('detail/{id}',[BookController::class,'detail']);



// cart
Route::post('/cart',[CartController::class,'addToCart']);

Route::get('/cartlist',[CartController::class,'cartlist']);

Route::get('removeCart/{id}',[CartController::class,'removeCart']);

Route::get('/orderNow',[CartController::class,'orderNow']);

Route::post('/placeOrder',[CartController::class,'placeOrder']);

Route::get('/orderlist',[CartController::class,'orderlist']);
