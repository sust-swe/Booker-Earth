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
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Book Requests
Route::get('book-requests', 'BookRequestsController@index');
Route::post('book-requests', 'BookRequestsController@store');
Route::get('book-requests/create', 'BookRequestsController@create');

// Book Post
Route::resource('book-posts', 'BookPostController');
// Route::post('book-posts/search', 'BookPostController@search');
// Route::get('book-posts/search', 'BookPostController@search');

// Messages
Route::group(['prefix' => 'messages'], function() {
    Route::get('send', 'MessageController@send');
    Route::get('inbox', 'MessageController@inbox');
});


Route::get('book-posts/{id}/message', 'BookPostController@getMessage');
Route::post('book-posts/{id}/message', 'BookPostController@postMessage');
