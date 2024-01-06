<?php
/*
	Plugin Name: Copy Activity Link
	Description: Adds option to copy link of activity post under more options.
	Version: 2.3
	Author: Nmbrthirteen
 	Author URI: https://github.com/nmbrthirteen/
  	License: GPLv2 or later
	License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

defined('ABSPATH') || exit;

function custom_activity_options_scripts() {
    wp_enqueue_style('custom-activity-options-style', plugin_dir_url(__FILE__) . '/main.css');
    wp_enqueue_script('custom-activity-options', plugin_dir_url(__FILE__) . 'custom-activity-options.js', array('jquery'), '1.0.0', true);
    wp_add_inline_script('custom-activity-options', 'var custom_activity_options = ' . wp_json_encode(array('activity_permalink' => trailingslashit(bp_get_root_domain() . '/' . bp_get_activity_root_slug()))), 'before');
}
add_action('wp_enqueue_scripts', 'custom_activity_options_scripts', 10);

function check_buddyboss_platform() {
    if ( ! class_exists('BuddyBoss') || ! function_exists('bp_is_active') || ! bp_is_active('activity') ) {
        // BuddyBoss Platform or Activity Feeds is not active
        deactivate_plugins(plugin_basename(__FILE__));
        add_action('admin_notices', 'custom_activity_options_admin_notice');
    }
}
register_activation_hook(__FILE__, 'check_buddyboss_platform');

function custom_activity_options_admin_notice() {
    ?>
    <div class="notice notice-error is-dismissible">
        <p><?php _e('Copy Activity Link requires BuddyBoss Platform and the Activity Feeds component to be active. Please make sure they are installed and activated before activating this plugin.', 'copy-activity-link'); ?></p>
    </div>
    <?php
}
