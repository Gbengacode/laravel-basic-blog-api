<?php

use Illuminate\Support\Facades\Route;


Route::middleware("auth")
    ->as('users.')
    ->namespace('\App\Http\Controllers')
    ->group(function(){
        Route::get("/users", 'UserController@index')->name('index')->withoutMiddleware("auth");
        Route::get("/user/{user}", 'UserController@show')->name('show')->where('user', '[0-9]+')->withoutMiddleware("auth");
        Route::post("/users",  'UserController@store')->name('store')->withoutMiddleware("auth");
        Route::patch("/users/{user}",   'UserController@update')->name('update')->withoutMiddleware("auth");
        Route::delete("/users/{user}",  'UserController@destroy')->name('destroy')->withoutMiddleware("auth");

})



?>