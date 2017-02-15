<?php

//Posts Resource
Route::group(['namespace' => 'Post\Http\Controllers'], function() {
    Route::get('/posts', 'PostController@index');
    Route::get('/posts/{post}', 'PostController@show');
    Route::post('/posts', 'PostController@store');
});

Route::group(['namespace' => 'Comment\Http\Controllers'], function() {
    Route::get('/posts/{post}/comments/{comment}', 'CommentController@show');
    Route::put('/posts/{post}/comments/{comment}', 'CommentController@update');
});
