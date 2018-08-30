<?php

namespace Lukaswhite\LaravelMetaTags\Eloquent\Traits;

use Illuminate\Database\Eloquent\Model;
use Lukaswhite\MetaTags\Contracts\ContactData;

/**
 * Trait HasContactData
 *
 * You can utilize this trait on an Eloquent model to satisfy the ContactData
 * interface in the Meta Tags package. That way, you can use it to set the contact
 * data Open Graph meta tags simply by passing an instance.
 *
 * @package Lukaswhite\LaravelMetaTags\Eloquent\Traits
 */
trait HasContactData
{
    /**
     * Get the street address
     *
     * @return string
     */
    public function getStreetAddress( )
    {
        /** @var Model $this */
        return $this->street_address;
    }

    /**
     * Get the locality
     *
     * @return string
     */
    public function getLocality( )
    {
        /** @var Model $this */
        return $this->locality;
    }

    /**
     * Get the region
     *
     * @return string
     */
    public function getRegion( )
    {
        /** @var Model $this */
        return $this->region;
    }

    /**
     * Get the postal code
     *
     * @return string
     */
    public function getPostalCode( )
    {
        /** @var Model $this */
        return $this->postal_code;
    }

    /**
     * Get the country name
     *
     * @return string
     */
    public function getCountryName( )
    {
        /** @var Model $this */
        return $this->country_name;
    }

    /**
     * Get the e-mail address
     *
     * @return string
     */
    public function getEmail( )
    {
        /** @var Model $this */
        return $this->email;
    }

    /**
     * Get the phone number
     *
     * @return string
     */
    public function getPhone( )
    {
        /** @var Model $this */
        return $this->phone;
    }

    /**
     * Get the fax number
     *
     * @return string
     */
    public function getFaxNumber( )
    {
        /** @var Model $this */
        return $this->fax_number;
    }

    /**
     * Get the website
     *
     * @return string
     */
    public function getWebsite( )
    {
        /** @var Model $this */
        return $this->website;
    }
}