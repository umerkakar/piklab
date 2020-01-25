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
		$count = 0;
		foreach ( $categories as $category ) {
			$count++;
			if ($count <= 12){ ?>
		<div class="col-lg-3 col-md-4 col-sm-6 col-12">
			<div class="gridblock">
				<a href="<?php echo get_category_link( $category->term_id ); ?>">
					<img data-lazy-type="image" 
					data-src="<?php echo z_taxonomy_image_url($category->term_id, 'quote-thumb'); ?>" class="img-fluid lazy"
					height="307" width="307" data-original="<?php echo z_taxonomy_image_url($category->term_id); ?>"
					alt="<?php echo $category->name; ?>">
				</a>
				
					<div class="gridblock-title">
						<a href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->name; ?></a>
					</div>
					
				<div class="gridblock-footer">
				
					<?php
						$catquery = new WP_Query( 'category_name='. $category->name .'&posts_per_page=-1' );
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
	
	<?php }
		else {
			break;
			}
		}
		?>