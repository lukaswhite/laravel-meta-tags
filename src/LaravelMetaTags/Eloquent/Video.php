<?php

namespace Lukaswhite\LaravelMetaTags\Eloquent;

/**
 * Class Video
 *
 * This class can be extended to represent a video. It implements the
 * corresponding contract in the meta tags package, so you can use it to
 * add information to the Open Graph tags.
 *
 * By default it simply looks in the attributes; you're free to override these
 * methods as you see fit.
 *
 * @package Lukaswhite\LaravelMetaTags\Eloquent
 */
class Video extends Media implements \Lukaswhite\MetaTags\Contracts\Video
{
    /**
     * Get the image
     *
     * @return string
     */
    public function getImage( )
    {
        return $this->image;
    }
}