<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package piklab
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'piklab_container_type' );
?>
	<?php // advertising area Footer ?>
	<div class="<?php echo esc_html( $container ); ?> homepage-top-ad content-area-bg" id="content" tabindex="-1">
		<div class="row">
			<div class="col-md-12" id="footer-ad">
				<!-- attachment-bottom-area -->
					<?php if ( is_active_sidebar( 'footer-ad' ) ) : ?>
						<?php dynamic_sidebar( 'footer-ad' ); ?>
					<?php endif; ?>
			</div>
		</div>
	</div>
	<?php // Advertising area end ?>
	
<?php get_sidebar( 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">
		<p class="socials">
			<a href="https://twitter.com/Piklab1/"><i class="fa fa-twitter"></i></a>
			<a href="https://facebook.com/Piklab1/"><i class="fa fa-facebook"></i></a>
			<a href="https://instagram.com/piklab/"><i class="fa fa-instagram"></i></a>
			<a href="https://pinterest.com/Piklab/"><i class="fa fa-pinterest"></i></a>
		</p>
		<p class="email"><a href="mailto:info@quotesbundle.com">info@piklab.net</a></p>
	<div class="<?php echo esc_html( $container ); ?>">

		<div class="row">

			<div class="col-md-12">
					<div class="col-md-12">
						
						<!-- The Footer Menu goes here -->
						<?php wp_nav_menu(
							array(
								'theme_location'  => 'footer',
								//'container_class' => '',
								'container_id'    => 'footer',
								'menu_class'      => 'footer-menu',
								//'fallback_cb'     => '',
								//'menu_id'         => '',
								//'walker'          => new WP_Bootstrap_Navwalker(),
							)
						); ?>
						
					</div>
					
					<div class="col-md-12 site-info">
						<?php // Regular WordPress theme just add in the footer template ?>
							<?php if( get_theme_mod( 'footer_text_block') != "" ){ ?>
							<span class="sep">
								<?php echo get_theme_mod( 'footer_text_block'); ?>
							</span>
							<?php }else { 
							echo '<span class="site-title">Copyright by <a href=" '. esc_url( home_url( '/' ) ) .' " rel="home">PikLab Studio®</a></span>';
							} ?>
					</div><!-- .site-info -->

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page -->
<?php wp_footer(); ?>

</body>

</html>

