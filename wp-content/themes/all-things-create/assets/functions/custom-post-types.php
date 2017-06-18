<?php
function cptui_register_my_cpts() {

	/**
	 * Post Type: Floaters.
	 */

	$labels = array(
		"name" => __( 'Floaters', '' ),
		"singular_name" => __( 'Floater', '' ),
	);

	$args = array(
		"label" => __( 'Floaters', '' ),
		"labels" => $labels,
		"description" => "Floater post types are used to float above the timeline.  Floaters move at a different speed than the background and the feed.",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "floater", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail" ),
		"taxonomies" => array( "category", "post_tag" ),
	);

	register_post_type( "floater", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );
