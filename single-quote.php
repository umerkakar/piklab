<?php
/**
 * The template for displaying all quotes posts.
 *
 * @package piklab 
 */

get_header();
$container   = get_theme_mod( 'piklab_container_type' );
$sidebar_pos = get_theme_mod( 'piklab_sidebar_position' );
?>

<div class="wrapper" id="single-wrapper">

	<div class="container-fluid" id="content" tabindex="-1">
<?php while ( have_posts() ) : the_post(); ?>
	<div class="entry-content"  id="post-<?php the_ID(); ?>">
		<div class="quote-content">
			<div class="quote_text">
				<?php the_title( '<h1><span class="quote_sign">”</span>', '<span class="quote_sign">”</span></h1>' ); ?>
			</div>
			<div class="quote_author">
				<?php the_content(); ?>
			</div>
		</div>
	</div><!-- .entry-content -->
</div>

		<?php // advertising area head ?>
	<div class="container-fluid homepage-top-ad content-area-bg" id="content" tabindex="-1">
		<div class="row">
			<div class="col-md-12" id="header-ad">
				<!-- attachment-bottom-area -->
					<?php if ( is_active_sidebar( 'header-ad' ) ) : ?>
						<?php dynamic_sidebar( 'header-ad' ); ?>
					<?php endif; ?>
			</div>
		</div>
	</div>
	<?php // Advertising area end ?>
	
	<div class="container-fluid" id="single-quote" tabindex="-1">
	
		<div class="row" style="padding: 30px 0;">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check', 'none' ); ?>

			<main class="site-main" id="main">

				
					<?php get_template_part( 'loop-templates/content', 'quote' ); ?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

		</div><!-- #primary -->

		<!-- Do the right sidebar check -->
		<?php //if ( 'right' === $sidebar_pos || 'both' === $sidebar_pos ) : ?>

			<?php get_sidebar( 'right' ); ?>

		<?php //endif; ?>

	</div><!-- .row -->

</div><!-- Container end -->

		<div class="container-fluid" id="cats-inner-pages" tabindex="-1">
				<div class="row">
					<?php get_template_part( 'loop-templates/content', 'catsin' ); ?>
				</div>
		</div>

</div><!-- Wrapper end -->

<?php get_footer(); ?>
