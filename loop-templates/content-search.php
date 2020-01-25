<?php
/**
 * Search results partial template.
 *
 * @package piklab
 */

?>


		<?php // --- Count total number of wallpapers in post ------ ?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<div class="entry-content">

		<?php
		if( have_rows('wallpapers') ): 
			while( have_rows('wallpapers') ): the_row();
					// vars
				$wallpapers_rows = get_field('wallpapers');
				$total_rows =  count($wallpapers_rows);
				endwhile;
				endif;
			if (has_post_thumbnail()) {
				//if a thumbnail has been set
				$imgID = get_post_thumbnail_id($post->ID);
				$image_attach_page = get_permalink($imgID);
				$image_thumb_url = get_the_post_thumbnail_url($post->ID); ?>
		
<div class="wallpaper scrollable" id="">
	<div class="frame">
		<a href="<?php the_permalink() ?>">
			<?php echo get_the_post_thumbnail( $post->ID, 'medium' ); ?>
		</a> 
		<div class="hud controls" id="">

			<div class="hud_download" id="" data-toggle="tooltip" data-placement="top" title="Download Image">
				<div class="dl-wrapper">
				<a rel="nofollow" href="<?php the_post_thumbnail_url(); ?>" download>
				 <i class="fa fa-cloud-download"></i> Download</a></div>
			</div>

			<div class="hud_item" style="cursor: default;" data-toggle="tooltip" data-placement="top" title="View more wallpapers with this Quote.">
				<a href="<?php the_permalink() ?>">
				<i class="fa fa-image" style="cursor: pointer;"></i>
				<?php if ($total_rows){echo $total_rows;}else{echo '0';}  ?></a>
			</div>

			<div class="hud_item" id="" data-toggle="tooltip" data-placement="top" title="View Quote text to copy.">
				<a data-toggle="modal" data-target="#quote<?php the_ID(); ?>">
					<i class="fa fa-quote-left"></i>
				</a>
			</div>

			<div class="hud_item" style="cursor: help;" data-toggle="tooltip" data-placement="top" title="<?php echo get_field('featured_image_credit'); ?> Credits">
				<i class="fa fa-camera"></i> 
			</div>
				
			<div class="hud-right">
			
				<div class="hud_item" data-toggle="tooltip" data-placement="top" title="Share Now">
					<a href="#" id="socialShare" class="btn-group share-group" data-toggle="dropdown">
						<i class="fa fa-share-square-o"></i> Share
					</a>
					
					<ul class="dropdown-menu">
						<li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $image_attach_page; ?>" rel="nofollow">
							<img src="<?php echo get_template_directory_uri(); ?>/img/facebook.png" alt="" />
						</a></li>
						<li><a target="_blank" href="https://twitter.com/home?status=<?php echo $image_attach_page; ?>" rel="nofollow">
							<img src="<?php echo get_template_directory_uri(); ?>/img/twitter.png" alt="" />
						</a></li>
						<li><a target="_blank" href="https://plus.google.com/share?url=<?php echo $image_attach_page; ?>" rel="nofollow">
							<img src="<?php echo get_template_directory_uri(); ?>/img/googleplus.png" alt="" />
						</a></li>
						<li><a href="whatsapp://send?text=<?php echo $image_attach_page; ?>" data-action="share/whatsapp/share" rel="nofollow">
							<img src="<?php echo get_template_directory_uri(); ?>/img/whatsapp.png" alt="" />
						</a></li>
						<li><a href="viber://forward?text=<?php echo $image_attach_page; ?>" data-action="share/viber/share" rel="nofollow">
							<img src="<?php echo get_template_directory_uri(); ?>/img/viber.png" alt="" />
						</a></li>
						<li><a href="http://www.addtoany.com/add_to/line?linkurl=<?php echo $image_attach_page; ?>" data-action="share/line/share" rel="nofollow">
							<img src="<?php echo get_template_directory_uri(); ?>/img/line.png" alt="" />
						</a></li>
						<li><a target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo $image_attach_page; ?>&media=<?php echo $image_thumb_url; ?>&description=<?php print get_the_title();?>" rel="nofollow">
							<img src="<?php echo get_template_directory_uri(); ?>/img/pinterest.png" alt="" />
						</a></li>
						<li><a target="_blank" href="http://www.reddit.com/submit?url=<?php echo $image_attach_page; ?>" rel="nofollow">
							<img src="<?php echo get_template_directory_uri(); ?>/img/reddit.png" alt="" />
						</a></li>
						<li><a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $image_attach_page; ?>&title=<?php print get_the_title();?>&summary=<?php print get_the_title();?>&source=<?php print home_url();?>" rel="nofollow">
							<img src="<?php echo get_template_directory_uri(); ?>/img/linkedin.png" alt="" />
						</a></li>
						<li><a href="mailto:?Subject=<?php print get_the_title();?>&Body=<?php printf( __('I saw this and thought of you! %s','mars'), $image_attach_page );?>" rel="nofollow">
							<img src="<?php echo get_template_directory_uri(); ?>/img/email.png" alt="" />
						</a></li>
					</ul>	
				</div>
					<div class="hud_item">
							<?php echo CS_Likes::show_buttons_like($imgID); ?>
					</div>
			</div>
		</div>
	</div>
</div>

	
		<?php 
			} else {
			 the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></h2>' );
			}
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php // piklab_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->

<!-- The modal -->
<div class="modal fade" id="quote<?php the_ID(); ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>
				<div class="modal-body">
					<div class="quote-content">
						<div class="quote_text">
							<?php the_title( '<h1><span class="quote_sign">”</span>', '<span class="quote_sign">”</span></h1>' ); ?>
						</div>
						<div class="quote_author">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>