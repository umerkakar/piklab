<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package piklab
 */

?>
<div class="col-lg-3 col-md-4 col-sm-6 col-12">
	<div class="gridblock-archive">
		<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

			<a href="<?php echo get_permalink(); ?>"><?php echo get_the_post_thumbnail( $post->ID, 'thumbnail' ); ?></a>
			
			<header class="entry-header">

				<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
				'</a></h3>' ); ?>
				
			</header><!-- .entry-header -->

			<footer class="entry-footer">
				<div class="cat-links">
					<?php $category = get_the_category(); echo '<a class="category" 
					href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>'; ?>
					<?php // piklab_entry_footer(); ?>
				</div>
			</footer><!-- .entry-footer -->

		</article><!-- #post-## -->
	</div>
</div>
