<?php
/**
 * Check and setup theme's default settings
 *
 * @package piklab
 *
 */
function setup_theme_default_settings() {

	// check if settings are set, if not set defaults.
	// Caution: DO NOT check existence using === always check with == .
	// Latest blog posts style.
	$piklab_posts_index_style = get_theme_mod( 'piklab_posts_index_style' );
	if ( '' == $piklab_posts_index_style ) {
		set_theme_mod( 'piklab_posts_index_style', 'default' );
	}

	// Sidebar position.
	$piklab_sidebar_position = get_theme_mod( 'piklab_sidebar_position' );
	if ( '' == $piklab_sidebar_position ) {
		set_theme_mod( 'piklab_sidebar_position', 'right' );
	}

	// Container width.
	$piklab_container_type = get_theme_mod( 'piklab_container_type' );
	if ( '' == $piklab_container_type ) {
		set_theme_mod( 'piklab_container_type', 'container' );
	}
}
