<?php

use App\Http\Controllers\Api\Media\MediaController;
use App\Http\Controllers\Api\Qweets\QweetController;
use App\Http\Controllers\Api\Qweets\QweetLikeController;
use App\Http\Controllers\Api\Media\MediaTypesController;
use App\Http\Controllers\Api\Qweets\QweetQuoteController;
use App\Http\Controllers\Api\Qweets\QweetReplyController;
use App\Http\Controllers\Api\Timeline\TimelineController;
use App\Http\Controllers\Api\Qweets\QweetReqweetController;
use App\Http\Controllers\Api\Notifications\NotificationController;

/**
 * Media
 */
Route::post('/media', [MediaController::class, 'store']);
Route::get('/media/types', [MediaTypesController::class, 'index'])->name('media.types.index');

/**
 * Notifications
 */
Route::get('/notifications', [NotificationController::class, 'index']);

/**
 * Qweets
 */
Route::get('/qweets', [QweetController::class, 'index'])->name('qweet.index');
Route::get('/qweets/{qweet}', [QweetController::class, 'show'])->name('qweet.show');
Route::post('/qweets', [QweetController::class, 'store'])->name('qweet.store');

/**
 * Likes
 */
Route::post('/qweets/{qweet}/likes', [QweetLikeController::class, 'store'])->name('qweet.like.store');
Route::delete('/qweets/{qweet}/likes', [QweetLikeController::class, 'destroy'])->name('qweet.like.destroy');

/**
 * Replies
 */
Route::post('/qweets/{qweet}/replies', [QweetReplyController::class, 'store'])->name('qweet.reply.store');

/**
 * Reqweets
 */
Route::post('/qweets/{qweet}/reqweets', [QweetReqweetController::class, 'store'])->name('qweet.reqweet.store');
Route::delete('/qweets/{qweet}/reqweets', [QweetReqweetController::class, 'destroy'])->name('qweet.reqweet.destroy');
Route::post('/qweets/{qweet}/quotes', [QweetQuoteController::class, 'store'])->name('qweet.quote.store');

/**
 * Timeline
 */
Route::get('/timeline', [TimelineController::class, 'index'])->name('timeline.index');
