<?php
/*
	Plugin Name: Copy Activity Link
	Description: Adds option to copy link of activity post under more options.
	Version: 2.3
	Author: Nmbrthirteen
 	Author URI: https://github.com/nmbrthirteen/
  	Plugin URI: https://github.com/nmbrthirteen/share-activity-link-buddyboss
  	License: GPLv2 or later
	License URI: http://www.gnu.org/licenses/gpl-2.0.html
	Text Domain: copy-activity-link
*/

defined('ABSPATH') || exit;

define('SAL_VERSION', '2.3');

function custom_activity_options_scripts() {
    if (!function_exists('bp_is_active') || !bp_is_active('activity')) {
        return;
    }

    wp_enqueue_style('custom-activity-options-style', plugin_dir_url(__FILE__) . 'main.css', array(), SAL_VERSION);
    wp_enqueue_script('custom-activity-options', plugin_dir_url(__FILE__) . 'custom-activity-options.js', array('jquery'), SAL_VERSION, true);
    wp_localize_script('custom-activity-options', 'custom_activity_options', array(
        'activity_permalink' => trailingslashit(bp_get_root_domain() . '/' . bp_get_activity_root_slug()),
        'copy_label'         => __('Copy Link', 'copy-activity-link'),
        'copied_message'     => __('Link copied', 'copy-activity-link'),
        'error_message'      => __('Could not copy the link', 'copy-activity-link'),
    ));
}
add_action('wp_enqueue_scripts', 'custom_activity_options_scripts', 10);
