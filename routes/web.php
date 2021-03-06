<?php

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

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/admin')->namespace('Admin')->group(function(){

    Route::match(['get','post'],'/','AdminController@login');
    Route::group(['middleware'=>['admin']],function(){

        Route::get('dashboard','AdminController@dashboard');
        Route::get('setting','AdminController@setting');
        Route::get('logout','AdminController@logout');
        Route::post('check-currunt_password','AdminController@checkCurruntPassword');
        Route::post('update-currunt-pwd','AdminController@UpdateCurruntPassword');
        Route::match(['get','post'],'update-admin-details','AdminController@UpdateAdminDetails');

    });

});
