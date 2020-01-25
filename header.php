<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package piklab
 */

$container = get_theme_mod( 'piklab_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="hfeed site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div class="wrapper-fluid wrapper-navbar" id="wrapper-navbar">

		<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content',
		'piklab' ); ?></a>

		<nav class="navbar navbar-toggleable-md  navbar-inverse bg-inverse fixed-top">

		<?php //if ( 'container' == $container ) : ?>
			<div class="container">
		<?php // endif; ?>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

					<?php //!-- Your site title as branding in the menu -- ?>
					<?php if ( ! has_custom_logo() ) { ?>

						<?php if ( is_front_page() && is_home() ) : ?>

							<a class="navbar-brand custom-logo-link mb-0" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
							
						<?php else : ?>

							<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
						
						<?php endif; ?>
						
					
					<?php } else {
						the_custom_logo();
					} ?><?php //-- end custom logo -- ?>
					
			<div class="header-social-icons text-right">
				<a href="#" class="header-social-icon">
					
				<ul class="search-bar-top">
					<li class="dropdown header-search">
						
						<span class="search-toggle" type="" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" 
						aria-expanded="false">
						<i class="fa fa-search" aria-hidden="true"></i><span> Search</span>
						</span>
						
						<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<li>
								<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
									<div class="input-group">
										<input class="field form-control" id="s" name="s" type="text"
											placeholder="<?php esc_attr_e( 'Search &hellip;', 'understrap' ); ?>">
										<span class="input-group-btn">
											<button class="submit btn btn-primary" id="searchsubmit" type="submit">
											<i class="fa fa-search" aria-hidden="true"></i></button>
									</span>
									</div>
								</form>
							</li>
						</ul>
					</li>
				</ul>
					
				</a>
				<a href="https://twitter.com/Piklab1/" class="header-social-icon social-icon">
					<i class="fa fa-twitter"></i>
				</a>
				<a href="https://facebook.com/Piklab1/" class="header-social-icon social-icon">
					<i class="fa fa-facebook"></i>
				</a>
				<a href="https://instagram.com/Piklab/" class="header-social-icon social-icon">
					<i class="fa fa-instagram"></i>
				</a>
				<a href="https://pinterest.com/Piklab/" class="header-social-icon social-icon">
					<i class="fa fa-pinterest"></i>
				</a>
			</div>
			
				<?php // The WordPress Menu goes here ?>
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'walker'          => new WP_Bootstrap_Navwalker(),
					)
				); ?>


			<?php ////if ( 'container' == $container ) : ?>
			</div><!-- .container -->
			<?php // endif; ?>
		</nav><!-- .site-navigation -->
<div id="search">
    <button type="button" class="close">×</button>
							<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
							<label>
								<span class="screen-reader-text">Search for:</span>
								<input type="search" class="search-field" placeholder="Type Keyword(s) Here" value="" name="s" data-swplive="true" data-swpengine="default" data-swpconfig="default" title="Search for:" autocomplete="off">
							</label>
							<button type="submit" class="btn btn-primary" value="submit">Search</button>
						</form>	
						
  
</div>
	</div><!-- .wrapper-navbar end -->