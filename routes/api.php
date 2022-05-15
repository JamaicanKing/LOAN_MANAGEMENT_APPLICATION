<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('api/v1/RoleController',[ 'App\Http\Controllers\api\RoleController', 'index'])->name('api.role.index');
//Route::get('api/v1/LoanDetailController',[ 'App\Http\Controllers\api\LoanDetailController', 'index'])->name('api.loanDetail.index');
Route::get('api/v1/UserController',[ 'App\Http\Controllers\api\UserController', 'index'])->name('api.staff.index');