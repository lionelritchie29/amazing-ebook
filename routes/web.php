<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EbookController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\OrderController;
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

Route::get('/', [GeneralController::class, 'index'])->name('index');


Route::prefix('/auth')->group(function(){
    Route::get('/login', [AuthController::class, 'showLogin'])->name('showLogin');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('showRegister');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/home', [GeneralController::class, 'home'])->name('home');
Route::get('/ebooks/{id}', [EbookController::class, 'show']);

Route::prefix('/orders')->group(function() {
    Route::post('/', [OrderController::class, 'add'])->name('addOrder');
    Route::get('/', [OrderController::class, 'get'])->name('orders');
    Route::delete('/', [OrderController::class, 'delete'])->name('deleteOrder');
    Route::post('/submit', [OrderController::class, 'submit'])->name('submitOrder');
});

Route::prefix('/profile')->group(function() {
    Route::get('/', [AccountController::class, 'index'])->name('profile');
    Route::put('/', [AccountController::class, 'update'])->name('updateProfile');
});

Route::get('/account_maintenance', [AccountController::class, 'get'])->name('accountMaintenance');