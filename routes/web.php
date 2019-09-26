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

Route::group(array('prefix'=>'admin','namespace'=>'Admin'), function(){
	// auth
    Route::get('login','AuthController@loginForm')->name('admin.loginForm');
    Route::post('login','AuthController@login')->name('admin.login');
    Route::post('logout','AuthController@logout')->name('admin.logout');
        
    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');

});

Route::group(array('prefix'=>'editor','namespace'=>'Editor'), function(){
	// auth
    Route::get('login','AuthController@loginForm')->name('editor.loginForm');
    Route::post('login','AuthController@login')->name('editor.login');
    Route::get('register','AuthController@registerForm')->name('editor.registerForm');
    Route::post('register','AuthController@register')->name('editor.register');
    Route::post('logout','AuthController@logout')->name('editor.logout');
        
    Route::get('dashboard', 'DashboardController@index')->name('editor.dashboard');
});

