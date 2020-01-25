<?php
/**
 * Declaring widgets
 *
 * @package piklab
 */

/**
 * Count number of widgets in a sidebar
 * Used to add classes to widget areas so widgets can be displayed one, two, three or four per row
 */
function slbd_count_widgets( $sidebar_id ) {
	// If loading from front page, consult $_wp_sidebars_widgets rather than options
	// to see if wp_convert_widget_settings() has made manipulations in memory.
	global $_wp_sidebars_widgets;
	if ( empty( $_wp_sidebars_widgets ) ) :
		$_wp_sidebars_widgets = get_option( 'sidebars_widgets', array() );
	endif;
	
	$sidebars_widgets_count = $_wp_sidebars_widgets;
	
	if ( isset( $sidebars_widgets_count[ $sidebar_id ] ) ) :
		$widget_count = count( $sidebars_widgets_count[ $sidebar_id ] );
		$widget_classes = 'widget-count-' . count( $sidebars_widgets_count[ $sidebar_id ] );
		if ( $widget_count % 4 == 0 || $widget_count > 6 ) :
			// Four widgets er row if there are exactly four or more than six
			$widget_classes .= ' col-md-3';
		elseif ( 6 == $widget_count ) :
			// If two widgets are published
			$widget_classes .= ' col-md-2';
		elseif ( $widget_count >= 3 ) :
			// Three widgets per row if there's three or more widgets 
			$widget_classes .= ' col-md-4';
		elseif ( 2 == $widget_count ) :
			// If two widgets are published
			$widget_classes .= ' col-md-6';
		elseif ( 1 == $widget_count ) :
			// If just on widget is active
			$widget_classes .= ' col-md-12';
		endif; 
		return $widget_classes;
	endif;
}


if ( ! function_exists( 'piklab_widgets_init' ) ) {
	/**
	 * Initializes themes widgets.
	 */
	function piklab_widgets_init() {
		register_sidebar( array(
			'name'          => __( 'Right Sidebar', 'piklab' ),
			'id'            => 'right-sidebar',
			'description'   => 'Right sidebar widget area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Left Sidebar', 'piklab' ),
			'id'            => 'left-sidebar',
			'description'   => 'Left sidebar widget area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		
// Advertising Widgets
		register_sidebar( array(
			'name'          => __( 'Header Advertising', 'piklab' ),
			'id'            => 'header-ad',
			'description'   => 'Header Advertising area under menu',
			'before_widget' => '<aside id="%1$s" class="widget ad-widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="ad-widget-title">',
			'after_title'   => '</h3>',
		) );
		register_sidebar( array(
			'name'          => __( 'Footer Advertising', 'protheme' ),
			'id'            => 'footer-ad',
			'description'   => 'Footer Advertising area',
			'before_widget' => '<aside id="%1$s" class="widget ad-widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="ad-widget-title">',
			'after_title'   => '</h3>',
		) );

// HomePage Featured Widgets
		register_sidebar( array(
			'name'          => __( 'Homepage Left Side area', 'piklab' ),
			'id'            => 'homepage-left',
			'description'   => 'Put widget to display on homepage left side',
			'before_widget' => '<aside id="%1$s" class="widget ad-widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="ad-widget-title">',
			'after_title'   => '</h3>',
		) );
		register_sidebar( array(
			'name'          => __( 'Homepage Right Side area', 'piklab' ),
			'id'            => 'homepage-right',
			'description'   => 'Put widget to display on homepage Right side',
			'before_widget' => '<aside id="%1$s" class="widget ad-widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="ad-widget-title">',
			'after_title'   => '</h3>',
		) );
// Shop Right Sidebar Area Widgets
		register_sidebar( array(
			'name'          => __( 'Shop Right Sidebar', 'piklab' ),
			'id'            => 'shop-right-sidebar',
			'description'   => 'Right Sidebar for Shop pages.',
			'before_widget' => '<aside id="%1$s" class="widget ad-widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="ad-widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Footer Full', 'piklab' ),
			'id'            => 'footerfull',
			'description'   => 'Widget area below main content and above footer',
		    'before_widget'  => '<div id="%1$s" class="footer-widget %2$s '. slbd_count_widgets( 'footerfull' ) .'">', 
		    'after_widget'   => '</div><!-- .footer-widget -->', 
		    'before_title'   => '<h3 class="widget-title">', 
		    'after_title'    => '</h3>', 
		) );

	}
} // endif function_exists( 'piklab_widgets_init' ).
add_action( 'widgets_init', 'piklab_widgets_init' );

