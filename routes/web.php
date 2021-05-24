<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MobileRoutesController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/topics',[TopicController::class,'index'])->name('topics.index');
Route::get('/topics/create',[TopicController::class,'create'])->name('topics.create');
Route::post('/topics',[TopicController::class,'store'])->name('topics.store');

Route::get('/tests',[TestController::class,'index'])->name('tests.index');
Route::get('/tests/create',[TestController::class,'create'])->name('tests.create');
Route::post('/tests',[TestController::class,'store'])->name('tests.store');

