<?php

namespace App\Http\Controllers\Api\Qweets;

use App\Events\Qweets\QweetReqweetsUpdated;
use App\Qweet;
use App\Qweets\QweetType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\Qweets\QweetWasCreated;
use App\Events\Qweets\QweetWasDeleted;

class QweetReqweetController extends Controller
{
    /**
     * Store a new reqweet.
     *
     * @param Qweet $qweet
     * @param Request $request
     * @return void
     */
    public function store(Qweet $qweet, Request $request)
    {
        $reqweet = $request->user()->qweets()->create([
            'type' => QweetType::REQWEET,
            'original_qweet_id' => $qweet->id
        ]);

        QweetWasCreated::broadcast($reqweet);

        QweetReqweetsUpdated::broadcast($request->user(), $qweet);
    }

    /**
     * Undocumented function
     *
     * @param Qweet $qweet
     * @param Request $request
     * @return void
     */
    public function destroy(Qweet $qweet, Request $request)
    {
        QweetWasDeleted::broadcast($qweet->reqweetedQweet);

        $qweet->reqweetedQweet()->where('user_id', $request->user()->id)->delete();
        
        QweetReqweetsUpdated::broadcast($request->user(), $qweet);
    }
}
