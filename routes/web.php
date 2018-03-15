<?php

Route::get('/', 'HomeController@index')->name('post.index');

Auth::routes();


//Profiles
// Route::get('/profile/{user}', 'ProfileController@show')->name('profile.show');

//Posts
Route::group(['middleware' => 'role:Author'], function () {
    Route::get('/posts/create', 'PostController@create')->name('post.create');
    Route::post('/posts', 'PostController@store')->name('post.store');
    Route::delete('/posts/{post}', 'PostController@destroy')->name('post.destroy');
    Route::get('/posts/{post}/edit', 'PostController@edit')->name('post.edit');
    Route::put('/posts/{post}', 'PostController@update')->name('post.update');
});

Route::get('/posts/{post}', 'PostController@show')->name('post.show');

Route::get('/dashboard', 'DashboardController@show')->name('dashboard.show')->middleware('can:manage posts');
