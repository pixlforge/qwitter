<?php

namespace App\Http\Controllers\Api\Qweets;

use App\Qweet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\QweetMedia;
use App\Qweets\QweetType;

class QweetReplyController extends Controller
{
    /**
     * QweetReplyController constructor.
     */
    public function __construct()
    {
        // $this->middleware(['auth:sanctum']);
    }
    
    public function store(Qweet $qweet, Request $request): void
    {
        $reply = $request->user()->qweets()->create(array_merge($request->only('body'), [
            'type' => QweetType::QWEET,
            'parent_id' => $qweet->id
        ]));

        foreach ($request->media as $id) {
            $reply->media()->save(QweetMedia::find($id));
        }
    }
}
