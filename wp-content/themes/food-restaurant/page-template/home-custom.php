<?php
/**
 * Template Name: Home Custom Page
 */
?>
<?php if( get_theme_mod('food_restaurant_slide_number') != '' ){ ?>
<div class="headertemplate">
 <?php get_header(); ?>
</div>
<?php }else{?>  
  <?php get_header(); ?>
<?php }?>

<?php /** slider section **/ ?>
  <div class="slider-main">
    <?php
      // Get pages set in the customizer (if any)
      $pages = array();
      for ( $count = 1; $count <= 5; $count++ ) {
        $mod = absint( get_theme_mod( 'food_restaurant_slidersettings-page-' . $count ) );
        if ( 'page-none-selected' != $mod ) {
          $pages[] = $mod;
        }
      }
      
      if( !empty($pages) ) :
        $args = array(
          'posts_per_page' => 5,
          'post_type' => 'page',
          'post__in' => $pages,
          'orderby' => 'post__in'
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
          $count = 1;
          ?>
          <div id="slider" class="nivoSlider">
            <?php
              $food_restaurant_n = 0;
            while ( $query->have_posts() ) : $query->the_post();
                
                $food_restaurant_n++;
                $food_restaurant_slideno[] = $food_restaurant_n;
                $food_restaurant_slidetitle[] = get_the_title();
                $food_restaurant_slidelink[] = esc_url( get_permalink() );
                ?>
                  <img src="<?php the_post_thumbnail_url('full'); ?>" title="#slidecaption<?php echo esc_attr( $food_restaurant_n ); ?>" />
                <?php
              $count++;
            endwhile;
            ?>
          </div>

          <?php
          $food_restaurant_k = 0;
            foreach( $food_restaurant_slideno as $food_restaurant_sln ){ ?>
              <div id="slidecaption<?php echo esc_attr( $food_restaurant_sln ); ?>" class="nivo-html-caption">
                <div class="slide-cap  ">
                  <div class="container">
                    <h2><?php echo esc_html( $food_restaurant_slidetitle[$food_restaurant_k] ); ?></h2>
                    <a class="read-more" href="<?php echo esc_url( $food_restaurant_slidelink[$food_restaurant_k] ); ?>"><?php esc_html_e( 'Read More','food-restaurant' ); ?></a>
                  </div>
                </div>
              </div>
              <?php $food_restaurant_k++;
          }
        else : ?>
            <div class="header-no-slider"></div>
          <?php
        endif;
      else : ?>
          <div class="header-no-slider"></div>
      <?php
      endif; 
    ?>
  </div>

<?php do_action( 'food_restaurant_after_slider' ); ?>

<?php /** second section **/ ?>
<section id="products">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-4 service-box-img">
        <div class="blog-head">
          <?php if( get_theme_mod('food_restaurant_product_sec_title',true) != ''){ ?>
            <h3><?php echo esc_html(get_theme_mod('food_restaurant_product_sec_title',__('PRODUCTS','food-restaurant'))); ?></h3>
          <?php }?>
          <?php if( get_theme_mod('food_restaurant_product_sec_subtitle',true) != ''){ ?>
            <h4><?php echo esc_html(get_theme_mod('food_restaurant_product_sec_subtitle',__('FOR FOOD LOVERS','food-restaurant'))); ?></h4>
          <?php }?>
          <?php if( get_theme_mod('food_restaurant_product_sec_short_line',true) != ''){ ?>
            <img src="<?php echo esc_url(get_theme_mod('food_restaurant_product_sec_border',get_template_directory_uri().'/images/headborder.png')); ?>" alt="">
            <p><?php echo esc_html(get_theme_mod('food_restaurant_product_sec_short_line',__('WHERE TASTE MEETS THE FOOD','food-restaurant'))); ?></p>
           <?php }?>
        </div>
        <?php if( get_theme_mod('food_restaurant_product_sec_box_image',true) != ''){ ?>
          <img src="<?php echo esc_url(get_theme_mod('food_restaurant_product_sec_box_image',get_template_directory_uri().'/images/product.jpg')); ?>" alt="">
        <?php }?>
      </div>
      <div class="col-md-8 col-sm-8">
        <?php if(class_exists( 'WooCommerce' )){?> 
            <?php $pages = array();
            for ( $count = 0; $count <= 0; $count++ ) {
              $mod = intval( get_theme_mod( 'food_restaurant_product_settings' . $count ));
              if ( 'page-none-selected' != $mod ) {
                $pages[] = $mod;
              }
            }
            if( !empty($pages) ) :
              $args = array(
                'post_type' => 'page',
                'post__in' => $pages,
                'orderby' => 'post__in'
              );
              $query = new WP_Query( $args );
              if ( $query->have_posts() ) :
                $count = 0;
                while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="box-image">
                        <p><?php the_content(); ?></p>
                        <div class="clearfix"></div>
                    </div>
                <?php $count++; endwhile; ?>
              <?php else : 
              wp_reset_postdata();?>
                  <div class="no-postfound"></div>
              <?php endif;
            endif;?>
            <div class="clearfix"></div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>

<div class="container">
  <?php while ( have_posts() ) : the_post(); ?>
    <?php the_content(); ?>
  <?php endwhile; // end of the loop. ?>
</div>

<?php do_action( 'food_restaurant_after_secondsec' ); ?>

<?php get_footer(); ?>