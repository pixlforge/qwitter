<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// For testing purposes only
// Route::get('/api/timeline', 'Api\Timeline\TimelineController@index');