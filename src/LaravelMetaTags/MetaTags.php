<?php

namespace Lukaswhite\LaravelMetaTags;

use Illuminate\Contracts\Pagination\Paginator;

/**
 * Class MetaTags
 *
 * This extends the framework-agnostic meta tags library, adding a few Laravel-specific tweaks.
 *
 * @package Lukaswhite\LaravelMetaTags
 */
class MetaTags extends \Lukaswhite\MetaTags\MetaTags
{
    /**
     * Set the pagination links, simply by passing a paginator object.
     *
     * @return $this
     */
    public function paginator( Paginator $paginator )
    {
        $this->previousPage( $paginator->previousPageUrl( ) );
        $this->nextPage( $paginator->nextPageUrl( ) );
        return $this;
    }

    /**
     * Set the canonical URL using a named route.
     *
     * Since named routes will always return the same URL, taking the parameters
     * into account, this is a safe way to do it.
     *
     * @param string $name
     * @param array $params
     * @return $this
     */
    public function canonicalRoute( $name, $params = [ ] )
    {
        $this->canonical(
            route(
                $name,
                $params
            )
        );
        return $this;
    }
}