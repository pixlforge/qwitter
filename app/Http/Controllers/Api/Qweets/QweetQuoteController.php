<?php

namespace App\Http\Controllers\Api\Qweets;

use App\Qweet;
use App\Qweets\QweetType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\Qweets\QweetWasCreated;
use App\Events\Qweets\QweetReqweetsUpdated;

class QweetQuoteController extends Controller
{
    /**
     * Store a new reqweet with a quote.
     *
     * @param Qweet $qweet
     * @param Request $request
     * @return void
     */
    public function store(Qweet $qweet, Request $request): void
    {
        $reqweet = $request->user()->qweets()->create([
            'type' => QweetType::QUOTE,
            'body' => $request->body,
            'original_qweet_id' => $qweet->id
        ]);

        QweetWasCreated::broadcast($reqweet);
        QweetReqweetsUpdated::broadcast($request->user(), $qweet);
    }
}
