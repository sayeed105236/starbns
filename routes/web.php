<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\AddMoneyController;
use App\Http\Controllers\TransactionController;

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

Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
//user add money request
Route::post('/home/add-money/store', [AddMoneyController::class, 'store'])->name('add-money')->middleware('auth');
Route::post('/home/add-money/transfermoney', [AddMoneyController::class, 'transfer'])->name('transfer-money')->middleware('auth');
//user sponsors list
Route::get('/home/my-sponsors/{id}', [FrontendController::class, 'index'])->middleware('auth');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::post('/home/get-sponsor', [RegisterController::class,'getSponsor'])->name('get-sponsor');
Route::post('/home/get-user', [FrontendController::class,'getUser'])->name('get-user');
//user transaction history
Route::get('/home/transactions/deposit/{id}', [TransactionController::class, 'Deposit'])->middleware('auth');
Route::get('/home/transactions/transfer/{id}', [TransactionController::class, 'Transfer'])->middleware('auth');
//admin user lists
Route::get('admin/home/user-lists', [BackendController::class, 'UserList'])->name('user-lists')->middleware('is_admin');
//package lists
Route::get('admin/home/package-lists', [BackendController::class, 'PackageList'])->name('package-lists')->middleware('is_admin');

//admin manage wallet
Route::get('admin/home/manage-wallet', [WalletController::class, 'Manage'])->name('manage-wallet')->middleware('is_admin');
Route::post('admin/home/wallet-store', [WalletController::class, 'Store'])->name('store-wallet')->middleware('is_admin');
Route::post('admin/home/wallet-update', [WalletController::class, 'Update'])->name('update-wallet')->middleware('is_admin');
Route::get('/admin/home/wallet-delete/{id}', [WalletController::class, 'Delete'])->middleware('is_admin');
//admin manage deposit request
Route::get('admin/home/manage-deposit', [BackendController::class, 'ManageDeposit'])->name('manage-deposit')->middleware('is_admin');
Route::get('/admin/home/add-money-approve/{id}', [BackendController::class,'approve'])->middleware('is_admin');
Route::get('/admin/home/add-money-reject/{id}', [BackendController::class,'rejected'])->middleware('is_admin');
