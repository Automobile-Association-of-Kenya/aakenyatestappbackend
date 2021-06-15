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
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ReportsController;

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
Route::get('settings/profile/{id}', [HomeController::class, 'profile'])->name('profile');
Route::post('settings/profile/{id}', [HomeController::class, 'update'])->name('profile.update');
Route::get('settings/password',[HomeController::class,'password'])->name('password');
Route::post('settings/password/{id}',[HomeController::class,'change'])->name('password.change');

Route::get('/topics',[TopicController::class,'index'])->name('topics.index');
Route::get('/topics/create',[TopicController::class,'create'])->name('topics.create');
Route::post('/topics',[TopicController::class,'store'])->name('topics.store');
Route::get('/topics/{id}/edit',[TopicController::class,'edit'])->name('topics.edit');
Route::patch('/topics/{id}',[TopicController::class,'update'])->name('topics.update');
Route::delete('/topics/{id}/delete',[TopicController::class,'destroy'])->name('topics.destroy');

Route::get('/tests',[TestController::class,'index'])->name('tests.index');
Route::get('/tests/create',[TestController::class,'create'])->name('tests.create');
Route::post('/tests',[TestController::class,'store'])->name('tests.store');
Route::get('/tests/{id}/edit',[TestController::class,'edit'])->name('tests.edit');
Route::patch('tests/{id}',[TestController::class,'update'])->name('tests.update');
Route::delete('/tests/{id}/delete',[TestController::class,'destroy'])->name('tests.destroy');

Route::get('/questions/{id}/create',[QuestionController::class,'create'])->name('questions.create');
Route::post('/questions',[QuestionController::class,'store'])->name('questions.store');
Route::get('/questions/{id}/edit',[QuestionController::class,'edit'])->name('questions.edit');
Route::patch('questions/{id}',[QuestionController::class,'update'])->name('questions.update');
Route::delete('/questions/{id}/delete',[QuestionController::class,'destroy'])->name('questions.destroy');

Route::get('/essays',[EssayController::class,'index'])->name('essays.index');
Route::get('/essays/{id}/create',[EssayController::class,'create'])->name('essays.create');
Route::post('/essays',[EssayController::class,'store'])->name('essays.store');
Route::get('/essays/{id}/edit',[EssayController::class,'edit'])->name('essays.edit');
Route::patch('essays/{id}',[EssayController::class,'update'])->name('essays.update');

Route::get('settings/users',[UserController::class,'index'])->name('users.index');
Route::get('settings/users/create',[UserController::class,'create'])->name('users.create');
Route::post('settings/users',[UserController::class,'store'])->name('users.store');
Route::get('settings/users/{id}/edit',[UserController::class,'edit'])->name('users.edit');
Route::patch('settings/users/{id}',[UserController::class,'update'])->name('users.update');
Route::delete('settings/users/{id}',[UserController::class,'destroy'])->name('users.destroy');


Route::get('/videos/index',[VideoController::class,'index'])->name('videos.index');
Route::get('/videos/create',[VideoController::class,'create'])->name('videos.create');
Route::post('/videos',[VideoController::class,'store'])->name('videos.store');
Route::get('/videos/{id}/edit',[VideoController::class,'edit'])->name('videos.edit');
Route::patch('videos/{id}',[VideoController::class,'update'])->name('videos.update');
Route::delete('videos/{id}',[VideoController::class,'destroy'])->name('videos.destroy');

Route::get('/pdfs/index',[PdfController::class,'index'])->name('pdfs.index');
Route::get('/pdfs/create',[PdfController::class,'create'])->name('pdfs.create');
Route::post('/pdfs',[PdfController::class,'store'])->name('pdfs.store');
Route::get('/pdfs/{id}/show',[PdfController::class,'show'])->name('pdfs.show');
Route::get('/pdfs/{id}/edit',[PdfController::class,'edit'])->name('pdfs.edit');
Route::patch('pdfs/{id}',[PdfController::class,'update'])->name('pdfs.update');
Route::delete('pdfs/{id}',[PdfController::class,'destroy'])->name('pdfs.destroy');

Route::get('/packages/index',[PackageController::class,'index'])->name('packages.index');
Route::get('/packages/create',[PackageController::class,'create'])->name('packages.create');
Route::post('/packages',[PackageController::class,'store'])->name('packages.store');
Route::get('/packages/{id}/show',[PackageController::class,'show'])->name('packages.show');
Route::get('/packages/{id}/edit',[PackageController::class,'edit'])->name('packages.edit');
Route::patch('packages/{id}',[PackageController::class,'update'])->name('packages.update');
Route::delete('packages/{id}',[PackageController::class,'destroy'])->name('packages.destroy');

Route::get('reports/users',[ReportsController::class,'users'])->name('reports.users');
Route::get('reports/tests',[ReportsController::class,'tests'])->name('reports.tests');
Route::get('reports/payments',[ReportsController::class,'payments'])->name('reports.payments');
Route::get('reports/videos',[ReportsController::class,'videos'])->name('reports.videos');
Route::get('reports/pdfs',[ReportsController::class,'pdfs'])->name('reports.pdfs');

Route::post('pdf/users',[ReportsController::class,'pdfusers'])->name('pdf.users');
Route::post('pdf/tests',[ReportsController::class,'pdftests'])->name('pdf.tests');
Route::post('pdf/payments',[ReportsController::class,'pdfpayments'])->name('pdf.payments');
Route::post('pdf/videos',[ReportsController::class,'pdfvideos'])->name('pdf.videos');
Route::post('pdf/pdfs',[ReportsController::class,'pdfpdfs'])->name('pdf.pdfs');

Route::get('/notifications/index',[NotificationsController::class,'index'])->name('notifications.index');
Route::get('/notifications/allread',[NotificationsController::class,'markallread'])->name('notifications.markallread');
Route::get('/notifications/deleteall',[NotificationsController::class,'deleteall'])->name('notifications.deleteall');
Route::get('/notifications/read/{id}',[NotificationsController::class,'markread'])->name('notifications.markread');
Route::get('/notifications/delete/{id}',[NotificationsController::class,'delete'])->name('notifications.delete');
Route::get('/notifications/show/{id}',[NotificationsController::class,'show'])->name('notifications.show');