<?php

namespace Lukaswhite\LaravelMetaTags\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Media
 *
 * This is the basis for images, videos and audio.
 *
 * @package Lukaswhite\LaravelMetaTags\Eloquent
 */
abstract class Media extends Audio
{
    /**
     * Get the width
     *
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Get the height
     *
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

}