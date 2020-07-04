<?php

namespace App\Http\Controllers\Qweets;

use App\Qweet;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class QweetController extends Controller
{
    /**
     * Render the qweet show view.
     *
     * @param Qweet $qweet
     * @return View
     */
    public function show(Qweet $qweet)
    {
        return View::make('qweets.show', compact('qweet'));
    }
}
