<?php

// لتضمين كلاس الروت
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
    return view('welcome');
});

Auth::routes();
// Route::get('/get-token', 'ApiAuthController@getToken')->name('user.getToken'); //get-token

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dsadmin', 'HomeController@index')->name('dsadmin');

//user role
Route::delete('/cpanel/user/{id}/{nid}/role', 'UserController@destroyrole' )->name('user.destroyrole');
Route::post('/cpanel/user/{id}/role', 'UserController@updaterole' )->name('user.updaterole');
// user
Route::get('/dsadmin/user/indexw', 'UserController@indexw')->name('user.indexw');
Route::get('/dsadmin/user/indexc', 'UserController@indexc')->name('user.indexc');
Route::resource('/dsadmin/user', 'UserController');
// Route::get('/dsadmin/user', 'UserController@index')->name('user.index');
// Route::get('/dsadmin/user/create', 'UserController@create')->name('user.create');
// Route::post('/dsadmin/user', 'UserController@store')->name('user.store');
// Route::get('/dsadmin/user/{id}', 'UserController@edit')->name('user.edit');
// Route::put('/dsadmin/user/{id}', 'UserController@update')->name('user.update');
// Route::delete('/dsadmin/user/{id}', 'UserController@destroy' )->name('user.destroy');

//file
Route::delete('/dsadmin/file/{file}'            , 'FileController@destroy')->name('file.destroy');
Route::post('/dsadmin/node2/{node}' , 'NodeController@upload' )->name('node.upload');
//role permission
Route::delete('/cpanel/role/{id}/{nid}/permission', 'RoleController@destroypermission' )->name('role.destroypermission');
Route::post('/cpanel/role/{id}/permission', 'RoleController@updatepermission' )->name('role.updatepermission');
// role
Route::resource('/dsadmin/role', 'RoleController');

// msg
Route::resource('/dsadmin/msg', 'MsgController');

// ads
Route::get('/dsadmin/ads/abute', 'AdsController@indexabute')->name('ads.indexabute');
Route::resource('/dsadmin/ads', 'AdsController');

// type_jobs
Route::resource('/dsadmin/type_jobs', 'TypeJobController');

//mainsettings
Route::resource('/dsadmin/mainsetting', 'MainsettingsController');


