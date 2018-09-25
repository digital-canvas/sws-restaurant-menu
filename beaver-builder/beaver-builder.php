<?php
defined('ABSPATH') or die('No script kiddies please!');

define( 'SWSRM_FL_MODULE_CUSTOM_DIR', plugin_dir_path( __FILE__ ) );
define( 'SWSRM_FL_MODULE_CUSTOM_URL', plugins_url( '/', __FILE__ ) );

add_action( 'init', function(){
	if ( class_exists( 'FLBuilder' ) ) {
		require_once __DIR__ . '/sws-restaurant-menu/sws-restaurant-menu.php';
	}
} );
