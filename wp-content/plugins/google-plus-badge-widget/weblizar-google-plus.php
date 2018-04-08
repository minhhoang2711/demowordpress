<?php
/*
Plugin Name: Google Plus Badge Widget
Plugin URI: http://wordpress.org/plugins/google-plus-badge-widget/
Description: Google Plus Badge plugin allows you to quickly and easily add the new Google Plus badge widget to your blog  WordPress site.
Version: 2.1.7
Author: weblizar
Author URI: http://weblizar.com
*/

// Translate all text & labels of plugin
define('WL_Google_Plugins_URI', plugins_url('',__FILE__));
function ReadyTranslation() {
	load_plugin_textdomain('weblizar', FALSE, dirname( plugin_basename(__FILE__)).'/lang/' );	
}
add_action('plugins_loaded', 'ReadyTranslation');

function google_plus_activate() {
    $wl_google_options = array();
	$wl_google_options['page_type']="profile";
	$wl_google_options['width']="300";
	$wl_google_options['color_scheme']="light";
	$wl_google_options['gp_layout']="portrait";
	$wl_google_options['cover_photo']="true";
	$wl_google_options['tagline']="true";
	$wl_google_options['page_url']="https://plus.google.com/u/0/100920322672659513870"; 
	update_option('wl_google_options', $wl_google_options); 
}
register_activation_hook( __FILE__, 'google_plus_activate' );

// Admin dashboard Menu Pages For Google Plus Badge Widget Plugin
add_action('admin_menu','google_plus_widget_menu');
function google_plus_widget_menu() {
    //Main menu of Google Plus Badge Widget Plugin
    $menu = add_menu_page('Google Plus Widget', __('Google Plus', 'weblizar'), 'administrator', 'google-plus-widget', '','dashicons-googleplus');
    // Google widget settings page
    $SubMenu1 = add_submenu_page( 'google-plus-widget', 'Google Plus Settings', __('Google Plus Settings', 'weblizar'), 'administrator', 'google-plus-widget', 'display_google_plus_widget_page' );
   
	add_action('admin_print_styles-'.$menu, 'google_admin_enqueue_script');
    add_action('admin_print_styles-'.$SubMenu1, 'google_admin_enqueue_script');	
}

/**
* Weblizar Admin Menu CSS
*/
function google_admin_enqueue_script() {	
	wp_enqueue_script('bootjs-google', '//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js');	
	wp_enqueue_script('weblizar-tab-js-google', WL_Google_Plugins_URI .'/js/option-js.js',array('media-upload', 'jquery-ui-sortable'));
	wp_enqueue_style('weblizar-option-style-google', WL_Google_Plugins_URI .'/css/weblizar-option-style.css');
	wp_enqueue_style('op-bootstrap-google', WL_Google_Plugins_URI. '/css/bootstrap.css');
	wp_enqueue_style('weblizar-bootstrap-responsive-google', WL_Google_Plugins_URI .'/css/bootstrap-responsive.css');
	wp_enqueue_style('font-awesome-op-google', '//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css');
	wp_enqueue_style('pricing-table-google', WL_Google_Plugins_URI .'/css/pricing-table.css');
}

function display_google_plus_widget_page() { ?>	
	<div class="wrap" id="weblizar_wrap" >		
		<div id="content_wrap">			
			<div class="weblizar-header" >
				<h2><span><?php _e('Google Plus Badge Widget','weblizar'); ?></span></h2>			
				<div class="weblizar-submenu-links" id="weblizar-submenu-links">
					<ul>
						<li class=""> <div class="dashicons dashicons-format-chat" > </div> <a href="http://wordpress.org/plugins/google-plus-badge-widget/" target="_blank" title="Support Forum"><?php _e('Support Forum','weblizar'); ?></a></li>
						<li class=""> <div class="dashicons dashicons-welcome-write-blog"></div> <a href="<?php echo WL_Google_Plugins_URI . '/readme.txt'?>" target="_blank" title="Theme Changelog"><?php _e('View Changelog','weblizar'); ?></a></li>      
					</ul>
				</div>			
			</div>		
			<div id="content">
				<div id="options_tabs" class="ui-tabs ">
					<ul class="options_tabs ui-tabs-nav" role="tablist" id="nav">					
						<li class="active"><a href="#" id="general"><div class="dashicons dashicons-admin-home"></div><?php _e('Google Plus','weblizar');?></a></li>					
						<li ><a href="#" id="ourproduct" style="background-color: #141414;color: #F8F3F3;" ><div class="dashicons dashicons-plus"></div><?php _e('Our Products','weblizar');?></a></li>
					</ul>					
					<?php require_once('option-settings.php'); ?>	
				</div>		
			</div>
			<div class="weblizar-header" style="margin-top:0px; border-radius: 0px 0px 6px 6px;">			
				<div class="weblizar-submenu-links" style="margin-top:15px;">				
				</div><!-- weblizar-submenu-links -->
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<?php
}
// Google Plus widget
require_once('google-plus-badge-widget.php');
?>