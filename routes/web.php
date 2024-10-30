<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\LoanApplicationController;

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

Route::middleware(['guest'])->group(function () {
    // login
    Route::get('/login', [AuthController::class, 'createLogin'])->name('createLogin');
    Route::post('/login', [AuthController::class, 'storeLogin'])->name('storeLogin');

    
});

Route::middleware(['auth'])->group(function () {
    // register
    Route::get('/register', [AuthController::class, 'createRegister'])->name('createRegister');
    Route::post('/register', [AuthController::class, 'storeRegister'])->name('storeRegister');

    Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');
    Route::get('/dataentry', [LoanApplicationController::class, 'index'])->name('index');

    Route::get('/dataentry/create', [LoanApplicationController::class, 'create'])->name('createLoan');
    Route::post('/dataentry/create', [LoanApplicationController::class, 'store'])->name('storeLoan');

});


Route::get('/csrf_token', function () {
    return csrf_token();
});