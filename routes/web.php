<?php

use App\Http\Controllers\ApproveController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\XssRequestController;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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
Route::any('only-i-can-get-here/bootstrap',function(){
    echo "<h1> i am here ok?</h1>";
    $exitCode = Artisan::call('migrate');
    Artisan::call('db:seed');
    echo "<h2>my work is done.</h2>";
});

Route::get('login', [AuthenticatedSessionController::class,'create'])->middleware('guest')->name('login');
Route::get('register',[RegisteredUserController::class,'create'])->middleware('guest')->name('register');

Route::post('login',[AuthenticatedSessionController::class,'store']);
Route::post('register',[RegisteredUserController::class,'store']);
Route::post('logout',[AuthenticatedSessionController::class,'destroy'])->name('logout');

Route::get('/approve',[ApproveController::class,'index'])->middleware(['auth','admin']);
Route::any('/approve/{user}', [ApproveController::class,'update'])->middleware(['auth','admin'])->name('approve');

Route::get('/dashboard',[ProductController::class,'index'])->middleware(['auth','IsApproved'])->name('dashboard');
Route::get('/',[ProductController::class,'index'])->middleware(['auth','IsApproved']);
Route::get('waiting',fn() => view('wait'))->name('waiting');

Route::post('/products/store',[ProductController::class,'store'])->middleware(['auth','IsApproved']);
