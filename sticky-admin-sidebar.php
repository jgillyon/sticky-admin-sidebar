<?php
/*
Plugin Name: Sticky Admin Sidebar
Plugin URI:  https://github.com/jgillyon/sticky-admin-sidebar
Description: Sticks the post sidebar in wp-admin so it's always in view
Version:     1.0.2
Author:      Jason Gillyon
Author URI:  http://jasongillyon.co.uk
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
 * Load the admin JavSscript
 * @param  string $hook
 * @return mixed
 */
function sticky_admin_sidebar_script ( $hook ) {
	// Only load on new or edit post screen or acf options pages
    if ( !in_array( $hook, array( 'post.php', 'post-new.php' ) ) && substr($hook, 0, 24) != 'options_page_acf-options' && substr($hook, 0, 25) != 'toplevel_page_acf-options' ) {
        return;
    }

    // Load the script
    wp_enqueue_script( 'sticky_admin_sidebars', plugin_dir_url( __FILE__ ) . 'sticky-admin-sidebar.js', array( 'jquery' ) );
}
add_action( 'admin_enqueue_scripts', 'sticky_admin_sidebar_script' );