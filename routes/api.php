<?php

use App\Http\Controllers\Api\Media\MediaController;
use App\Http\Controllers\Api\Qweets\QweetController;
use App\Http\Controllers\Api\Qweets\QweetLikeController;
use App\Http\Controllers\Api\Media\MediaTypesController;
use App\Http\Controllers\Api\Timeline\TimelineController;
use App\Http\Controllers\Api\Qweets\QweetReqweetController;

/**
 * Media
 */
Route::post('/media', [MediaController::class, 'store']);
Route::get('/media/types', [MediaTypesController::class, 'index'])->name('media.types.index');

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
 * Reqweets
 */
Route::post('/qweets/{qweet}/reqweets', [QweetReqweetController::class, 'store'])->name('qweet.reqweet.store');
Route::delete('/qweets/{qweet}/reqweets', [QweetReqweetController::class, 'destroy'])->name('qweet.reqweet.destroy');

/**
 * Timeline
 */
Route::get('/timeline', [TimelineController::class, 'index'])->name('timeline.index');
