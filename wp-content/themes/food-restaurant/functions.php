<?php
/**
 * Food Restaurant functions and definitions
 *
 * @package Food Restaurant
 */

if ( ! function_exists( 'food_restaurant_setup' ) ) :

/* Theme Setup */

function food_restaurant_setup() {

	$GLOBALS['content_width'] = apply_filters( 'food_restaurant_content_width', 640 );

	load_theme_textdomain( 'food-restaurant', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('food-restaurant-homepage-thumb',240,145,true);
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'food-restaurant' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );

	add_editor_style( array( 'css/editor-style.css', food_restaurant_font_url() ) );

	// Theme Activation Notice
	global $pagenow;
	
	if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
		add_action( 'admin_notices', 'food_restaurant_activation_notice' );
	}

}
endif; // food_restaurant_setup
add_action( 'after_setup_theme', 'food_restaurant_setup' );

// Notice after Theme Activation
function food_restaurant_activation_notice() {
	echo '<div class="foodwelcome notice notice-success is-dismissible">';
		echo '<h3>'. esc_html__( 'Warm Greetings to you!!', 'food-restaurant' ) .'</h3>';
		echo '<p>'. esc_html__( ' We are much obliged to you for choosing are food restraunt theme. We promise to present you with all the outstanding features and services of our theme. Please proceed towards the landing page to get started .', 'food-restaurant' ) .'</p>';
		echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=food_restaurant_guide' ) ) .'" class="button button-primary">'. esc_html__( 'Welcome...', 'food-restaurant' ) .'</a></p>';
	echo '</div>';
}

/* Theme Widgets Setup */
function food_restaurant_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'food-restaurant' ),
		'description'   => __( 'Appears on blog page sidebar', 'food-restaurant' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Posts and Pages Sidebar', 'food-restaurant' ),
		'description'   => __( 'Appears on posts and pages', 'food-restaurant' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Third Column Sidebar', 'food-restaurant' ),
		'description'   => __( 'Appears on posts and pages', 'food-restaurant' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'food-restaurant' ),
		'description'   => __( 'Appears in footer', 'food-restaurant' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'food-restaurant' ),
		'description'   => __( 'Appears in footer', 'food-restaurant' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'food-restaurant' ),
		'description'   => __( 'Appears in footer', 'food-restaurant' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'food-restaurant' ),
		'description'   => __( 'Appears in footer', 'food-restaurant' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'food_restaurant_widgets_init' );

/* Theme Font URL */
function food_restaurant_font_url(){
	$font_url = '';
	$font_family = array();
	$font_family[] = 'PT Sans:300,400,600,700,800,900';
	$font_family[] = 'Roboto:400,700';
	$font_family[] = 'Open Sans:300,400,600,700,800,900';
	$font_family[] = 'Raleway:700';
	$font_family[] = 'Playball:300,400,600,700,800,900';
	$font_family[] = 'Montserrat:300,400,600,700,800,900';

	$query_args = array(
		'family'	=> urlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}

/* Theme enqueue scripts */
function food_restaurant_scripts() {
	wp_enqueue_style( 'food-restaurant-font', food_restaurant_font_url(), array() );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style( 'food-restaurant-style', get_stylesheet_uri() );
	wp_style_add_data( 'food-restaurant-style', 'rtl', 'replace' );
	wp_enqueue_style( 'food-restaurant-customcss', get_template_directory_uri() . '/css/custom.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/fontawesome-all.css' );
	if ( is_home() || is_front_page() ) { 
		wp_enqueue_style( 'nivo-style', get_template_directory_uri().'/css/nivo-slider.css' );
		wp_enqueue_script( 'nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	}
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery') ,'',true);
	wp_enqueue_script( 'food-restaurant-customscripts', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'food_restaurant_scripts' );

function food_restaurant_ie_stylesheet(){
	wp_enqueue_style('food-restaurant-ie', get_template_directory_uri().'/css/ie.css', array('food-restaurant-ie-style'));
	wp_style_add_data( 'food-restaurant-ie', 'conditional', 'IE' );
}
add_action('wp_enqueue_scripts','food_restaurant_ie_stylesheet');

define('FOOD_RESTAURANT_FREE_THEME_DOC','https://logicalthemes.com/docs/free-food-restaurant/','food-restaurant');
define('FOOD_RESTAURANT_SUPPORT','https://www.logicalthemes.com/support/forum/lt-food-and-restaurant/','food-restaurant');
define('FOOD_RESTAURANT_REVIEW','https://www.logicalthemes.com/support/forum/reviews-testimonials/','food-restaurant');
define('FOOD_RESTAURANT_BUY_NOW','https://www.logicalthemes.com/premium/food-restaurant-wordpress-theme/','food-restaurant');
define('FOOD_RESTAURANT_LIVE_DEMO','https://www.logicalthemes.com/food-restaurant-theme/','food-restaurant');
define('FOOD_RESTAURANT_PRO_DOC','https://www.logicalthemes.com/docs/food-restaurant-pro/','food-restaurant');
define('FOOD_RESTAURANT_DEMO_DATA','https://logicalthemes.com/docs/food-restaurant-demo.xml.zip','food-restaurant');

define('food_restaurant_CREDIT','http://www.logicalthemes.com/','food-restaurant');

if ( ! function_exists( 'food_restaurant_credit' ) ) {
	function food_restaurant_credit(){
		echo "<a href=".esc_url(food_restaurant_CREDIT)." target='_blank'>".esc_html('LogicalThemes','food-restaurant')."</a>";
	}
}

/*radio button sanitization*/
 function food_restaurant_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Load Jetpack compatibility file. */
require get_template_directory() . '/inc/customizer.php';

/* Implement the Custom Header feature. */
require get_template_directory() . '/inc/custom-header.php';

/* Implement the About theme page */
require get_template_directory() . '/inc/getting-started/getting-started.php';