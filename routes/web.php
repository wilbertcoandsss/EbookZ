<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [BookController::class, 'index']);

Route::get('/mybooks', [PageController::class, 'goToMyBooks']);

Route::get('/bookDetail/{id}', [PageController::class, 'goToBooksDetail']);

Route::get('/loginPage', [PageController::class, 'goToLoginPage']);

Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/cartPage/{id}', [CartController::class, 'goToCartPage']);

Route::post('/addToCart/{id}', [CartController::class, 'addToCart']);

Route::post('/updateQty/{id}', [CartController::class, 'updateQty']);

Route::get('/deleteCart/{id}', [CartController::class, 'deleteCart']);

Route::get('/checkOut/{id}', [CartController::class, 'checkOut']);
