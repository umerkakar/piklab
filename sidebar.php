<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package piklab
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div class="col-md-4 widget-area" id="secondary" role="complementary">

	<?php dynamic_sidebar( 'sidebar-1' ); ?>

</div><!-- #secondary -->
