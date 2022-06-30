<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\AddMoneyController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ActivationController;

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
//activate USER
Route::post('/home/users/activate', [ActivationController::class, 'activate'])->name('activate-user')->middleware('auth');
//user sponsors list
Route::get('/home/my-sponsors/{id}', [FrontendController::class, 'index'])->middleware('auth');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::post('/home/get-sponsor', [RegisterController::class,'getSponsor'])->name('get-sponsor');
Route::post('/home/get-user', [FrontendController::class,'getUser'])->name('get-user');
Route::post('/home/get-placement', [ActivationController::class,'getPlacement'])->name('get-placement');
//user transaction history
Route::get('/home/transactions/deposit/{id}', [TransactionController::class, 'Deposit'])->middleware('auth');
Route::get('/home/transactions/transfer/{id}', [TransactionController::class, 'Transfer'])->middleware('auth');
Route::get('/home/transactions/activation/{id}', [TransactionController::class, 'Activation'])->middleware('auth');
Route::get('/home/transactions/sponsor-bonus/{id}', [TransactionController::class, 'SponsorBonus'])->middleware('auth');
Route::get('/home/transactions/level-bonus/{id}', [TransactionController::class, 'LevelBonus'])->middleware('auth');
Route::get('/home/transactions/daily-roi/{id}', [TransactionController::class, 'DailyBonus'])->middleware('auth');
Route::get('/home/transactions/income-generation-bonus/{id}', [TransactionController::class, 'IncomeBonus'])->middleware('auth');



//user reset password
Route::get('/home/reset-password/{id}', [FrontendController::class, 'ResetPassword'])->middleware('auth');
Route::post('/home/reset-password/store', [FrontendController::class, 'ResetPasswordStore'])->name('change-password-store')->middleware('auth');
//admin user lists
Route::get('admin/home/user-lists', [BackendController::class, 'UserList'])->name('user-lists')->middleware('is_admin');
//package lists
Route::get('admin/home/package-lists', [PackageController::class, 'PackageList'])->name('package-lists')->middleware('is_admin');
//admin package update
Route::post('admin/home/package-update', [PackageController::class, 'Update'])->name('update-package')->middleware('is_admin');
//admin manage wallet
Route::get('admin/home/manage-wallet', [WalletController::class, 'Manage'])->name('manage-wallet')->middleware('is_admin');
Route::post('admin/home/wallet-store', [WalletController::class, 'Store'])->name('store-wallet')->middleware('is_admin');
Route::post('admin/home/wallet-update', [WalletController::class, 'Update'])->name('update-wallet')->middleware('is_admin');
Route::get('/admin/home/wallet-delete/{id}', [WalletController::class, 'Delete'])->middleware('is_admin');
//admin manage deposit request
Route::get('admin/home/manage-deposit', [BackendController::class, 'ManageDeposit'])->name('manage-deposit')->middleware('is_admin');
Route::get('/admin/home/add-money-approve/{id}', [BackendController::class,'approve'])->middleware('is_admin');
Route::get('/admin/home/add-money-reject/{id}', [BackendController::class,'rejected'])->middleware('is_admin');


//daily roi from admin
Route::get('admin/home/manage-daily-roi', [BackendController::class, 'DailyRoi'])->name('daily-roi')->middleware('is_admin');
Route::post('admin/home/store-roi', [BackendController::class, 'StoreRoi'])->name('store-roi')->middleware('is_admin');

//income generation
Route::get('admin/home/income-generation', [BackendController::class, 'IncomeGeneration'])->name('income-generation')->middleware('is_admin');
Route::post('admin/home/income-generation-update', [BackendController::class, 'UpdateIncomeGeneration'])->name('update-income-generation')->middleware('is_admin');
