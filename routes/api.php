<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
// online
// Route::post('/get-token', 'ApiAuthController@generatToken')->name('user.generatToken');

// Route::middleware('auth:api')->get('/test-auth',  'ApiAuthController@testAuth')->name('user.auth');

// Route::middleware('auth:api')->post('/tauth',  'ApiAuthController@testAuth')->name('user');
// online end

// user
Route::post('/userlogin',  'ApiAuthController@userlogin')->name('userlogin');//التحقق من تسجيل الدخول وجلب المستخدمين
Route::get('/userindex/{id}',  'ApiAuthController@userindex')->name('userindex');//بيانات العمال id
Route::get('/userindex2',  'ApiAuthController@userindex2')->name('userindex2');//بيانات العمال
Route::post('/userstore',  'ApiAuthController@userstore')->name('userstore');// حفظ بيانات العمال
Route::get('/useredit/{id}',  'ApiAuthController@useredit')->name('useredit');// ارسال بيانات العمال
Route::post('/userupdate/{id}',  'ApiAuthController@userupdate')->name('userupdate');// تعديل بيانات العمال
Route::get('/adsindex',  'ApiAuthController@adsindex')->name('adsindex');//الاعلانات 
Route::get('/adsaboutus',  'ApiAuthController@adsaboutus')->name('adsaboutus');//من نحن 
Route::post('/booking/{id}',  'ApiAuthController@booking')->name('booking');// الحجز
Route::post('/rating/{id}',  'ApiAuthController@rating')->name('rating');// التقييم

Route::post('/work_status/{id}',  'ApiAuthController@work_status')->name('work_status');
Route::post('/work_users',  'ApiAuthController@work_users')->name('work_users');
Route::get('/work_usersindex',  'ApiAuthController@work_usersindex')->name('work_usersindex');//اعمال العمال


// type_job
Route::get('/type_jobindex',  'ApiAuthController@type_jobindex')->name('type_jobindex');//بيانات العمال

// node
Route::put('/nodeupdate/{id}',  'ApiAuthController@nodeupdate')->name('nodeupdate');// تعديل بيانات 

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
