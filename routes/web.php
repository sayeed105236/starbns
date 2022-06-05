<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\FrontendController;

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
//user sponsors list
Route::get('/home/my-sponsors/{id}', [FrontendController::class, 'index'])->middleware('auth');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::post('/home/get-sponsor', [RegisterController::class,'getSponsor'])->name('get-sponsor');

//admin user lists
Route::get('admin/home/user-lists', [BackendController::class, 'UserList'])->name('user-lists')->middleware('is_admin');
//package lists
Route::get('admin/home/package-lists', [BackendController::class, 'PackageList'])->name('package-lists')->middleware('is_admin');
