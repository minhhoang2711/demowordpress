<?php
add_action('widgets_init', 'wl_googleplus_widgets');
function wl_googleplus_widgets()
{
	register_widget('googleplus_Widget');
}
class googleplus_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		parent::__construct(
			'googleplus_widget', // Base ID
			__('Weblizar Google Plus badge', 'weblizar'), // Name
			array( 'description' => __( 'Adds a beautiful Google Plus badge widget', 'weblizar' ), ) // Args
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
	
		// Outputs the content of the widget
		extract($args); // Make before_widget, etc available.
		
		$title = apply_filters('title', $instance['title']);
		
		echo $before_widget;
		
		if (!empty($title)) {	echo $before_title . $title . $after_title;	}	
		$wl_google_options = get_option('wl_google_options');
			if($wl_google_options['page_url']){ 
				$page_type = $wl_google_options['page_type'] ;
				$width =  $wl_google_options['width'];
				$color_scheme = $wl_google_options['color_scheme'] ;
				$gp_layout = $wl_google_options['gp_layout'];
				$cover_photo =  $wl_google_options['cover_photo'];
				$tagline =  $wl_google_options['tagline'];
				$page_url =  $wl_google_options['page_url'];
			?>	
			<div <?php if($page_type == 'profile') { ?>class="g-person"<?php } elseif($page_type == 'page') { ?>class="g-page"<?php } elseif($page_type == 'community') { ?>class="g-community"<?php } ?> data-width="<?php echo esc_attr( $width ); ?>" data-href="<?php echo esc_attr( $page_url ); ?>" data-layout="<?php echo esc_attr( $gp_layout ); ?>" data-theme="<?php echo esc_attr( $color_scheme ); ?>" data-rel="publisher" data-showtagline="<?php echo esc_attr( $tagline ); ?>" data-showcoverphoto="<?php echo esc_attr( $cover_photo ); ?>"></div>
			<!-- Place this tag after the last badgev2 tag. -->
			<script type="text/javascript">
			  (function() {
				var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
				po.src = 'https://apis.google.com/js/platform.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
			  })();
			</script>			
		<?php } else { echo esc_attr("Please Add Google Plus Page URL"); } 	
				
		echo $after_widget; 
		// outputs the content of the widget
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin	
	if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'Google Plus', 'weblizar' );
		}
		?>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	function update($new_instance, $old_instance) {
	
		//update and save the widget
		return $new_instance;
		
	}
}