<?php
/**
 * Category template to get category list.
 *
 * @package piklab
 */

// List terms in a given taxonomy using wp_list_categories
 
$taxonomy     = 'quotescat';
$orderby      = 'name'; 
$show_count   = 1;
$pad_counts   = false;
$hierarchical = true;
$title        = '';
$hide_empty   = 0;
 
$args = array(
  'taxonomy'     => $taxonomy,
  'orderby'      => $orderby,
  'show_count'   => $show_count,
  'pad_counts'   => $pad_counts,
  'hierarchical' => $hierarchical,
  'title_li'     => $title,
  'hide_empty'	 => $hide_empty
);

			$taxonomies = get_categories( $args );
			
			foreach ( $taxonomies as $taxonomy ) {
				?>


		<div class="col-lg-3 col-md-4 col-sm-6 col-12">
			<div class="gridblock">
				<a href="<?php echo get_category_link( $taxonomy->term_id ); ?>">
					<img data-lazy-type="image" 
					data-src="<?php echo z_taxonomy_image_url($taxonomy->term_id, 'quote-thumb'); ?>" class="img-fluid lazy"
					height="307" width="307" data-original="<?php echo z_taxonomy_image_url($taxonomy->term_id); ?>"
					alt="<?php echo $taxonomy->name; ?>">
				</a>
				
					<div class="gridblock-title">
						<a href="<?php echo get_category_link( $taxonomy->term_id ); ?>"><?php echo $taxonomy->name; ?></a>
					</div>
					
				<div class="gridblock-footer">
				
					<?php
						$catquery = new WP_Query( 'category_name='. $taxonomy->name .'&posts_per_page=-1' );
						$i = 0;
						$gettotal_rows = array();
						$subtotal_likes = array();
						$sum_of_total_likes = array();
						while($catquery->have_posts()) : $catquery->the_post();				
						
							$newtotal_rows = 0;
							$total_rows = 0;
								if( have_rows('wallpapers') ):
									//echo '<h3>Round ' . $i .'</h3>';
									$p =0;
																		 
									while( have_rows('wallpapers') ): the_row();
										// Get Image IDs
										$image = get_sub_field('upload_wallpaper');	
										// Count Total Rows
										$wallpapers_rows = get_field('wallpapers');
										$total_rows =  count($wallpapers_rows);
										// Store image IDs in an array
										$total_like_wallpapers = array();
										$total_like_wallpapers[$p] = CS_Likes::get_post_likes($image['id']);
										$p++;
									endwhile;
								endif;
					$subtotal_likes[$i] = array_sum($total_like_wallpapers);

					//Store Total Rows in array			
						$gettotal_rows[$i] = $total_rows;
					//Increment
					$i++;
				endwhile;
			//Get sum of total wallpapers from array	
			$total_wallpapers_cat = array_sum($gettotal_rows);
			$gettotal_likes = array_sum($subtotal_likes);
			?>	
						<span class="gridblock-contributions pull-left"><?php echo $total_wallpapers_cat ?> WALLPAPERS</span>
						<span class="gridblock-votes pull-right"><?php echo $gettotal_likes ?> POINTS</span>
					</div>
			</div>
		</div>
<?php				
			}
		?>