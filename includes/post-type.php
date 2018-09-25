<?php

/**
 * Registers the `menu` post type.
 */
add_action( 'init', function () {
	register_post_type( 'menu', [
		'labels'                => [
			'name'                  => __( 'Restaurant Menus', 'sws-restaurant-menu' ),
			'singular_name'         => __( 'Restaurant Menu', 'sws-restaurant-menu' ),
			'all_items'             => __( 'All Restaurant Menus', 'sws-restaurant-menu' ),
			'archives'              => __( 'Restaurant Menu Archives', 'sws-restaurant-menu' ),
			'attributes'            => __( 'Restaurant Menu Attributes', 'sws-restaurant-menu' ),
			'insert_into_item'      => __( 'Insert into Restaurant Menu', 'sws-restaurant-menu' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Restaurant Menu', 'sws-restaurant-menu' ),
			'featured_image'        => _x( 'Featured Image', 'menu', 'sws-restaurant-menu' ),
			'set_featured_image'    => _x( 'Set featured image', 'menu', 'sws-restaurant-menu' ),
			'remove_featured_image' => _x( 'Remove featured image', 'menu', 'sws-restaurant-menu' ),
			'use_featured_image'    => _x( 'Use as featured image', 'menu', 'sws-restaurant-menu' ),
			'filter_items_list'     => __( 'Filter Restaurant Menus list', 'sws-restaurant-menu' ),
			'items_list_navigation' => __( 'Restaurant Menus list navigation', 'sws-restaurant-menu' ),
			'items_list'            => __( 'Restaurant Menus list', 'sws-restaurant-menu' ),
			'new_item'              => __( 'New Restaurant Menu', 'sws-restaurant-menu' ),
			'add_new'               => __( 'Add New', 'sws-restaurant-menu' ),
			'add_new_item'          => __( 'Add New Restaurant Menu', 'sws-restaurant-menu' ),
			'edit_item'             => __( 'Edit Restaurant Menu', 'sws-restaurant-menu' ),
			'view_item'             => __( 'View Restaurant Menu', 'sws-restaurant-menu' ),
			'view_items'            => __( 'View Restaurant Menus', 'sws-restaurant-menu' ),
			'search_items'          => __( 'Search Restaurant Menus', 'sws-restaurant-menu' ),
			'not_found'             => __( 'No Restaurant Menus found', 'sws-restaurant-menu' ),
			'not_found_in_trash'    => __( 'No Restaurant Menus found in trash', 'sws-restaurant-menu' ),
			'parent_item_colon'     => __( 'Parent Restaurant Menu:', 'sws-restaurant-menu' ),
			'menu_name'             => __( 'Restaurant Menus', 'sws-restaurant-menu' ),
		],
		'public'                => false,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_nav_menus'     => true,
		'show_in_admin_bar'     => true,
		'can_export'            => true,
		'supports'              => [ 'title', 'revisions' ],
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => false,
		'rewrite'               => [
			'with_front' => false,
		],
		'query_var'             => true,
		'menu_icon'             => 'dashicons-carrot',
		'show_in_rest'          => true,
		'rest_base'             => 'menu',
		'capability_type'       => 'page',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	] );
} );

/**
 * Sets the post updated messages for the `menu` post type.
 *
 * @param  array $messages Post updated messages.
 *
 * @return array Messages for the `menu` post type.
 */
add_filter( 'post_updated_messages', function ( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['menu'] = [
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Restaurant Menu updated. <a target="_blank" href="%s">View Restaurant Menu</a>',
			'sws-restaurant-menu' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'sws-restaurant-menu' ),
		3  => __( 'Custom field deleted.', 'sws-restaurant-menu' ),
		4  => __( 'Restaurant Menu updated.', 'sws-restaurant-menu' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Restaurant Menu restored to revision from %s',
			'sws-restaurant-menu' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Restaurant Menu published. <a href="%s">View Restaurant Menu</a>', 'sws-restaurant-menu' ),
			esc_url( $permalink ) ),
		7  => __( 'Restaurant Menu saved.', 'sws-restaurant-menu' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Restaurant Menu submitted. <a target="_blank" href="%s">Preview Restaurant Menu</a>',
			'sws-restaurant-menu' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Restaurant Menu scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Restaurant Menu</a>',
			'sws-restaurant-menu' ),
			date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Restaurant Menu draft updated. <a target="_blank" href="%s">Preview Restaurant Menu</a>',
			'sws-restaurant-menu' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	];

	return $messages;
} );


