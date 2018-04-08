<?php
/**
 * Displaying all pages.
 *
 * @package Food Restaurant
 */

get_header(); ?>

<?php do_action( 'food_restaurant_page_header' ); ?>

<div id="content-lt" class="container">
    <div class="middle-align">       
        <div class="col-md-12">
            <?php 
            while ( have_posts() ) : the_post(); ?>
                <img src="<?php the_post_thumbnail_url('full'); ?>" width="100%">
                <h1><?php the_title(); ?></h1>
                <?php the_content();?>
            <?php endwhile; // end of the loop. ?>
            <?php
                //If comments are open or we have at least one comment, load up the comment template
                if ( comments_open() || '0' != get_comments_number() )
                    comments_template();
            ?>
        </div>        
        <div class="clear"></div>    
    </div>
</div>

<?php do_action( 'food_restaurant_page_footer' ); ?>

<?php get_footer(); ?>