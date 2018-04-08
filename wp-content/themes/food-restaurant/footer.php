<?php
/**
 * Displaying Footer.
 *
 * @package Food Restaurant
 */
?>
<div class="footersec">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-3">
	            <?php dynamic_sidebar('footer-1');?>
	        </div>
	        <div class="col-md-3 col-sm-3">
	            <?php dynamic_sidebar('footer-2');?>
	        </div>
	        <div class="col-md-3 col-sm-3">
	            <?php dynamic_sidebar('footer-3');?>
	        </div> 
	        <div class="col-md-3 col-sm-3">
	            <?php dynamic_sidebar('footer-4');?>
	        </div>        
		</div>
	</div>
</div>
<div class="copyright-wrapper">
	<div class="inner">
        <div class="copyright">
           <span><?php echo esc_html(get_theme_mod('food_restaurant_footer_copy',__('Restarant Theme By','food-restaurant'))); ?> <?php echo esc_html(food_restaurant_credit(),'food-restaurant'); ?></span>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php wp_footer(); ?>

</body>
</html>