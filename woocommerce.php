<?php
/**
 * The template for displaying all woocommerce pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package piklab 
 */

get_header();

$container   = get_theme_mod( 'piklab_container_type' );
$sidebar_pos = get_theme_mod( 'piklab_sidebar_position' );

?>

<div class="wrapper" id="woocommerce-wrapper">

	<div class="container-fluid" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
					<div class="col-md-9 content-area" id="primary">

			<main class="site-main" id="main">

				<?php woocommerce_content(); ?>

			</main><!-- #main -->

		</div><!-- #primary -->

		<!-- Do the right sidebar check -->
			<div class="col-md-3" id="shop-right-sidebar">
				<!-- attachment-bottom-area -->
					<?php if ( is_active_sidebar( 'shop-right-sidebar' ) ) : ?>
						<?php dynamic_sidebar( 'shop-right-sidebar' ); ?>
					<?php endif; ?>
			</div>

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
