<?php

namespace App\Http\Controllers\Api\Qweets;

use App\Qweet;
use App\QweetMedia;
use App\Qweets\QweetType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\QweetCollection;
use App\Events\Qweets\QweetRepliesUpdated;
use App\Notifications\Qweets\QweetRepliedTo;

class QweetReplyController extends Controller
{
    /**
     * QweetReplyController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->only('store');
    }

    /**
     * Show a specific reply.
     *
     * @param Qweet $qweet
     * @return QweetCollection
     */
    public function show(Qweet $qweet)
    {
        return new QweetCollection($qweet->replies);
    }
    
    /**
     * Store a new qweet as a reply to another qweet.
     *
     * @param Qweet $qweet
     * @param Request $request
     * @return void
     */
    public function store(Qweet $qweet, Request $request)
    {
        $reply = $request->user()->qweets()->create(array_merge($request->only('body'), [
            'type' => QweetType::QWEET,
            'parent_id' => $qweet->id
        ]));

        foreach ($request->media as $id) {
            $reply->media()->save(QweetMedia::find($id));
        }

        if ($request->user()->id !== $qweet->user_id) {
            $qweet->user->notify(new QweetRepliedTo($request->user(), $reply));
        }

        QweetRepliesUpdated::broadcast($qweet);
    }
}
