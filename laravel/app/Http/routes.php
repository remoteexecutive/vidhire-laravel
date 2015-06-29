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
    return view('home');
});

Route::get('/', ['as' => 'home', function () {
    return view('home');
}]);

Route::get('/dashboard',function(){
   return view('dashboard'); 
});

Route::get('/dashboard/{name}/{user}',['as' => 'dashboard',function($name,$user){
   return view('dashboard',['name' => $name,'user' => $user]); 
}]);

// Authentication routes...
Route::get('auth/login',function(){
    return view('auth/login');
});

Route::post('auth/login', 'UserController@login');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'UserController@register');

//Edit Forms
//Job
Route::get('/edit-job-form',function(){
   return view('templates/forms/editJobForm'); 
});
//Resume
Route::get('/edit-resume-form','EditController@getResume');

//Edit Actions
Route::post('/edit-job','EditController@editJob');
Route::post('/edit-resume','EditController@editResume');

//Show
//Resumes
//Route::get('/show-resume','ShowController@showResume');