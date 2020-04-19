<?php

namespace App\Http\Controllers\Api\Qweets;

use App\Events\Qweets\QweetReqweetsUpdated;
use App\Qweet;
use App\Qweets\QweetType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\Qweets\QweetWasCreated;

class QweetReqweetController extends Controller
{
    public function store(Qweet $qweet, Request $request)
    {
        $reqweet = $request->user()->qweets()->create([
            'type' => QweetType::REQWEET,
            'original_qweet_id' => $qweet->id
        ]);

        QweetWasCreated::broadcast($reqweet);

        QweetReqweetsUpdated::broadcast($request->user(), $qweet);
    }

    public function destroy(Qweet $qweet, Request $request)
    {
        $qweet->reqweetedQweet()->where('user_id', $request->user()->id)->delete();

        QweetReqweetsUpdated::broadcast($request->user(), $qweet);
    }
}
