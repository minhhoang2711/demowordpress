<?php
/**
 * Display Header.
 *
 * @package Food Restaurant
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="header">
    <div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','food-restaurant'); ?></a></div>  
    <div class="container">
        <div class="logo col-md-3 col-sm-3 wow bounceInDown">
            <?php if( has_custom_logo() ){ food_restaurant_the_custom_logo();
             }else{ ?>
            <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_attr(bloginfo( 'name' )); ?></a></h1>
            <?php $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?> 
                <p class="site-description"><?php echo esc_html($description); ?></p> 
            <?php endif; }?>
        </div>
        <div class="menubox col-md-9 col-sm-9">
          <div class="nav">
              <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
          </div>
        </div>    
        <div class="clear"></div>
    </div>
</div>