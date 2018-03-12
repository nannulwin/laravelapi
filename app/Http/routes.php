<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['jwt.auth']], function() {
    //here we are setting that any request with prefix api will be thrown to auth guard 
 //    Route::group(['prefix'=>'api'], function(){
	//     Route::get('user','UserController@user');
	// 	Route::post('/register', 'UserController@register');
	// 	Route::post('/update','UserController@updateuser');
	// 	Route::post('/delete', 'UserController@deleteuser');
	// });
});

Route::group(['prefix'=>'api'], function(){
    Route::get('/user','UserController@user');
	Route::post('/login', 'AuthController@authenticatelogin');
    Route::post('/adduser', 'UserController@adduser');
	Route::post('/register', 'UserController@register');
	Route::post('/updateuser','UserController@updateuser');
	Route::post('/getUserById','UserController@getUserById');
	Route::post('/deleteuser', 'UserController@deleteuser');

	// Route::get('/post','PostController@post');
	Route::post('/showPost', 'PostController@showPost');
    Route::post('/selectPostById', 'PostController@selectPostById');
    Route::post('/updatePost', 'PostController@updatePost');
    Route::post('/deletePost', 'PostController@deletePost');
    Route::post('/addPost', 'PostController@addPost');
    Route::post('/searchPost', 'PostController@searchPost');
});



