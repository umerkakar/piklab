<?php
/**
 * WordPress.com-specific functions and definitions
 *
 * This file is centrally included from `wp-content/mu-plugins/wpcom-theme-compat.php`.
 *
 * @package piklab
 */

/**
 * Adds support for wp.com-specific theme functions.
 *
 * @global array $themecolors
 */
function piklab_wpcom_setup() {
	global $themecolors;

	// Set theme colors for third party services.
	if ( ! isset( $themecolors ) ) {
		$themecolors = array(
			'bg'     => '',
			'border' => '',
			'text'   => '',
			'link'   => '',
			'url'    => '',
		);
	}
	
	/* Add WP.com print styles */
	add_theme_support( 'print-styles' );
}
add_action( 'after_setup_theme', 'piklab_wpcom_setup' );

/*
 * WordPress.com-specific styles
 */
function piklab_wpcom_styles() {
	wp_enqueue_style( 'piklab-wpcom', get_template_directory_uri() . '/inc/style-wpcom.css', '20160411' );
}
add_action( 'wp_enqueue_scripts', 'piklab_wpcom_styles' );
