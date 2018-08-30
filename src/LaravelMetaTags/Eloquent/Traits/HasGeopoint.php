<?php

namespace Lukaswhite\LaravelMetaTags\Eloquent\Traits;

use Illuminate\Database\Eloquent\Model;
use Lukaswhite\MetaTags\Contracts\ContactData;
use Lukaswhite\MetaTags\Contracts\Geopoint;

/**
 * Trait HasGeopoint
 *
 * You can utilize this trait on an Eloquent model to satisfy the Geopoint
 * interface in the Meta Tags package. That way, you can use it to set the geopoint
 * Open Graph meta tags (e.g. latitude, longitude) simply by passing an instance.
 *
 * @package Lukaswhite\LaravelMetaTags\Eloquent\Traits
 */
trait HasGeopoint
{
    /**
     * Get the latitude
     *
     * @return float
     */
    public function getLatitude( )
    {
        /** @var Model $this */
        return $this->latitude;
    }

    /**
     * Get the longitude
     *
     * @return float
     */
    public function getLongitude( )
    {
        /** @var Model $this */
        return $this->longitude;
    }

    /**
     * Get the altitude
     *
     * @return int
     */
    public function getAltitude( )
    {
        /** @var Model $this */
        return $this->altitude;
    }
}