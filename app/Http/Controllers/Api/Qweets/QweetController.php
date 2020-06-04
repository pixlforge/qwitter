<?php

namespace App\Http\Controllers\Api\Qweets;

use App\QweetMedia;
use App\Qweets\QweetType;
use App\Events\Qweets\QweetWasCreated;
use App\Http\Controllers\Controller;
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
