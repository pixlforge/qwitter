<?php

use App\Http\Controllers\Api\Qweets\QweetController;
use App\Http\Controllers\Api\Qweets\QweetLikeController;
use App\Http\Controllers\Api\Timeline\TimelineController;

/**
 * Qweet
 */
Route::post('/qweets', [QweetController::class, 'store'])->name('qweet.store');

/**
 * Likes
 */
Route::post('/qweets/{qweet}/likes', [QweetLikeController::class, 'store'])->name('qweet.like.store');
Route::delete('/qweets/{qweet}/likes', [QweetLikeController::class, 'destroy'])->name('qweet.like.destroy');

/**
 * Timeline
 */
Route::get('/timeline', [TimelineController::class, 'index'])->name('timeline.index');
