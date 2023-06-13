<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TransactionController;
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

Route::get('/mybooks', [PageController::class, 'goToMyBooks'])->middleware('isLogged');

Route::get('/bookDetail/{id}', [PageController::class, 'goToBooksDetail']);

Route::get('/loginPage', [PageController::class, 'goToLoginPage']);

Route::get('/registerPage', [PageController::class, 'goToRegisterPage']);

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/cartPage/{id}', [CartController::class, 'goToCartPage']);

Route::post('/addToCart/{id}', [CartController::class, 'addToCart']);

Route::post('/updateQty/{id}', [CartController::class, 'updateQty']);

Route::get('/deleteCart/{id}', [CartController::class, 'deleteCart']);

Route::get('/checkOut/{id}', [CartController::class, 'checkOut']);

Route::get('/transactionHistoryPage/{id}', [TransactionController::class, 'transactionHistoryPage']);

Route::get('/transactionDetailPage/{id}', [TransactionController::class, 'transactionDetailPage']);

Route::get('/transactionDetailPageAdmin/{id}', [TransactionController::class, 'transactionDetailPageAdmin']);

Route::get('/readingBookPage/{id}', [BookController::class, 'readingPage'])->name('readingBookPage');

Route::get('/myMission', [PageController::class, 'goToMissionPage']);

Route::post('/claimRewards/{id}/{bid}', [PageController::class, 'claimRewards']);

Route::post('/claimPoints/{id}', [PageController::class, 'claimPoints']);

Route::get('/redeemPoints/{id}', [PageController::class, 'redeemPoints']);

Route::get('beforeReadPage/{id}', [PageController::class, 'beforeReadPage']);

Route::post('/verifyPw/{bid}', [PageController::class, 'verifyPw']);

Route::post('/verifySubs/{sid}', [PageController::class, 'verifySubs']);

Route::get('/adminpage', [PageController::class, 'goToAdminPage']);

Route::get('/dashboard', [PageController::class, 'goToDashboardPage']);

Route::get('/manageBook', [PageController::class, 'goToManageBookPage']);

Route::get('/addBookPage', [PageController::class, 'goToAddBookPage']);

Route::post('/addBook', [BookController::class, 'addBook']);

Route::get('/editBookPage', [PageController::class, 'goToEditBookPage']);

Route::post('/deleteBook/{id}', [BookController::class, 'deleteBook']);

Route::get('/updateBookDetail/{id}', [PageController::class, 'goToUpdateBookDetailPage']);

Route::post('/updateBook/{id}', [BookController::class, 'updateBook']);

Route::post('/search', [BookController::class, 'searchBook']);

Route::get('/profileAdmin', [PageController::class, 'goToProfileAdminPage']);

Route::post('/updateProfileCustomer/{id}', [AuthController::class, 'updateProfileCustomer']);

Route::post('/updateAccountCusomter/{id}', [AuthController::class, 'updateAccountCustomer']);

Route::get('/profileCustomer', [PageController::class, 'goToProfileCustomerPage']);

Route::post('/updateProfileAdmin/{id}', [AuthController::class, 'updateProfileAdmin']);

Route::post('/updateAccountAdmin/{id}', [AuthController::class, 'updateAccountAdmin']);

Route::get('/confirmSubscribe/{id}', [PageController::class, 'goToConfSubPage']);

Route::get('/library', [PageController::class, 'goToLibrary']);

Route::post('/filterData/{id}', [BookController::class, 'filterBook']);

Route::get('/subscriptionPage', [PageController::class, 'goToSubPage']);
