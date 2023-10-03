<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\UserController;

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
Route::middleware('auth')->group(function(){
Route::get('/home',[ComputerController::class, 'index'])->name('home');
Route::get('/broken',[ComputerController::class, 'broken'])->name('broken');
Route::get('/broken/{id}',[ComputerController::class, 'brokenComputer'])->name('brokenComputer');
Route::get('/repaired/{id}',[ComputerController::class, 'repaired'])->name('repairedComputer');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.admin');
Route::resource('/dashboard/computers', DashboardPostController::class);
Route::resource('/dashboard/rooms', RoomController::class);
Route::resource('/dashboard/brands', BrandController::class);
    });

Route::middleware('guest')->group(function(){
    Route::get('/', [UserController::class, 'index'])->name('login');
    Route::post('/login/auth',[UserController::class, 'auth'])->name('login.auth');
    Route::get('/register', [UserController::class, 'register'])->name('register');
    Route::post('/register/store',[UserController::class, 'registerAccount'])->name('registerAccount');
    });

Route::post('/logout', [UserController::class, 'logout']);