<?php

namespace App\Http\Controllers\Api\Qweets;

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
        $request->user()->qweets()->create($request->only('body'));
    }
}
