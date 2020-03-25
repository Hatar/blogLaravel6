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
Route::get('/', 'WelcomeController@index');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function(){
    //Route Categories
    Route::resource('categories','CategoriesController');
    //Route Posts
    Route::resource('posts','PostController')->middleware('checkCategory');
    //Trashed Post
    Route::get('/trashed-posts','PostController@getTrashed')->name('trashed.index');
    //Restore Post
    Route::get('/trashed-post/{id}','PostController@restore')->name('posts.restore');
    //Route Tags
    Route::resource('tags','TagsController');
});

Route::middleware(['auth','admin'])->group(function(){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::get('/users','UserController@index')->name('users.index');
    Route::get('/create','UserController@create')->name('users.create');
});
Route::middleware(['auth'])->group(function(){
    Route::get('/users/{user}/profile','UserController@edit')->name('users.edit');
    Route::post('/users/{user}/profile','UserController@update')->name('users.update');
});
