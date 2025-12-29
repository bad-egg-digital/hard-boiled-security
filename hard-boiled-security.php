<?php

/**
 * Plugin main file.
 *
 * @package   badegguk\hard-boiled-security
 *
 * @wordpress-plugin
 * Plugin Name:       Hard Boiled Security
 * Plugin URI:        https://www.badegg.uk
 * Description:       A simple plugin that hardens some common Wordpress vulnerabilities.
 * Version:           1.0.1
 * Requires at least: 5.2
 * Requires PHP:      8.1
 * Author:            Bad Egg Digital
 * Author URI:        https://www.badegg.uk
 * Text Domain:       hard-boiled-security
 * License:           GPLv3
 */

namespace bedhbs;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if(!defined('BEDHBS')) define('BEDHBS', 'hard-boiled-security');
if(!defined('BEDHBS_VER')) define('BEDHBS_VER', '1.0.1');
if(!defined('BEDHBS_BASENAME')) define('BEDHBS_BASENAME', plugin_basename(__FILE__));
if(!defined('BEDHBS_FILE')) define('BEDHBS_FILE', __FILE__);
if(!defined('BEDHBS_DIR')) define('BEDHBS_DIR', plugin_dir_path( __FILE__ ));
if(!defined('BEDHBS_URL')) define('BEDHBS_URL', plugin_dir_url( __FILE__ ));

register_activation_hook(__FILE__, function () {
    flush_rewrite_rules();
});
register_deactivation_hook(__FILE__, function () {
    flush_rewrite_rules();
});

// Disable WP Admin File Editor
if(!defined('DISALLOW_FILE_EDIT')) define( 'DISALLOW_FILE_EDIT', true );

require_once(__DIR__ . '/lib/shorthash.php');

foreach (glob( __DIR__ . '/classes/*.php' ) as $file) {
    $class = __NAMESPACE__ . '\\' . pathinfo($file, PATHINFO_FILENAME);

    require_once($file);
    new $class();
}

