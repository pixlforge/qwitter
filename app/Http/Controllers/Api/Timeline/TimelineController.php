<?php

namespace App\Http\Controllers\Api\Timeline;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\QweetCollection;

class TimelineController extends Controller
{
    // auth

    public function index(Request $request)
    {
        return QweetCollection::make(
            $request->user()
                ->qweetsFromFollowing()
                ->paginate(5)
        );
    }
}
