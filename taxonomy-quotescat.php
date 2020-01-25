<?php
/**
 * The template for displaying quotes archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package piklab
 */

get_header();
?>

<?php
$container   = get_theme_mod( 'piklab_container_type' );
$sidebar_pos = get_theme_mod( 'piklab_sidebar_position' );
?>

	<?php // advertising area head ?>
	<div class="<?php echo esc_html( $container ); ?> homepage-top-ad content-area-bg" id="content" tabindex="-1">
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
<div class="wrapper" id="archive-wrapper">

	<div class="<?php echo esc_html( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check', 'none' ); ?>

			<main class="site-main" id="main">

				<?php if ( have_posts() ) : ?>

					<?php //<header class="page-header"> ?>
						<?php
						//the_archive_title( '<h1 class="page-title">', '</h1>' );
						//the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
					<?php // </header><!-- .page-header --> ?>

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'loop-templates/content', 'quotescat' );
						?>

					<?php endwhile; ?>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php // piklab_pagination(); ?>

		</div><!-- #primary -->

		<!-- Do the right sidebar check -->
		<?php if ( 'right' === $sidebar_pos || 'both' === $sidebar_pos ) : ?>

			<?php get_sidebar( 'right' ); ?>

		<?php endif; ?>

	</div> <!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
