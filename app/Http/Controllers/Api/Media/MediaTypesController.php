<?php

namespace App\Http\Controllers\Api\Media;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Media\MimeTypes;

class MediaTypesController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => [
                'image' => MimeTypes::$image,
                'video' => MimeTypes::$video,
            ]
        ]);
    }
}
