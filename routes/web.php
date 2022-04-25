<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('roles', App\Http\Controllers\RoleController::class)->middleware(['auth']);
Route::resource('loan', App\Http\Controllers\LoanDetailController::class)->middleware(['auth']);
Route::resource('staff', App\Http\Controllers\UserController::class)->middleware(['auth']);
Route::resource('loanStatus', App\Http\Controllers\LoanStatusController::class)->middleware(['auth']);
Route::resource('interestRate', App\Http\Controllers\InterestRateController::class)->middleware(['auth']);
Route::get('api/v1/LoanDetail',[ 'App\Http\Controllers\api\LoanDetailController', 'index'])->name('api.loanDetail.index');
Route::get('/test', function () {return view('test');})->middleware(['auth'])->name('test');
    



require __DIR__.'/auth.php';
