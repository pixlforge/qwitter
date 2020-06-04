<?php

namespace App\Http\Controllers\Api\Media;

use App\QweetMedia;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use App\Http\Requests\Media\MediaStoreRequest;

class MediaController extends Controller
{
    /**
     * MediaController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }
    
    /**
     * Upload media files.
     *
     * @param MediaStoreRequest $request
     * @return void
     */
    public function store(MediaStoreRequest $request)
    {
        $result = collect($request->media)->map(function ($media) {
            return $this->addMedia($media);
        });
    }

    /**
     * Store a new media file and associate it
     * with a QweetMedia object.
     *
     * @param UploadedFile $media
     * @return void
     */
    protected function addMedia(UploadedFile $media): void
    {
        $qweetMedia = QweetMedia::create([]);
        
        $qweetMedia->baseMedia()->associate(
            $qweetMedia->addMedia($media)->toMediaCollection()
        )->save();
    }
}
