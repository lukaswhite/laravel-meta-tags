<?php

namespace Lukaswhite\LaravelMetaTags;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Lukaswhite\LaravelMetaTags\ViewComposers\MetaTagsViewComposer;

/**
 * Class LaravelMetaTagsServiceProvider
 *
 * @package Lukaswhite\LaravelMetaTags
 */
class LaravelMetaTagsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot( )
    {
        // Register the config file
        $this->publishes(
            [
                __DIR__ . '/../config.php' => config_path('laravel-meta-tags.php' ),
            ]
        );

        // Register the meta tags class as a singleton
        $this->app->singleton( MetaTags::class, function( $app ) {

            $meta = new MetaTags( );

            // Optionally set the site name from config
            if ( config( 'laravel-meta-tags.defaults.site_name' ) ) {
                $meta->siteName( array_get( $app[ 'config' ], 'app.name' ) );
            }

            // Optionally set the URL
            if ( config( 'laravel-meta-tags.defaults.url' ) ) {
                $meta->url( url( )->full( ) );
            }

            // Optionally set the locale from config
            if ( config( 'laravel-meta-tags.defaults.locale' ) ) {
                $meta->locale(array_get($app['config'], 'app.locale'));
            }

            // Inject the CSRF token if required
            if ( config( 'laravel-meta-tags.defaults.csrf_token' ) ) {
                $meta->custom(
                    'csrf-token',
                    csrf_token()
                );
            }

            // Optionally attempt to set the canonical URL from the current route, if
            // it's a named route
            if ( config( 'laravel-meta-tags.auto_canonical_for_named_routes' ) ) {
                if ( $name = Route::getCurrentRoute( )->getName( ) ) {
                    $meta->canonicalRoute( $name, Route::getCurrentRoute( )->parameters( ) );
                }
            }

            return $meta;

        } );

        // The Meta tags view composer exposes the meta tags service to all views; we only do
        // so if the config specifies it, however
        if ( config( 'laravel-meta-tags.defaults.share_all' ) ) {
            view()->composer(
                '*',
                MetaTagsViewComposer::class
            );
        }

        // Register the Blade directive
        Blade::directive( 'metaTags', function( $expression )
        {
            return '<?php print
                app( )->make(
                \Lukaswhite\LaravelMetaTags\MetaTags::class
            )->render( ); ?>';
        } );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}