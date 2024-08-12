<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DetailTransactionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StuffController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

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

Route::get('generateData', [AuthController::class, 'generateData']);

Route::get('/', function () {
    return view('home');
})->middleware('is.auth');

Route::get('login', [AuthController::class, 'showlogin'])->middleware('is.not.auth');
Route::post('login', [AuthController::class, 'actionlogin'])->middleware('is.not.auth');

Route::middleware(['is.auth'])->group(function() {

    Route::get('logout', [AuthController::class, 'actionLogout']);

    Route::get('transactions', [TransactionController::class, 'index']);
    Route::get('transactions/create', [TransactionController::class, 'create']);

    Route::resource('customers', CustomerController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('users', UserController::class);
    Route::resource('stuffs', StuffController::class);
});


// Route::get('category', [CategoryController::class, 'index']);
// Route::get('category/add', [CategoryController::class, 'create']);

// Route::get('user', [UserController::class, 'index']);
// Route::get('user/add', [UserController::class, 'create']);

// Route::get('stuff', [StuffController::class, 'index']);
// Route::get('stuff/add', [StuffController::class, 'create']);