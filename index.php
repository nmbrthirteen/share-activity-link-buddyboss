<?php
/*
	Plugin Name: Copy Activity Link
	Description: Adds option to copy link of activity post under more options.
	Version: 2.1
	Author: Nika Siradze
*/

defined( 'ABSPATH' ) || exit;

function custom_activity_options_scripts() {
    wp_enqueue_style( 'custom-activity-options-style', plugin_dir_url( __FILE__ ) . '/main.css' );
    wp_enqueue_script( 'custom-activity-options', plugin_dir_url( __FILE__ ) . 'custom-activity-options.js', array( 'jquery' ), null, true );
    wp_localize_script( 'custom-activity-options', 'custom_activity_options', array(
        'activity_permalink' => trailingslashit( bp_get_root_domain() . '/' . bp_get_activity_root_slug() )
    ) );
}
add_action( 'wp_enqueue_scripts', 'custom_activity_options_scripts' );

