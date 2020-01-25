<?php
/**
 * Single post partial template.
 *
 * @package piklab
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			
		<?php //------- Wallpapers --------------- ?>
		
<?php if( have_rows('wallpapers') ): 
		while( have_rows('wallpapers') ): the_row();
			// vars
			$image = get_sub_field('upload_wallpaper', 'medium');
			$image_large = wp_get_attachment_image_src(get_field('upload_wallpaper'), 'large');
			$image_credit = get_sub_field('image_credit');
			$image_attach = wp_get_attachment_url( $image['id'] );
			$wallpapers_rows = get_field('wallpapers');
			$total_rows =  count($wallpapers_rows);
		?>
		
	<div class="wallpaper scrollable" id="">
		<div class="frame">
		
					<img data-lazy-type="image" 
					data-src="<?php echo $image['sizes']['medium']; ?>" class="img-fluid lazy" 
					width="600" height="600" data-original="<?php echo $image['url']; ?>"
					alt="<?php echo $image['alt'] ?>"/>
					
			<div class="hud controls" id="">

				<div class="hud_download" id=""  data-toggle="tooltip" data-placement="top" title="Download Image">
					<div class="dl-wrapper">
					<a rel="nofollow" href="<?php echo $image['url']; ?>" download>
					 <i class="fa fa-cloud-download"></i> Download</a></div>
				</div>

				<div class="hud_item" style="cursor: default;" data-toggle="tooltip" data-placement="top" title="View more wallpapers with this Quote.">
					<a href="<?php the_permalink() ?>">
					<i class="fa fa-image" style="cursor: pointer;"></i>
					<?php echo $total_rows; ?></a>
				</div>

				<div class="hud_item" id="" data-toggle="tooltip" data-placement="top" title="View Quote text to copy.">
					<a data-toggle="modal" data-target="#quote<?php the_ID(); ?>">
						<i class="fa fa-quote-left"></i>
					</a>
				</div>

				<div class="hud_item" style="cursor: help;" data-toggle="tooltip" data-placement="top" title="Credits: <?php echo $image_credit; ?>">
					<i class="fa fa-camera"></i> 
				</div>
				
				<div class="hud-right">
				
					<div class="hud_item" data-toggle="tooltip" data-placement="top" title="Share Now">
						<a href="#" id="socialShare" class="btn-group share-group" data-toggle="dropdown">
							<i class="fa fa-share-square-o"></i> Share
						</a>
			 <?php $image_attach_page = get_permalink($image['id']); ?>	
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
							<li><a target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo $image_attach_page; ?>&media=<?php echo $image['url']; ?>&description=<?php print get_the_title();?>" rel="nofollow">
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
						<?php echo CS_Likes::show_buttons_like($image['id']); ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php endwhile; ?>

<?php endif; ?>
				
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