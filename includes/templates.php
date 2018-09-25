<?php


/**
 * @param int $post_id
 */
function sws_restaurant_display_menu( $post_id ) {
	global $post;

	$menu = get_post( $post_id, OBJECT, 'display' );
	if ( $menu->post_type != 'menu' ) {
		// incorrect post type
		return;
	}
	$post = $menu;
	setup_postdata( $post );
	require dirname( __DIR__ ) . '/templates/menu.php';
	wp_reset_postdata();
}
