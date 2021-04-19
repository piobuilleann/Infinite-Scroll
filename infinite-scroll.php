<?php

/**
 * 
 *
 * @link              n/a
 * @since             1.0.0
 * @package           Infinite_Scroll
 *
 * @wordpress-plugin
 * Plugin Name:       Infinite Scroll
 * Plugin URI:         n/a
 * Description:       This plugin provides a infinite scroll on a page when applied the correct shortcode.
 * Version:           1.0.0
 * Author:            Christian Shackleton
 * Author URI:         n/a
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       infinite-scroll
 */


if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'INFINITE_SCROLL_VERSION', '1.0.0' );

//activate
function activate_infinite_scroll() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-infinite-scroll-activator.php';
	Infinite_Scroll_Activator::activate();
}

//deactivate
function deactivate_infinite_scroll() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-infinite-scroll-deactivator.php';
	Infinite_Scroll_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_infinite_scroll' );
register_deactivation_hook( __FILE__, 'deactivate_infinite_scroll' );


require plugin_dir_path( __FILE__ ) . 'includes/class-infinite-scroll.php';


require plugin_dir_path( __FILE__ ) . 'includes/class-infinite-scroll-shortcode.php';

New Infinite_Scroll_Shortcode();

function run_infinite_scroll() {
	$plugin = new Infinite_Scroll();
	$plugin->run();
}
run_infinite_scroll();
