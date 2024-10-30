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
    Route::get('/register', [AuthController::class, 'createRegister'])->name('createRegister')->middleware(['role:Admin']);
    Route::post('/register', [AuthController::class, 'storeRegister'])->name('storeRegister')->middleware(['role:Admin']);

    Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');
    Route::get('/dashboard', function(){
        return view('home.dashboard.index');
    });
    Route::get('/dataentry', [LoanApplicationController::class, 'index'])->name('indexLoan')->middleware(['role:Account Officer']);

    Route::get('/dataentry/create', [LoanApplicationController::class, 'create'])->name('createLoan')->middleware(['role:Account Officer']);
    Route::post('/dataentry/create', [LoanApplicationController::class, 'store'])->name('storeLoan')->middleware(['role:Account Officer']);

    Route::get('/dataentry/{id}', [LoanApplicationController::class, 'show'])->name('showLoan')->middleware(['role:Account Officer']);

    Route::put('/dataentry/{id}', [LoanApplicationController::class, 'update'])->name('updateLoan')->middleware(['role:Account Officer']);

    Route::delete('/dataentry/{id}', [LoanApplicationController::class, 'destroy'])->name('destroyLoan')->middleware(['role:Account Officer']);
});


Route::get('/csrf_token', function () {
    return csrf_token();
});
