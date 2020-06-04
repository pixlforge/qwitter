<?php

namespace App\Http\Controllers\Api\Media;

use App\QweetMedia;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use App\Http\Requests\Media\MediaStoreRequest;
use App\Http\Resources\QweetMediaCollection;

class MediaController extends Controller
{
    /**
     * MediaController constructor.
     */
    public function __construct()
    {
        // $this->middleware(['auth:sanctum']);
    }
    
    /**
     * Upload media files.
     *
     * @param MediaStoreRequest $request
     * @return QweetMediaCollection
     */
    public function store(MediaStoreRequest $request): QweetMediaCollection
    {
        $result = collect($request->media)->map(function ($media) {
            return $this->addMedia($media);
        });

        return new QweetMediaCollection($result);
    }

    /**
     * Store a new media file and associate it
     * with a QweetMedia object.
     *
     * @param UploadedFile $media
     * @return QweetMedia
     */
    protected function addMedia(UploadedFile $media): QweetMedia
    {
        $qweetMedia = QweetMedia::create([]);
        
        $qweetMedia->baseMedia()->associate(
            $qweetMedia->addMedia($media)->toMediaCollection()
        )->save();

        return $qweetMedia;
    }
}
