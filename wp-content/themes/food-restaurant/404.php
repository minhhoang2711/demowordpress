<?php
/**
 * Display 404 page
 *
 * @package Food Restaurant
 */

get_header(); ?>

<div id="content-lt">
    <div class="container">
        <div class="page-content">      
            <div class="col-md-12">
        		<h1><?php the_title();?></h1>   
                <h3><?php printf( '<strong>%s</strong> %s', esc_html__( '404', 'food-restaurant' ), esc_html__( 'Not Found', 'food-restaurant' ) ) ?></h3>
                <p class="text-404"><?php esc_html_e( 'Looks like you have taken a wrong turn', 'food-restaurant' ); ?></p>
                <p class="text-404"><?php esc_html_e( 'Dont worry it happens to the best of us.', 'food-restaurant' ); ?></p>
                <div class="read-moresec">
                    <div><a href="<?php echo esc_url( home_url() ); ?>" class="button"><?php esc_html_e( 'Return to Home Page', 'food-restaurant' ); ?></a></div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<?php get_footer(); ?>