<?php
/**
 * The template for displaying archive pages.
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
				
				<?php get_template_part( 'loop-templates/content', 'archive-title' ); ?>
			
<div class="wrapper" id="wrapper-posts">

	<div class="container" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check and opens the primary div -->
		<div class="col-md-12 content-area" id="primary">

			<main class="site-main" id="main">
				<div class="row">

				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'loop-templates/content', get_post_format() );
						?>

					<?php endwhile; ?>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>
				</div>
			</main><!-- #main -->	
		</div><!-- #primary -->

	</div><!-- .row -->

</div><!-- Container end -->
</div><!-- Wrapper end -->


<!-- Categories ontainer Start -->			
<div class="wrapper" id="wrapper-cats">

	<div class="container" id="content" tabindex="-1">
		<h1 class="category-title-box">Browse <span class="light-heading">by Category<span></h1>
			<div class="row">
				<?php get_template_part( 'loop-templates/content', 'cats' ); ?>
			</div>
	</div>
</div>
	<!-- Categories Container end -->


<?php get_footer(); ?>
