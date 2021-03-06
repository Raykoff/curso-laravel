<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use App\Role;
use App\User;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/admin', function () {
//    return view('admin.index');
//});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'admin'], function(){

    Route::get('/admin', function(){
        return view('admin.index');
    });
    Route::resource('/admin/users', 'AdminUsersController');

    Route::resource('/admin/posts', 'AdminPostsController');

});



