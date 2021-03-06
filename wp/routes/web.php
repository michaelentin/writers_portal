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

Route::get('/facebook', 'Auth\LoginController@redirectToProvider');

Route::get('login/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('user/{user}', 'UserController@show');

Route::post('user/{user}/edit', 'UserController@edit');

Route::post('user/{user}/update', 'UserController@update');




// Anything placed after auth::routes requires authentication to get to
// Since it's a forum, just about anything can be "reached" if a user is
// not logged in, however, we will have to do some checking for certain
// functionalities (voting, etc...)

Auth::routes();

//TODO: Content@show

Route::get('/home', 'HomeController@index');

Route::post('/sort', 'HomeController@sort');

// Standard convention: Route::get('contents/{content}', 'ContentController@show');

Route::post('/upvote', 'VoteController@upvote');
Route::post('/openpdf', 'ContentController@showpdf');
Route::post('/downvote', 'VoteController@downvote');

Route::post('/delete', 'ContentController@destroy');
Route::post('/comments/delete', 'CommentController@destroy');

Route::post('/contents/uploadart', 'ContentController@store');
Route::post('/contents/{content}', 'ContentController@show');
Route::post('/contents/{content}/comments', 'CommentController@store');


Route::post('library/addContent', 'LibraryContentController@store');

Route::get('/library/{library}', 'LibraryController@show');
