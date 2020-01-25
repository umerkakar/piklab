<?php
/**
 * The template for displaying all single posts.
 *
 * @package piklab
 */

get_header();
$container   = get_theme_mod( 'piklab_container_type' );
$sidebar_pos = get_theme_mod( 'piklab_sidebar_position' );
?>
	<?php while ( have_posts() ) : the_post(); ?>
		<section id="single-post-image">
				<?php echo get_the_post_thumbnail( $post->ID, 'full' ); ?>
		</section>
	<?php endwhile; ?>

<div class="wrapper" id="single-wrapper">

	<div class="container" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
				<div class="col-md-12 content-area" id="primary">

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'loop-templates/content', 'single' ); ?>

						<?php piklab_post_nav(); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // end of the loop. ?>

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
