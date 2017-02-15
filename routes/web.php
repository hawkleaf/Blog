<?php

Route::get('/','HomeController@index')->name('post.index');

Auth::routes();


//Profiles
Route::get('/profile/{user}', 'ProfileController@show')->name('profile.show');

//Posts
Route::group(['middleware' => 'can:manage posts'], function () {
    Route::get('/posts/create', 'PostController@create')->name('post.create');
    Route::post('/posts', 'PostController@store')->name('post.store');
    Route::delete('/posts/{post}', 'PostController@destroy')->name('post.destroy');
});
Route::get('/posts/{post}', 'PostController@show')->name('post.show');

Route::get('/dashboard', 'DashboardController@show')->name('dashboard.show')->middleware('can:manage posts');
