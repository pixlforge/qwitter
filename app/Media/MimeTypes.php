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

    /**
     * Return an array of all rules.
     *
     * @return array
     */
    public static function all(): array
    {
        return array_merge(self::$image, self::$video);
    }

    public static function type($mime)
    {
        if (in_array($mime, self::$image)) {
            return 'image';
        }

        if (in_array($mime, self::$video)) {
            return 'video';
        }

        return null;
    }
}