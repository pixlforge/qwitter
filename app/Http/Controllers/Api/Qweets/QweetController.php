<?php

namespace App\Http\Controllers\Api\Qweets;

use App\Qweet;
use App\QweetMedia;
use App\Qweets\QweetType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\Qweets\QweetWasCreated;
use App\Http\Resources\QweetCollection;
use App\Http\Requests\Qweets\QweetStoreRequest;

class QweetController extends Controller
{
    /**
     * QweetController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->only('store');
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $qweets = Qweet::with([
            'user', 'likes', 'reqweets', 'replies', 'media.baseMedia',
            'originalQweet.user', 'originalQweet.likes', 'originalQweet.reqweets', 'originalQweet.replies', 'originalQweet.media.baseMedia'
        ])->find(explode(',', $request->ids));

        return new QweetCollection($qweets);
    }

    /**
     * Store a new qweet.
     *
     * @param QweetStoreRequest $request
     * @return void
     */
    public function store(QweetStoreRequest $request): void
    {
        $qweet = $request->user()->qweets()->create(array_merge($request->only('body'), [
            'type' => QweetType::QWEET
        ]));

        // Associate qweet media with qweet
        foreach ($request->media as $id) {
            $qweet->media()->save(QweetMedia::find($id));
        }

        QweetWasCreated::broadcast($qweet);
    }
}
