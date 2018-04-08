<?php

require_once dirname( __FILE__ ).'/options.php';

$vendor = dirname( dirname( __FILE__ ) ).'/vendor';

if ( ! class_exists( 'iworks_options' ) ) {
	require_once $vendor.'/iworks/options/options.php';
}
if ( ! class_exists( 'iworks_rate' ) ) {
	require_once $vendor.'/iworks/rate/rate.php';
}
require_once dirname( __FILE__ ).'/show_thubnail_on_admin_post_list.php';

$iworks_upprev_options = new iworks_options();
$iworks_upprev_options->set_option_function_name( 'iworks_upprev_options' );
$iworks_upprev_options->set_option_prefix( IWORKS_UPPREV_PREFIX );

function iworks_upprev_options_init() {

	global $iworks_upprev_options;
	$iworks_upprev_options->options_init();
	add_filter( 'plugin_row_meta', 'iworks_upprev_plugin_links', 10, 2 );
}

function iworks_upprev_activate() {

	require_once dirname( __FILE__ ).'/options.php';
	$iworks_upprev_options = new iworks_options();
	$iworks_upprev_options->set_option_function_name( 'iworks_upprev_options' );
	$iworks_upprev_options->set_option_prefix( IWORKS_UPPREV_PREFIX );
	$iworks_upprev_options->activate();
}

function iworks_upprev_deactivate() {

	global $iworks_upprev_options;
	$iworks_upprev_options->deactivate();
}

function iworks_upprev_check_mobile_device() {
    global $iworks_upprev_options;
    if ( $iworks_upprev_options->get_option( 'mobile_hide' ) ||
        $iworks_upprev_options->get_option( 'mobile_tablets' )
    ) {
        $vendor = dirname( dirname( __FILE__ ) ).'/vendor';
        if ( ! class_exists( 'Mobile_Detect' ) ) {
            require_once $vendor.'/serbanghita/Mobile-Detect/Mobile_Detect.php';
        }
        $detect = new Mobile_Detect;
        if ( $iworks_upprev_options->get_option( 'mobile_hide' ) ) {
            $test = $detect->isMobile();
            return $test;
        }
        if ( $iworks_upprev_options->get_option( 'mobile_tablets' ) ) {
            $test = $detect->isTablet();
            return $test;
        }
    }
    return false;
}

add_action( 'iworks_rate_css', 'upprev_iworks_rate_css' );

function upprev_iworks_rate_css() {
	$logo = plugin_dir_url( dirname( __FILE__ ) ).'assets/images/logo.svg';
	echo '<style type="text/css">';
	printf( '.iworks-notice-upprev .iworks-notice-logo{background-color:#fff;background-image:url(%s);}', esc_url( $logo ) );
	echo '</style>';
}

