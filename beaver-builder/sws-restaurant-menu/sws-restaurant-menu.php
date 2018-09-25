<?php

/**
 * @class SWSResautantMenuModule
 */
class SWSResautantMenuModule extends FLBuilderModule {
	/**
	 * Constructor function for the module. You must pass the
	 * name, description, dir and url in an array to the parent class.
	 *
	 * @method __construct
	 */
	public function __construct() {
		parent::__construct(
			[
				'name'          => __( 'Restaurant Menu', 'sws-restaurant-menu' ),
				'description'   => __( 'Restaurant Menu', 'sws-restaurant-menu' ),
				'category'      => __( 'Restaurant Menu', 'sws-restaurant-menu' ),
				'dir'           => SWSRM_FL_MODULE_CUSTOM_DIR . 'sws-restaurant-menu/',
				'url'           => SWSRM_FL_MODULE_CUSTOM_URL . 'sws-restaurant-menu/',
				'editor_export' => true, // Defaults to true and can be omitted.
				'enabled'       => true, // Defaults to true and can be omitted.
			]
		);
	}
}


add_action( 'fl_builder_control_sws-post-select', function($name, $value, $field, $settings){
	$posts = get_posts( [
		'nopaging'       => true,
		'posts_per_page' => - 1,
		'post_type'      => $field['post_type'],
		'post_status'    => 'any',
		'orderby'        => 'title',
		'order'          => 'ASC',
	] );
	echo '<select name="' . esc_attr($name) . '">';
	foreach ( $posts as $post ) {
		$selected = $value == $post->ID ? 'selected' : '';
		echo '<option value="' . esc_attr( $post->ID ) . '" ' . $selected . ' >' . esc_html( $post->post_title ) . '</option>';
	}
	echo '</select>';
}, 1, 4 );


/**
 * Register the module and its form settings.
 */
FLBuilder::register_module(
	'SWSResautantMenuModule',
	[
		'content' => [
			'title'    => __( 'Content', 'sws-restaurant-menu' ),
			'sections' => [
				'quote' => [
					'title'  => __( 'Restaurant Menu', 'sws-restaurant-menu' ),
					'fields' => [
						'menu' => [
							'type'      => 'sws-post-select',
							'label'     => __( 'Menu', 'sws-restaurant-menu' ),
							'post_type' => 'menu', // Slug of the post type to search.
						],
					],
				],
			],
		],
	]
);
