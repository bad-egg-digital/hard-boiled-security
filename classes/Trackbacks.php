<?php

namespace bedhbs;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Trackbacks
{
    public function __construct()
    {
        add_filter('xmlrpc_methods', [$this, 'methods']);
        add_filter('wp_headers', [$this, 'headers']);
        add_action('init', [$this, 'support']);

        // Disable pingbacks and trackbacks globally
        add_filter( 'pre_update_option_default_ping_status', '__return_zero' );
        add_filter( 'pre_update_option_default_comment_status', '__return_zero' );

        // Close pings on all posts (including old ones)
        add_filter( 'pings_open', '__return_false', 9999 );
        add_filter( 'comments_open', '__return_false', 9999 );
    }

    function methods($params)
    {
        unset($params['pingback.ping']);
        unset($params['pingback.extensions.getPingbacks']);

        return $params;
    }

    function headers($params)
    {
        unset($params['X-Pingback']);

        return $params;
    }

    function support()
    {
        $postTypes = get_post_types_by_support('trackbacks');

        foreach($postTypes as $postType) {
            remove_post_type_support($postType, 'trackbacks');
        }
    }
}
