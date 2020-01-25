<?php
/**
 * piklab enqueue scripts
 *
 * @package piklab
 */

if ( ! function_exists( 'piklab_scripts' ) ) {
	/**
	 * Load theme's JavaScript sources.
	 */
	function piklab_scripts() {
		// Get the theme data.
		$the_theme = wp_get_theme();
		wp_enqueue_style( 'piklab-styles', get_stylesheet_directory_uri() . '/css/theme.css', array(), $the_theme->get( 'Version' ) );
		wp_enqueue_style( 'qoutes-styles', get_stylesheet_directory_uri() . '/css/style.css', array(), $the_theme->get( 'Version' ) );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'piklab-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $the_theme->get( 'Version' ), true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
} // endif function_exists( 'piklab_scripts' ).

add_action( 'wp_enqueue_scripts', 'piklab_scripts' );
