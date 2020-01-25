<?php
/**
 * Declaring Custom widgets
 *
 * @package piklab
 */

// Register New widget boxes for Taxonomies
class Quotescat_Widget extends WP_Widget{
function __construct() {
	parent::__construct(
		'quotescat_Widget', // Base ID
		'quotescat', // Name
		array('description' => __( 'Displays Quotes categories list'))
	   );
}
function update($new_instance, $old_instance) {
	$instance = $old_instance;
	$instance['title'] = strip_tags($new_instance['title']);
	$instance['quotescatlist'] = strip_tags($new_instance['quotescatlist']);
	return $instance;
}

// Load content in widget
function form($instance) {
	if( $instance) {
		$title = esc_attr($instance['title']);
		$quotescatlist = esc_attr($instance['quotescatlist']);
	} else {
		$title = '';
		$quotescatlist = '';
	}
	?>
		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'quotescat_Widget'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
	<?php
	}

// widget() Method

function widget($args, $instance) {
	extract( $args );
	$title = apply_filters('widget_title', $instance['title']);
	$quotescatlist = $instance['quotescatlist'];
	echo $before_widget;
	if ( $title ) {
		echo $before_title . $title . $after_title;
	}
	$this->getTitlesListings($quotescatlist);
	echo $after_widget;
}

// Pull our Job Titles
function getTitlesListings($quotescatlist) { //html

// Get Quotescat list
 
$taxonomy     = 'quotescat';
$orderby      = 'name'; 
$show_count   = true;
$pad_counts   = true;
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
?>
			
		<ul>
		<?php
			$taxonomies = get_categories( $args );
			
			foreach ( $taxonomies as $taxonomy ) {

				echo '<li><a href="' . get_category_link( $taxonomy->term_id ) . '">' . $taxonomy->name . ' ('. $taxonomy->count . ')' . '</a></li>';
			}
		?>
		</ul>
<?php
}

} //end class Quotescat_Widget
register_widget('Quotescat_Widget');