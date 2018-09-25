<?php
/**
 * Plugin Name:     Restaurant Menu
 * Description:     Allows creating restaurant menu pages with sections
 * Author:          Digital Canvas
 * Author URI:      https://www.digitalcanvas.com
 * Text Domain:     sws-restaurant-menu
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Sws_Restaurant_Menu
 */

if ( ! defined( 'SWS_RESTAURANT_MENU_VERSION' ) ) {
	define( 'SWS_RESTAURANT_MENU_VERSION', '1.0' );
}

// Includes
require __DIR__ . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'post-type.php';
require __DIR__ . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'custom-fields.php';
//require __DIR__ . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'admin-columns.php';
//require __DIR__ . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'customizer.php';
require __DIR__ . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'shortcodes.php';
require __DIR__ . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'templates.php';
require __DIR__ . DIRECTORY_SEPARATOR . 'beaver-builder' . DIRECTORY_SEPARATOR . 'beaver-builder.php';

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style(
		'sws-restaurant-menu',
		plugin_dir_url( __FILE__ ) . 'css/sws-restaurant-menu.css',
		array(),
		SWS_RESTAURANT_MENU_VERSION,
		'all'
	);
} );
