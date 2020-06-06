<?php

Route::get('/', function () {
    return view('welcome');
});

/**
 * Auth
 */
Auth::routes();

/**
 * Home
 */
Route::get('/home', 'HomeController@index')->name('home');

/**
 * Notifications
 */
Route::get('/notifications', 'Notifications\NotificationController@index')->name('notifications.index');
