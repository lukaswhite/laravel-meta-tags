<?php

namespace Lukaswhite\LaravelMetaTags\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Audio
 *
 * This class can be extended to represent an audio item. It implements the
 * corresponding contract in the meta tags package, so you can use it to
 * add information to the Open Graph tags.
 *
 * By default it simply looks in the attributes; you're free to override these
 * methods as you see fit.
 *
 * @package Lukaswhite\LaravelMetaTags\Eloquent
 */
class Audio extends Model implements \Lukaswhite\MetaTags\Contracts\Audio
{
    /**
     * Get the URL
     *
     * @return string
     */
    public function getUrl( )
    {
        return $this->url;
    }

    /**
     * Get the secure URL
     *
     * @return string
     */
    public function getSecureUrl( )
    {
        return $this->secure_url;
    }

    /**
     * Get the (mime) type
     *
     * @return string
     */
    public function getType( )
    {
        return $this->type;
    }
}