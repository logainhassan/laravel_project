<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['middleware' => 'auth'],function(){
			//delete post
	Route::Delete('/posts/{post}','PostController@destroy')->name('posts.destroy');

	//show posts in table
	Route::get('/posts','PostController@index')->name('posts.index');

	//route to form
	Route::get('/posts/create','PostController@create')->name('posts.create');

	//to store data
	Route::post('/posts','PostController@store')->name('posts.store');

	//show post
	Route::get('/posts/{post}','PostController@show')->name('posts.show');

	//route to edit post
	Route::get('/posts/{post}/edit','PostController@edit')->name('posts.edit');

	//update post
	Route::patch('/posts/{post}','PostController@update')->name('posts.update');


}
);

Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('login/google', 'Auth\LoginController@redirectToGoogle');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');


// Route::get('/my-blog', function () {
// 	$myPosts=[
//     	[
//     		'id' => 1,
//     		'title'=>'first post',
//     		'createdAt' => '2018-05-01'
//     	],
//     	[
//     		'id' => 2,
//     		'title'=>'second post',
//     		'createdAt' => '2018-06-03'
//     	],
//     	[
//     		'id' => 3,
//     		'title'=>'third post',
//     		'createdAt' => '2018-09-04'
//     	],
//     ];
//     dd($posts); // die dump
//     return view('my-blog',[
//     	'myPostsKey' => $myPosts
//     ]);
    

// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
