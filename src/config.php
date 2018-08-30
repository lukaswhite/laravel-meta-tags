<?php
/**
 * Laravel Meta tags config.
 *
 * Feel free to adjust this to your preference.
 */
return [

    'defaults'  =>  [

        /**
         * If set to true, then the site name will be set to the app name,
         * as defined in config/app.php.
         */
        'site_name' =>  false,

        /**
         * Whether to automatically add the locale Open Graph tag, which is
         * configured in config/app.php.
         */
        'locale' =>  false,

        /**
         * Whether to add the url as standard; it takes it from the
         * request object.
         */
        'url' => true,

        /**
         * Whether to add the CSRF token as standard.
         */
        'csrf_token' => true,

    ],

    /**
     * Whether to share the meta tags class with all views.
     */
    'share_all' =>  false,

    /**
     * Whether to attempt to set the canonical URL automatically from the
     * current route, provided it has a name.
     */
    'auto_canonical_for_named_routes'   =>  true,

];