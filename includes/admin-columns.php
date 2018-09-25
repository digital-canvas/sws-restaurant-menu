<?php

add_action( "manage_posts_custom_column", function ( $column ) {

} );

add_filter( "manage_edit-menu_columns", function ( $columns ) {


	return $columns;
} );

add_filter( "manage_edit-menu_sortable_columns", function ( $columns ) {


	return $columns;
} );
