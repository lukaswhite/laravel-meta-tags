<?php

namespace Lukaswhite\LaravelMetaTags\ViewComposers;

use Illuminate\Contracts\View\View;
use Lukaswhite\LaravelMetaTags\MetaTags;

/**
 * Class MetaTagsViewComposer
 *
 * Ensures that the meta tags manager is shared amongst views.
 *
 * @package Lukaswhite\LaravelMetaTags\ViewComposers
 */
class MetaTagsViewComposer
{
    /**
     * Run the view composer.
     *
     * Essentially this simply grabs the meta tags manager instance (a singleton) from the
     * service container, and injects it into all views.
     *
     * @param View $view
     */
    public function compose( View $view )
    {
        $view->with(
            'metaTags',
            app( )->make( MetaTags::class )
        );
    }
}