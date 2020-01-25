<?php
/**
 * Single post partial template.
 *
 * @package piklab
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
<div class="row">
<div class="offset-md-1 col-md-2">

		<div class="entry-meta">
			<span class="author-image"><?php echo get_avatar( get_the_author_meta( 'ID' ), 72 ); ?></span>
			<span class="author"><?php the_author_posts_link(); ?></span>
			<?php $my_date = the_date('', '<span class="published-date">', '</span>', FALSE); echo $my_date; ?>
			<div class="single-post-category"><i class="fa fa-tag" aria-hidden="true"></i>
				<?php $category = get_the_category(); echo '<a class="category" 
				href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>'; ?>
			</div>
		</div><!-- .entry-meta -->

</div>


<div class="col-md-7">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php the_content(); ?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'piklab' ),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->
</div>
</div>


<div class="row">
<div class="offset-md-2 col-md-8">
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
</div>
</div>	

	<footer class="entry-footer">
		<div class="row">
			<div class="offset-md-2 col-md-3">
				<div class="author-info">
					<div class="author-image">
						<?php echo get_avatar( get_the_author_meta( 'ID' ), 72 ); ?>
					</div>
					<div class="author">
						<h2>Written by
							<div class="author-name"><?php the_author_posts_link(); ?></div>
						</h2>
					</div>
				</div>
			<a class="see-more-author" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">See <?php echo get_the_author(); ?>’s latest posts</a>
			</div>
			<div class="col-md-5">
				<div class="author-description">
					<p><?php echo nl2br(get_the_author_meta('description')); ?></p>
				</div>
			</div>
		</div>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->