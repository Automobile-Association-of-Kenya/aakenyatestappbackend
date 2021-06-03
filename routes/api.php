<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MobileRoutesController;

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

//Login & Register APIs
Route::post('/login',[MobileRoutesController::class,'login']);
Route::post('/register',[MobileRoutesController::class,'register']);
Route::post('/profile/{id}',[MobileRoutesController::class,'updateprofile']);

//Google sign up
Route::post('/google',[MobileRoutesController::class,'googlelogin']);

//Reset password 
Route::post('/forgot',[MobileRoutesController::class,'forgot']);
Route::post('/reset',[MobileRoutesController::class,'reset']);
Route::post('/verifycode',[MobileRoutesController::class,'verifycode']);

//Topics 
Route::get('/topics',[MobileRoutesController::class,'topics']);//Get all tests

//Tests
Route::get('/tests',[MobileRoutesController::class,'tests']);//Get all tests
Route::get('/topics/tests',[MobileRoutesController::class,'testspertopic']);//Get tests per topic
Route::get('topic/{id}/tests',[MobileRoutesController::class,'testsinatopic']);//Get tests in a specif topic

//Grade 
Route::post('/scores',[MobileRoutesController::class,'scores']);

//Results in a test
Route::get('/results',[MobileRoutesController::class,'results']);

//References
Route::get('/videos',[MobileRoutesController::class,'videos']);//Videos
Route::get('/pdfs',[MobileRoutesController::class,'pdfs']);