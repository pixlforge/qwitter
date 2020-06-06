<?php

namespace App\Http\Controllers\Api\Qweets;

use App\Qweet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\Qweets\QweetLikesUpdated;

class QweetLikeController extends Controller
{
    /**
     * QweetLikeController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    /**
     * Store a new like.
     *
     * @param Qweet $qweet
     * @param Request $request
     * @return void
     */
    public function store(Qweet $qweet, Request $request)
    {
        abort_if($request->user()->hasLiked($qweet), 409);

        $request->user()->likes()->create([
            'qweet_id' => $qweet->id
        ]);

        QweetLikesUpdated::broadcast($request->user(), $qweet);
    }

    /**
     * Remove a like.
     *
     * @param Qweet $qweet
     * @param Request $request
     * @return void
     */
    public function destroy(Qweet $qweet, Request $request)
    {
        $request->user()->likes
            ->where('qweet_id', $qweet->id)
            ->first()
            ->delete();

        QweetLikesUpdated::broadcast($request->user(), $qweet);
    }
}
