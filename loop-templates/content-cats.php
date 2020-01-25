<?php
/**
 * Category template to get category list.
 *
 * @package piklab
 */
 
		$args = array(
		  'orderby' => 'name',
		  'hide_empty' => 0,
		  'show_count' => 1
		  );
		$categories = get_categories( $args );
		foreach ( $categories as $category ) { ?>

		
		<div class="col-lg-3 col-md-4 col-sm-6 col-12">
			<div class="category-grid">
				<a href="<?php echo get_category_link( $category->term_id ); ?>" class="category-image-box">
					<img data-lazy-type="image" 
					data-src="<?php echo z_taxonomy_image_url($category->term_id, 'thumbnail'); ?>" class="img-fluid lazy"
					height="50" width="50" data-original="<?php echo z_taxonomy_image_url($category->term_id); ?>"
					alt="<?php echo $category->name; ?>">
				</a>
				
					<div class="category-title">
						<a href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->name; ?></a>
					</div>
			</div>
		</div>
	
	<?php }
		?>