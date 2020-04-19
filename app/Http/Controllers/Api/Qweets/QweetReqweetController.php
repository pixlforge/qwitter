<?php

namespace App\Http\Controllers\Api\Qweets;

use App\Qweet;
use App\Qweets\QweetType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QweetReqweetController extends Controller
{
    public function store(Qweet $qweet, Request $request)
    {
        $reqweet = $request->user()->qweets()->create([
            'type' => QweetType::REQWEET,
            'original_qweet_id' => $qweet->id
        ]);
    }

    public function destroy(Qweet $qweet, Request $request)
    {
        $qweet->reqweetedQweet()->where('user_id', $request->user()->id)->delete();
    }
}
