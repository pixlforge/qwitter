<?php

namespace App;

use App\Media\Media;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;

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
