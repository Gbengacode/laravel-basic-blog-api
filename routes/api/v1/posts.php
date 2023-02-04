<?php

use Illuminate\Support\Facades\Route;


Route::middleware("auth")
    ->as('posts.')
    ->namespace('\App\Http\Controllers')
    ->group(function(){
        Route::get("/posts", 'PostController@index')->name('index')->withoutMiddleware(('auth'));
        Route::get("/post/{post}", 'PostController@show')->name('show')->where('post', '[0-9]+')->withoutMiddleware('auth');
        Route::post("/posts",  'PostController@store')->name('store')->withoutMiddleware('auth');
        Route::patch("/post/{post}",   'PostController@update')->name('update')->withoutMiddleware('auth');
        Route::delete("/posts/{post}",  'PostController@destroy')->name('destroy');

});

?>