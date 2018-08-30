<?php

namespace Lukaswhite\LaravelMetaTags\Eloquent;

/**
 * Class Image
 *
 * This class can be extended to represent an image. It implements the
 * corresponding contract in the meta tags package, so you can use it to
 * add information to the Open Graph tags.
 *
 * By default it simply looks in the attributes; you're free to override these
 * methods as you see fit.
 *
 * @package Lukaswhite\LaravelMetaTags\Eloquent
 */
class Image extends Media implements \Lukaswhite\MetaTags\Contracts\Image
{
    /**
     * Get the alternative text
     *
     * @return string
     */
    public function getAlt( )
    {
        return $this->alt;
    }
}