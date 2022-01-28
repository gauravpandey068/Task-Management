<?php

use App\Http\Controllers\home\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', function () {
    return view('index');
});

//auth
//register
Route::get('/auth/register', [RegisterController::class, 'index'])->name('register');
Route::post('/auth/register', [RegisterController::class, 'store']);

//login
Route::get('/auth/login', [LoginController::class, 'index'])->name('login');
Route::post('/auth/login', [LoginController::class, 'store']);
//logout
Route::post('/auth/logout', [LoginController::class, 'logout'])->name('logout');

//home
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/home', [HomeController::class, 'store']);
//delete task
Route::delete('/home/delete/{task}', [HomeController::class, 'destroy'])->name('home.destroy');
//update task
Route::get('/home/update/{task}', [HomeController::class, 'edit'])->name('home.update');
Route::patch('/home/update/{task}/success', [HomeController::class, 'update'])->name('home.update.success');
