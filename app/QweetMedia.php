<?php

namespace App;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class QweetMedia extends Model implements HasMedia
{
    use InteractsWithMedia;

    /**
     * Base media relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function baseMedia()
    {
        return $this->belongsTo(Media::class, 'media_id');
    }
}
