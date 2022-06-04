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
})->name('dashboard');

Route::get('/send-mail', function () {
   $details = 
   [
       'title' => 'Mail from surfside media',
       'body' => 'This is from testing email setup'
   ];
   \Mail::to('jeraldc19@gmail.com')->send(new \App\Mail\TestMail($details));
   echo "Email sent";
});


Route::get('api/v1/LoanDetail',[ 'App\Http\Controllers\api\LoanDetailController', 'index'])->name('api.loanDetail.index')->middleware(['auth']);
Route::get('api/v1/Overdue',[ 'App\Http\Controllers\api\LoanDetailController', 'OverDueLoans'])->name('api.overdue.index')->middleware(['auth']);
Route::get('api/v1/payment',[ 'App\Http\Controllers\api\PaymentController', 'index'])->name('api.payment.index')->middleware(['auth']);
Route::get('loan/overdue',[ 'App\Http\Controllers\LoanDetailController','overdue'])->name('loan.overdue')->middleware(['auth']);
Route::resource('loan', App\Http\Controllers\LoanDetailController::class)->middleware(['auth']);

Route::get('loan/{id}/payment/create', ['App\Http\Controllers\PaymentController', 'create'])->name('payment.create');
Route::post('loan/{id}/payment/store', ['App\Http\Controllers\PaymentController', 'store'])->name('payment.store');



Route::group(['middleware' => ['auth', 'role:superadministrator']], function() { 
Route::resource('roles', App\Http\Controllers\RoleController::class);
Route::get('payment', ['App\Http\Controllers\PaymentController', 'index'])->name('payment.index');
Route::resource('payment',App\Http\Controllers\PaymentController::class);
Route::resource('staff', App\Http\Controllers\UserController::class);
Route::resource('loanStatus', App\Http\Controllers\LoanStatusController::class);
Route::resource('interestRate', App\Http\Controllers\InterestRateController::class);
//Route::get("payment/{id}",'App\Http\Controllers\PaymentController@index')->name('payments');
//Route::resource('loan.payment', App\Http\Controllers\PaymentController::class)->shallow();


//Route::post('loan/delete/{id}', ['App\Http\Controllers\LoanDetailController', 'destroy'])->name('loan.destroy');
//Route::get('loan', ['App\Http\Controllers\LoanDetailController', 'index'])->name('loan.index');
//Route::get('loan/create', ['App\Http\Controllers\LoanDetailController', 'create'])->name('loan.create');


//Route::get("payment/{id}/create",'App\Http\Controllers\PaymentController@create');
Route::get('loan/1/pdf',[ 'App\Http\Controllers\LoanDetailController', 'downloadPDf']);
Route::get('/test', function () {return view('test');})->name('test');
Route::post('upload',['App\Http\Controllers\UploadController', 'store']);
});


require __DIR__.'/auth.php';
