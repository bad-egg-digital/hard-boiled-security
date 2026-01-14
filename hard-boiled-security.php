<?php

/**
 * Plugin main file.
 *
 * @package   badegguk\hard-boiled-security
 *
 * @wordpress-plugin
 * Plugin Name:       Hard Boiled Security
 * Plugin URI:        https://github.com/bad-egg-digital/hard-boiled-security
 * Description:       A simple plugin that hardens some common Wordpress vulnerabilities.
 * Version:           1.0.1
 * Requires at least: 6.9
 * Requires PHP:      8.1
 * Author:            Bad Egg Digital
 * Author URI:        https://www.badegg.uk
 * Text Domain:       hard-boiled-security
 * License:           GPL-3.0-or-later
 */

namespace bedhbs;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Disable WP Admin File Editor
if (!defined('DISALLOW_FILE_EDIT') && !DISALLOW_FILE_EDIT) {
    define('DISALLOW_FILE_EDIT', true);
}

require_once(__DIR__ . '/lib/shorthash.php');

foreach (glob(__DIR__ . '/classes/*.php') as $bedhbs_file) {
    $bedhbs_class = __NAMESPACE__ . '\\' . pathinfo($bedhbs_file, PATHINFO_FILENAME);

    require_once($bedhbs_file);

    if (class_exists($bedhbs_class)) {
        new $bedhbs_class();
    }
}
