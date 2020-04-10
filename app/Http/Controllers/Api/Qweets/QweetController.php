<?php

namespace App\Http\Controllers\Api\Qweets;

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

    public function store(QweetStoreRequest $request)
    {
        $qweet = $request->user()->qweets()->create(array_merge($request->only('body'), [
            'type' => QweetType::QWEET
        ]));

        QweetWasCreated::broadcast($qweet);
    }
}
