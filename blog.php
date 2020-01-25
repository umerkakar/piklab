<?php
/**
 * Template Name: Blog Template
 *
 * @package piklab
 */

get_header();

$container   = get_theme_mod( 'piklab_container_type' );
$sidebar_pos = get_theme_mod( 'piklab_sidebar_position' );
?>
<?php // SUB STORIES ?>
		<div class="sub-stories">
		<?php
	global $post;
		$catquery = new WP_Query( 'category_name=featured&posts_per_page=1');
		if($catquery->found_posts > 0) { ?>
			
			<?php
				while($catquery->have_posts()) : $catquery->the_post();
				$image = (has_post_thumbnail($post->ID)) ? get_the_post_thumbnail($post->ID, 'thumbnails_posts_size') : '<div class="noThumb"></div>';
				$postthumb = get_the_post_thumbnail_url( $post->ID, 'featured-thumb' );
			?>
		<section id="banner-page">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h1><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h1>
					</div>
					<div class="col-md-6">
						<article class="banner__image">
							<a href="<?php echo get_permalink(); ?>" 
							title="<?php echo get_the_title(); ?>" class="banner_imageLink">
							<div class="banner_imageLink__imageCaption">
							Read
							</div>
								<img src="<?php echo $postthumb; ?>">
							</a>
						</article>
					</div>
				</div>
			</div>
		</section>
		<?php endwhile;
			wp_reset_postdata();
				?>
		<?php 
		} else{

		} ?>

<div class="wrapper" id="wrapper-posts">

	<div class="container" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check and opens the primary div -->
		<div class="col-md-12 content-area" id="primary">

			<main class="site-main" id="main">
				<div class="row">

					<?php /* Start the Loop */ ?>
			<?php query_posts('post_type=post&post_status=publish&posts_per_page=12&paged='. get_query_var('paged')); ?>
	
			<?php if( have_posts() ): ?>

					<?php while( have_posts() ): the_post(); ?>

						<?php

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'loop-templates/content', get_post_format() );
						?>

					<?php endwhile; ?>
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
