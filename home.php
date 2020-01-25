<?php
/**
 * Template Name: Homepage Template
 *
 * @package piklab
 */

get_header();

$container   = get_theme_mod( 'piklab_container_type' );
$sidebar_pos = get_theme_mod( 'piklab_sidebar_position' );
?>

<div class="curtain homecover">
	<div class="stage">
		<div class="cover">
			<div id="cover-bg" style="background-image: url(&quot;/frontend/img/homecovers/island-lake.jpg&quot;); opacity: 0.1;"></div>
				<div class="outer">
					<div class="middle">
						<div class="collection-header inner">
							<div class="header-content">
								<h1>Signup For Latest Deals</h1>
								<div style="clear: both"></div>
									<span class="cover-separator"></span>
									<table>
										<tbody>
											<tr>
												<td width="366" class="pitch">
													<p class="pitch-first">Join 10,000+ other people to get free Wallpapers and Deals.</p>
													<?php echo do_shortcode('[mc4wp_form id="289"]'); ?>
												</td>
											</tr>
										</tbody>
									</table>
							</div>
						</div>
					</div>
			</div>
		</div>
	</div>
</div>

	<?php // Homepage widget areas ?>
	<div class="<?php echo esc_html( $container ); ?> homepage-top-ad content-area-bg" id="content" tabindex="-1">
		<div class="row">
			<div class="col-md-6" id="homepage-left">
				<!-- attachment-bottom-area -->
					<?php if ( is_active_sidebar( 'homepage-left' ) ) : ?>
						<?php dynamic_sidebar( 'homepage-left' ); ?>
					<?php endif; ?>
			</div>
			<div class="col-md-6" id="homepage-right">
				<!-- attachment-bottom-area -->
					<?php if ( is_active_sidebar( 'homepage-right' ) ) : ?>
						<?php dynamic_sidebar( 'homepage-right' ); ?>
					<?php endif; ?>
			</div>
		</div>
	</div>
	<?php // Homepage widget areas end ?>

	<?php // advertising area head ?>

	<?php // Advertising area end ?>
<div class="wrapper" id="wrapper-index">

	<div class="<?php echo esc_html( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check and opens the primary div -->
		<div class="col-md-12 content-area" id="primary">

			<main class="site-main" id="main">
				<div class="row">
					<?php get_template_part( 'loop-templates/content', 'tax' ); ?>
				</div>
			</main><!-- #main -->

			<!-- The pagination component -->
			<?php // piklab_pagination(); ?>

		</div><!-- #primary -->
		

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
