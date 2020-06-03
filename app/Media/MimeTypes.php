<?php

namespace App\Media;

class MimeTypes
{
    /**
     * The image MIME types that are accepted.
     *
     * @var array
     */
    public static $image = [
        'image/png',
        'image/jpg',
        'image/jpeg',
    ];

    /**
     * The video MIME types that are accepted.
     *
     * @var array
     */
    public static $video = [
        'video/mp4',
    ];
}