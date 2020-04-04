<?php

use App\Http\Controllers\Api\Qweets\QweetController;
use App\Http\Controllers\Api\Timeline\TimelineController;

/**
 * Qweet
 */
Route::post('/qweets', [QweetController::class, 'store'])->name('qweet.store');

/**
 * Timeline
 */
Route::get('/timeline', [TimelineController::class, 'index'])->name('timeline.index');
