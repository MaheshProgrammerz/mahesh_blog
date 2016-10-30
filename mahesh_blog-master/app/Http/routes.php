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

Route::get('blog/{slug}',['as'=>'single.blog','uses'=>'BlogController@getSingle'])->where('slug','[\w\d\-\_]+');

Route::get('/','pagesController@getIndex');

//Authenticate the user 

Route::get('auth/login',['as'=>'login','uses'=>'Auth\AuthController@getLogin']);
Route::post('auth/login','Auth\AuthController@postLogin');
Route::get('auth/logout',['as'=>'logout','uses'=>'Auth\AuthController@getlogout']);

//register the New User 

Route::get('auth/register','Auth\AuthController@getRegister');
Route::post('auth/register','Auth\AuthController@postRegister');

//password reset Route

Route::get('password/reset/{token?}','Auth\PasswordController@showResetForm');
Route::post('password/email','Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');

//***********************************************//

Route::get('Blog','BlogController@getIndex');

Route::get('about','pagesController@getAbout');

Route::get('contact','pagesController@getContact');

Route::resource('posts','postController');

