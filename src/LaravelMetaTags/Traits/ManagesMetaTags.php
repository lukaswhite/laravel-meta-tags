<?php

namespace Lukaswhite\LaravelMetaTags\Traits;

use Lukaswhite\LaravelMetaTags\MetaTags;

/**
 * Trait ManagesMetaTags
 *
 * For convenience, you can attach this trait to any class that's involved in managing
 * meta tags; for example your base controller. It's entirely optional to use it.
 *
 * It doesn't do much, it's really just a short-cut to pulling the current
 * set of meta tags from the service container.
 *
 * @package Lukaswhite\LaravelMetaTags\Traits
 */
trait ManagesMetaTags
{
    /**
     * Get the meta tags.
     *
     * @return MetaTags
     */
    protected function metaTags( )
    {
        return app( )->make( MetaTags::class );
    }
}