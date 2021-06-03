<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EssayController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\QuestionController;
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

Auth::routes(['register' => false]);

Route::get('/fallback',function()
{
    return view('auth.fallback');
})->name('fallback');
    Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('adminonly');
   
Route::get('/topics',[TopicController::class,'index'])->name('topics.index');
Route::get('/topics/create',[TopicController::class,'create'])->name('topics.create');
Route::post('/topics',[TopicController::class,'store'])->name('topics.store');
Route::get('/topics/{id}/edit',[TopicController::class,'edit'])->name('topics.edit');
Route::patch('/topics/{id}',[TopicController::class,'update'])->name('topics.update');
Route::delete('/topics/{id}',[TopicController::class,'destroy'])->name('topics.destroy');

Route::get('/tests',[TestController::class,'index'])->name('tests.index');
Route::get('/tests/create',[TestController::class,'create'])->name('tests.create');
Route::post('/tests',[TestController::class,'store'])->name('tests.store');
Route::get('/tests/{id}/edit',[TestController::class,'edit'])->name('tests.edit');
Route::patch('tests/{id}',[TestController::class,'update'])->name('tests.update');
Route::delete('/tests/{id}',[TestController::class,'destroy'])->name('tests.destroy');

Route::get('/questions/{id}/create',[QuestionController::class,'create'])->name('questions.create');
Route::post('/questions',[QuestionController::class,'store'])->name('questions.store');
Route::get('/questions/{id}/edit',[QuestionController::class,'edit'])->name('questions.edit');
Route::patch('questions/{id}',[QuestionController::class,'update'])->name('questions.update');
Route::delete('/questions/{id}',[QuestionController::class,'destroy'])->name('questions.destroy');

Route::get('/essays',[EssayController::class,'index'])->name('essays.index');
Route::get('/essays/{id}/create',[EssayController::class,'create'])->name('essays.create');
Route::post('/essays',[EssayController::class,'store'])->name('essays.store');
Route::get('/essays/{id}/edit',[EssayController::class,'edit'])->name('essays.edit');
Route::patch('essays/{id}',[EssayController::class,'update'])->name('essays.update');

Route::get('/users',[UserController::class,'index'])->name('users.index');
Route::get('/users/create',[UserController::class,'create'])->name('users.create');
Route::post('/users',[UserController::class,'store'])->name('users.store');
Route::get('/users/{id}/edit',[UserController::class,'edit'])->name('users.edit');
Route::patch('users/{id}',[UserController::class,'update'])->name('users.update');
Route::delete('users/{id}',[UserController::class,'destroy'])->name('users.destroy');


Route::get('/videos/index',[VideoController::class,'index'])->name('videos.index');
Route::get('/videos/create',[VideoController::class,'create'])->name('videos.create');
Route::post('/videos',[VideoController::class,'store'])->name('videos.store');
Route::get('/videos/{id}/edit',[VideoController::class,'edit'])->name('videos.edit');
Route::patch('videos/{id}',[VideoController::class,'update'])->name('videos.update');
Route::delete('videos/{id}',[VideoController::class,'destroy'])->name('videos.destroy');

Route::get('/pdfs/index',[PdfController::class,'index'])->name('pdfs.index');
Route::get('/pdfs/create',[PdfController::class,'create'])->name('pdfs.create');
Route::post('/pdfs',[PdfController::class,'store'])->name('pdfs.store');
Route::get('/pdfs/{id}/edit',[PdfController::class,'edit'])->name('pdfs.edit');
Route::patch('pdfs/{id}',[PdfController::class,'update'])->name('pdfs.update');
Route::delete('pdfs/{id}',[PdfController::class,'destroy'])->name('pdfs.destroy');