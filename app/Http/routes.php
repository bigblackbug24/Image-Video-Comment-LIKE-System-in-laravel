<?php
// use Hash;
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

Route::auth();

Route::get('/home', 'HomeController@index');
Route::post('/register', 'UserController@Post_Register');

Route::group(['middleware' => 'auth'], function () {
    
    Route::get('/profile', function () {
	$user = array('name'=>Auth::user()->name,'email'=>Auth::user()->email,'password'=>'********');
    return view('profile')->with('data',$user);
	});
	Route::post('/edit_profile', 'UserController@Edit_Profile');
	Route::get('/about', 'HomeController@about');
	Route::get('/services', 'HomeController@services');
	Route::get('/contect', 'HomeController@contect');
	Route::post('apply/upload', 'HomeController@upload');
	Route::post('video/upload', 'HomeController@Video_upload');
	Route::post('/status', 'HomeController@Status_upload');

});
Route::group(['middleware' => ['web']], function () {
	Route::post('/post_comment', 'HomeController@Post_Comment');

});
Route::get('post_vote_up','HomeController@post_up');
Route::get('post_vote_delete','HomeController@Delet_Like');

