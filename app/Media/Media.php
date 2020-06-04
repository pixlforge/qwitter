<?php

namespace App\Media;

use Spatie\MediaLibrary\MediaCollections\Models\Media as BaseMedia;

class Media extends BaseMedia
{
    /**
     * Check
     *
     * @return void
     */
    public function type()
    {
        return MimeTypes::type($this->mime_type);
    }
}