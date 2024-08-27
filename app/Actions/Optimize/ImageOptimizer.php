<?php

namespace App\Actions\Optimize;


use Spatie\Image\Exceptions\CouldNotLoadImage;
use Spatie\Image\Image;

class ImageOptimizer
{
    /**
     * @throws CouldNotLoadImage
     */
    public static function optimize($patch, int $width, int $height): void
    {
        Image::load($patch)
            ->resize(width: $width, height: $height)
            ->quality(50)
            ->save();
    }
}
