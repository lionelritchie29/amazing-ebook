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


Route::group(['prefix' => '/auth', 'middleware' => 'session_guest'], function(){
    Route::get('/login', [AuthController::class, 'showLogin'])->name('showLogin');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('showRegister');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->withoutMiddleware('session_guest')->middleware('session_auth');
});

Route::get('/home', [GeneralController::class, 'home'])->name('home')->middleware('session_auth');
Route::get('/ebooks/{id}', [EbookController::class, 'show'])->middleware('session_auth');

Route::prefix('/orders')->middleware('session_auth')->group(function() {
    Route::post('/', [OrderController::class, 'add'])->name('addOrder');
    Route::get('/', [OrderController::class, 'get'])->name('orders');
    Route::delete('/', [OrderController::class, 'delete'])->name('deleteOrder');
    Route::post('/submit', [OrderController::class, 'submit'])->name('submitOrder');
});

Route::prefix('/profile')->middleware('session_auth')->group(function() {
    Route::get('/', [AccountController::class, 'index'])->name('profile');
    Route::put('/', [AccountController::class, 'update'])->name('updateProfile');
});

Route::get('/account_maintenance', [AccountController::class, 'get'])->name('accountMaintenance')->middleware('session_auth_admin');
Route::get('/update_role/{id}', [AccountController::class, 'editRole'])->name('editRole')->middleware('session_auth_admin');
Route::post('/update_role/{id}', [AccountController::class, 'updateRole'])->name('updateRole')->middleware('session_auth_admin');
Route::delete('/account/{id}', [AccountController::class, 'delete'])->name('deleteAccount')->middleware('session_auth_admin');