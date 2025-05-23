<?php

namespace App\Http\Controllers\Api\Timeline;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\QweetCollection;

class TimelineController extends Controller
{
    /**
     * TimelineController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    /**
     * Get the latest qweets from following users.
     *
     * @param Request $request
     * @return QweetCollection
     */
    public function index(Request $request)
    {
        return QweetCollection::make(
            $request->user()
                ->qweetsFromFollowing()
                ->parent()
                ->with([
                    'user', 'likes', 'reqweets', 'replies', 'media.baseMedia', 'entities',
                    'originalQweet.user', 'originalQweet.likes', 'originalQweet.reqweets', 'originalQweet.replies', 'originalQweet.media.baseMedia'
                ])
                ->latest()
                ->paginate(7)
        );
    }
}
