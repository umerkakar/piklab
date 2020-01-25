<?php
/**
 * Registering Quotes Post Type
*/

function custom_post_type() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Quotes', 'Post Type General Name', 'piklab' ),
		'singular_name'       => _x( 'Quote', 'Post Type Singular Name', 'piklab' ),
		'menu_name'           => __( 'Quotes', 'piklab' ),
		'parent_item_colon'   => __( 'Parent Quote', 'piklab' ),
		'all_items'           => __( 'All Quotes', 'piklab' ),
		'view_item'           => __( 'View Quote', 'piklab' ),
		'add_new_item'        => __( 'Add New Quote', 'piklab' ),
		'add_new'             => __( 'Add New', 'piklab' ),
		'edit_item'           => __( 'Edit Quote', 'piklab' ),
		'update_item'         => __( 'Update Quote', 'piklab' ),
		'search_items'        => __( 'Search Quote', 'piklab' ),
		'not_found'           => __( 'Not Found', 'piklab' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'piklab' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'quotes', 'piklab' ),
		'description'         => __( 'Quote news and reviews', 'piklab' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'quotescat' ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/	
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'rewrite' => array( 'slug' => 'quote' ),
	);
	
	// Registering your Custom Post Type
	register_post_type( 'quotes', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'custom_post_type', 0 );



//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_quotescat_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it Quotes cat for your posts

function create_quotescat_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

  $labels = array(
    'name' => _x( 'Quotes cat', 'taxonomy general name' ),
    'singular_name' => _x( 'Quote cat', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Quotes cat' ),
    'all_items' => __( 'All Quotes cat' ),
    'parent_item' => __( 'Parent Quote cat' ),
    'parent_item_colon' => __( 'Parent Quote cat:' ),
    'edit_item' => __( 'Edit Quote cat' ), 
    'update_item' => __( 'Update Quote cat' ),
    'add_new_item' => __( 'Add New Quote cat' ),
    'new_item_name' => __( 'New Quote cat Name' ),
	'not_found'  => __( 'No Quote cat found.'),
    'menu_name' => __( 'Quotes cat' ),
  ); 	

// Now register the taxonomy

  register_taxonomy('quotescat',array('quotes'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'quotes' ),
  ));
}