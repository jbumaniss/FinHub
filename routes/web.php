<?php

use App\Http\Controllers\BalanceController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/register', [UserController::class, 'create'])->name('create')->middleware('guest');
Route::post('/users', [UserController::class, 'store'])->name('userStore')->middleware('guest');
Route::post('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/users/authenticate', [UserController::class, 'authenticate'])->name('authenticate')->middleware('guest');
Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard')->middleware('auth');


Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/contacts', [IndexController::class, 'contacts'])->name('contacts');


Route::get('/investment/show', [InvestmentController::class, 'show'])->name('show')->middleware('auth');
Route::get('/investment/manage/searchStocks', [InvestmentController::class, 'searchStocks'])->name('searchStocks')->middleware('auth');


Route::post('/investment/manage/buyStock/{inputVolume}/{stockName}/{stockPrice}/{stockOldPrice}', [InvestmentController::class, 'buyStock'])->name('buyStock')->middleware('auth');
Route::post('/investment/manage/sellStock/{inputVolume}/{stockName}/{stockPrice}/{stockOldPrice}', [InvestmentController::class, 'sellStock'])->name('sellStock')->middleware('auth');

Route::get('/dashboard/payments', [BalanceController::class, 'payments'])->name('payments')->middleware('auth');
Route::get('/dashboard/payments/add-card', [BalanceController::class, 'addCard'])->name('addCard')->middleware('auth');
Route::post('/dashboard/payments/add-card', [BalanceController::class, 'storeCard'])->name('storeCard')->middleware('auth');
Route::get('/dashboard/payments/funds', [BalanceController::class, 'funds'])->name('funds')->middleware('auth');
Route::post('/dashboard/payments/addFunds', [BalanceController::class, 'addFunds'])->name('addFunds')->middleware('auth');
Route::post('/dashboard/payments/withdrawFunds', [BalanceController::class, 'withdrawFunds'])->name('withdrawFunds')->middleware('auth');
Route::get('/dashboard/payments/remove-card', [BalanceController::class, 'removeCard'])->name('removeCard')->middleware('auth');
Route::delete('/dashboard/payments/remove-card/{card}', [BalanceController::class, 'destroyCard'])->name('destroyCard')->middleware('auth');


