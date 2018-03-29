<?php

//Posts Resource
Route::group(['namespace' => 'Post\Http\Controllers'], function () {
    Route::get('/posts', 'PostController@index');
    Route::get('/posts/{post}', 'PostController@show');
    Route::post('/posts', 'PostController@store');
    Route::put('/posts/{post}', 'PostController@update');
    Route::delete('/posts/{post}', 'PostController@destroy');
});

// Route::group(['namespace' => 'Comment\Http\Controllers'], function() {
//     Route::get('/posts/{post}/comments/{comment}', 'CommentController@show');
//     Route::put('/posts/{post}/comments/{comment}', 'CommentController@update');
//     Route::delete('/posts/{post}/comments/{comment}', 'CommentController@destroy');
// });

Route::get('/seed', function () {
    \Illuminate\Support\Facades\Artisan::call('db:seed');

    return 'ok';
});
