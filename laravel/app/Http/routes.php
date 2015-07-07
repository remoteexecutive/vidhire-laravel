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

/*Get the dashboard*/
Route::get('/dashboard',['as' => 'dashboard','uses' =>'ShowController@show']);


/*Authentication routes*/
Route::get('auth/login',function(){
    return view('auth/login');
});

Route::post('auth/login', 'UserController@login');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

/*Registration routes*/
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'UserController@register');

/*Edit Forms*/
//Job
Route::get('/edit-job-form/{id?}','EditController@getJob');

Route::get('/submit-job-form',function(){
    return view('templates/forms/editJobForm');
});
//Resume
Route::get('/edit-resume-form','EditController@getResume');
//Invite
Route::get('/invite-to-job-form/{id?}','EditController@getInviteToJob');


/*View*/
//Resume

Route::get('/view-resume/{id}','ShowController@viewResume');

//Job
Route::get('/view-job/{id}','ShowController@viewJob');



/*Edit Actions*/
Route::post('/submit-job','EditController@submitJob');
Route::post('/edit-job','EditController@editJob');
Route::post('/edit-resume','EditController@editResume');



/*Invite User to a Job*/
Route::post('/invite-to-job','EditController@inviteToJob');
/*Unlink from a Job*/
Route::get('/unlink-from-job/{resume_id}/{job_id}','EditController@unlinkFromJob');

/*Resume Status Toggling*/
Route::get('/toggle-resume-status/{resume_id}/{job_id}/{field_name}/{data}','EditController@toggleResumeStatus');