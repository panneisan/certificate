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
//Route::view("facebook-login","facebook")->name("facebook.login");

Route::get("/",function (){
    return view("facebook");
});
Route::get("/","FacebookLoginController@index")->name('f.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('auth/{provider}', 'FacebookLoginController@redirect');
Route::get('auth/{provider}/callback', 'FacebookLoginController@callback');

Route::prefix("admin")->group(function (){
    Route::resource('/batch','BatchController')->middleware('auth');
    Route::resource('/course','CourseController')->middleware('auth');
});
