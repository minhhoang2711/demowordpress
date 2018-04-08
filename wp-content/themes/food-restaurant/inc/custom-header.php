<?php
/**
 * @package Food Restaurant
 * Setup the WordPress core custom header feature.
 *
 * @uses food_restaurant_header_style()
*/
function food_restaurant_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'food_restaurant_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'wp-head-callback'       => 'food_restaurant_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'food_restaurant_custom_header_setup' );

if ( ! function_exists( 'food_restaurant_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see food_restaurant_custom_header_setup().
 */
function food_restaurant_header_style() {
	$header_text_color = get_header_textcolor();
	?>
	<style type="text/css">
	<?php
		//Check if user has defined any header image.
		if ( get_header_image() ) :
	?>
		.header{
			background: url(<?php echo esc_url(get_header_image()); ?>) no-repeat;
			background-position: center top;
		}
	<?php endif; ?>	
	</style>
	<?php
}
endif; // food_restaurant_header_style