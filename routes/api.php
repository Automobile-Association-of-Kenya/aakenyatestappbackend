<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MobileRoutesController;
use GuzzleHttp\Middleware;

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


//Google sign up
Route::post('/google',[MobileRoutesController::class,'googlelogin']);

//Reset password 
Route::post('/forgot',[MobileRoutesController::class,'forgot']);
Route::post('/reset',[MobileRoutesController::class,'reset']);
Route::post('/verifycode',[MobileRoutesController::class,'verifycode']);

Route::group(['middleware'=>['auth:sanctum']],function(){
//Update profile
    Route::post('/profile/{id}',[MobileRoutesController::class,'updateprofile']);

    //Topics 
    Route::post('/topics',[MobileRoutesController::class,'topics']);//Get all tests

    //Tests
    Route::post('/tests',[MobileRoutesController::class,'tests']);//Get all tests
    Route::post('/topics/tests',[MobileRoutesController::class,'testspertopic']);//Get tests per topic
    Route::post('topic/{id}/tests',[MobileRoutesController::class,'testsinatopic']);//Get tests in a specif topic

    //Grade 
    Route::post('/scores',[MobileRoutesController::class,'scores']);

    //Results in a test
    Route::post('/results',[MobileRoutesController::class,'results']);

    //References
    Route::post('/videos',[MobileRoutesController::class,'videos']);//Videos
    Route::post('/video/{id}',[MobileRoutesController::class,'video']);//Videos
    Route::post('/video/view',[MobileRoutesController::class,'videoviews']);

    Route::post('/pdfs',[MobileRoutesController::class,'pdfs']);
    Route::post('/pdf/{id}',[MobileRoutesController::class,'pdf']);//PDFS
    Route::post('/pdf/read',[MobileRoutesController::class,'pdfreads']);

    Route::post('/payments',[MobileRoutesController::class,'payments']);
    Route::post('/mypayments',[MobileRoutesController::class,'mypayments']);
    Route::post('/packages',[MobileRoutesController::class,'packages']);

    Route::post('/generatetoken',[MobileRoutesController::class,'generatetoken']);
    Route::post('/logout',[MobileRoutesController::class,'logout']);

});

Route::post('/mpesaconfirmation',[MobileRoutesController::class,'mpesaconfirmation']);
Route::post('/callback',[MobileRoutesController::class,'callback']);
