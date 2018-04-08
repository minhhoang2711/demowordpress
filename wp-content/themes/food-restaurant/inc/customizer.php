<?php
/**
 * Food Restaurant Theme Customizer
 *
 * @package Food Restaurant
 */

/**
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function food_restaurant_customize_register( $wp_customize ) {	

	//add home page setting pannel
	$wp_customize->add_panel( 'food_restaurant_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'LT Settings', 'food-restaurant' ),
	    'description' => __( 'Description of what this panel does.', 'food-restaurant' ),
	) );

	$wp_customize->add_section( 'food_restaurant_left_right' , array(
    	'title'      => __( 'General Settings', 'food-restaurant' ),
		'priority'   => 30,
		'panel' => 'food_restaurant_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('food_restaurant_theme_options',array(
	        'default' => __( 'Right Sidebar', 'food-restaurant' ),
	        'sanitize_callback' => 'food_restaurant_sanitize_choices'	        
	    )
    );

	$wp_customize->add_control('food_restaurant_theme_options',
	    array(
	        'type' => 'radio',
	        'label' => __( 'Do you want this section', 'food-restaurant' ),
	        'section' => 'food_restaurant_left_right',
	        'choices' => array(
	            'Left Sidebar' => __('Left Sidebar','food-restaurant'),
	            'Right Sidebar' => __('Right Sidebar','food-restaurant'),
	            'One Column' => __('One Column','food-restaurant'),
	            'Three Columns' => __('Three Columns','food-restaurant'),
	            'Four Columns' => __('Four Columns','food-restaurant'),
	            'Grid Layout' => __('Grid Layout','food-restaurant')
	        ),
	    )
    );

	//home page slider
	$wp_customize->add_section( 'food_restaurant_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'food-restaurant' ),
		'priority'   => 30,
		'panel' => 'food_restaurant_panel_id'
	) );

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'food_restaurant_slidersettings-page-' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'absint'
		) );

		$wp_customize->add_control( 'food_restaurant_slidersettings-page-' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'food-restaurant' ),
			'section'  => 'food_restaurant_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}
	
	//Our Product
	$wp_customize->add_section('food_restaurant_product',array(
		'title'	=> __('Food Products','food-restaurant'),
		'description'=> __('This section will appear below the slider.','food-restaurant'),
		'panel' => 'food_restaurant_panel_id',
	));

	$wp_customize->add_setting('food_restaurant_product_sec_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('food_restaurant_product_sec_title',array(
		'label'	=> __('Title','food-restaurant'),
		'section'	=> 'food_restaurant_product',
		'setting'	=> 'food_restaurant_product_sec_title',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('food_restaurant_product_sec_subtitle',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('food_restaurant_product_sec_subtitle',array(
		'label'	=> __('Sub Title','food-restaurant'),
		'section'	=> 'food_restaurant_product',
		'setting'	=> 'food_restaurant_product_sec_subtitle',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('food_restaurant_product_sec_short_line',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('food_restaurant_product_sec_short_line',array(
		'label'	=> __('Short Line','food-restaurant'),
		'section'	=> 'food_restaurant_product',
		'setting'	=> 'food_restaurant_product_sec_short_line',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('food_restaurant_product_sec_box_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'food_restaurant_product_sec_box_image',array(
        'label' => __('Product Leftside Image','food-restaurant'),
        'section' => 'food_restaurant_product',
        'settings' => 'food_restaurant_product_sec_box_image'
	)));
	
	for ( $count = 0; $count <= 0; $count++ ) {

		$wp_customize->add_setting( 'food_restaurant_product_settings' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'absint'
		));
		$wp_customize->add_control( 'food_restaurant_product_settings' . $count, array(
			'label'    => __( 'Select Product Page', 'food-restaurant' ),
			'section'  => 'food_restaurant_product',
			'type'     => 'dropdown-pages'
		));
	}

	//footer
	$wp_customize->add_section('food_restaurant_footer_section',array(
		'title'	=> __('Footer Text','food-restaurant'),
		'description'	=> __('Add some text for footer like copyright etc.','food-restaurant'),
		'panel' => 'food_restaurant_panel_id'
	));
	
	$wp_customize->add_setting('food_restaurant_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('food_restaurant_footer_copy',array(
		'label'	=> __('Copyright Text','food-restaurant'),
		'section'	=> 'food_restaurant_footer_section',
		'type'		=> 'text'
	));

}
add_action( 'customize_register', 'food_restaurant_customize_register' );	

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function food_restaurant_customize_preview_js() {
	wp_enqueue_script( 'food_restaurant_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'food_restaurant_customize_preview_js' );


/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class food_restaurant_customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'food_restaurant_customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new food_restaurant_customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'Food Restaurant Pro', 'food-restaurant' ),
					'pro_text' => esc_html__( 'Go Pro',         'food-restaurant' ),
					'pro_url'  => 'https://www.logicalthemes.com/premium/food-restaurant-wordpress-theme/'
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'food-restaurant-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'food-restaurant-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
food_restaurant_customize::get_instance();