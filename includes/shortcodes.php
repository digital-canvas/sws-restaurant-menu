<?php

add_shortcode( 'restaurant-menu', function ( $atts ) {
	$settings = shortcode_atts( [
		'id' => null,
	], $atts );

	sws_restaurant_display_menu( $settings['id'] );
} );

add_action( 'init', function () {
	if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
		return;
	}

	if ( get_user_option( 'rich_editing' ) == 'true' ) {
		add_filter( 'mce_external_plugins', function ( $plugin_array ) {
			$plugin_array['swsmenu'] = plugins_url( '/../js/sws-restaurant-menu.js', __FILE__ );

			return $plugin_array;
		} );
		add_filter( 'mce_buttons', function ( $buttons ) {
			array_push( $buttons, "|", "swsmenu" );

			return $buttons;
		} );
	}
} );

add_action( 'admin_enqueue_scripts', function () {
	wp_enqueue_style( 'sws-restaurant-menu-admin', plugins_url( '/../css/sws-restaurant-menu-admin.css', __FILE__ ) );

} );

if ( is_admin() ) {
	add_action( 'wp_ajax_sws_restaurant_menu_menus', function () {
		global $wpdb; // this is how you get access to the database

		$posts = get_posts([
			'nopaging' => true,
			'posts_per_page' => -1,
			'post_type'        => 'menu',
			'post_status'      => 'any',
			'orderby'          => 'title',
			'order'            => 'ASC',
		]);

		$posts = array_map(function(WP_Post $post){
			return [
				'text' => $post->post_title,
				'value' => $post->ID
			];
		}, $posts);

		wp_send_json( $posts );
	} );
}
