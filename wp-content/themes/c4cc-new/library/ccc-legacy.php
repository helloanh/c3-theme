<?php

/*
* Post Types
*/

function add_custom_post_types() {
	register_post_type( 'release',
		array(
			'labels' => array(
				'name' => __( 'Press Releases' ),
				'singular_name' => __( 'Press Release' ),
				'add_new_item' => __( 'Add Release' ),
				'edit_item' => __( 'Edit Release' ),
				'new_item' => __( 'New Release' ),
				'view_item' => __( 'View Release' ),
				'search_items' => __( 'Search Releases' ),
				'not_found' => __( 'No Releases Found' ),
				'not_found_in_trash' => __( 'No Releases Found in Trash' )
			),
			'public' => true,
			'show_ui' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'supports' => array( 'title','editor','page-attributes' ),
			'rewrite' => array( 'slug' => 'page', 'with_front' => true ),
			'_builtin' => false,
			'can_export' => true,
			'menu_position' => 10,
			'has_archive' => true,
			'hierarchical' => false,
			'query_var' => false,
			'capability_type' => 'page'
		)
	);

	register_post_type( 'cca_honoree',
		array(
			'labels' => array(
				'name' => __( 'Honorees' ),
				'singular_name' => __( 'Honoree' )
			),
			'public' => true,
			'rewrite' => array('slug' => 'honoree'),
			'menu_position' => 21,
			'supports' => array( 'title','page-attributes' ),
			'capability_type' => 'page'
		)
	);
	register_post_type( 'cca_eventphoto',
		array(
			'labels' => array(
				'name' => __( 'Event Photos' ),
				'singular_name' => __( 'Event Photo' )
			),
			'public' => true,
			'rewrite' => array('slug' => 'event-photo'),
			'menu_position' => 22,
			'supports' => array( 'title','page-attributes' ),
			'capability_type' => 'page'
		)
	);
}

add_action('init', 'add_custom_post_types');

/*
* Taxonomies
*/

function add_custom_taxonomies() {
	$labels = array(
		'name' => _x( 'Year', 'taxonomy general name' ),
		'singular_name' => _x( 'Year', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Years' ),
		'all_items' => __( 'All Years' ),
		'parent_item' => __( 'Parent Year' ),
		'parent_item_colon' => __( 'Parent Year:' ),
		'edit_item' => __( 'Edit Year' ),
		'update_item' => __( 'Update Year' ),
		'add_new_item' => __( 'Add New Year' ),
		'new_item_name' => __( 'New Year Name' ),
		'menu_name' => __( 'Years' )

	);
	register_taxonomy('cca_year','cca_honoree', array(
			'labels' => $labels,
			'rewrite' => array( 'slug' => 'year' ),
			'hierarchical' => true
		)
	);
}
add_action( 'init', 'add_custom_taxonomies',0 );
