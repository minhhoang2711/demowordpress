<?php 
if(isset($_POST['google_plus_submit'])) {
	$wl_google_options['page_url']= sanitize_option('page_url', $_POST['page_url']);
	$wl_google_options['page_type']=sanitize_option('page_type',  $_POST['page_type']);
	$wl_google_options['width']= sanitize_text_field ( $_POST['width']);
	$wl_google_options['color_scheme']= sanitize_option('color_scheme', $_POST['color_scheme']);
	$wl_google_options['gp_layout']= sanitize_text_field($_POST['gp_layout']);	
	if(isset( $_POST['tagline'])) {
		$wl_google_options['tagline'] = "true";	
	} else { 
		$wl_google_options['tagline']= "false";	
	}	
	if(isset($_POST['cover_photo'])) {
		$wl_google_options['cover_photo']= "true"; 
	} else {
		$wl_google_options['cover_photo']= "false";	
	}
	update_option('wl_google_options', $wl_google_options );
}
$wl_google_options = get_option('wl_google_options'); 
 ?>
<div class="block ui-tabs-panel active" id="option-general">		
	<div class="row">
		<div class="col-md-6">
			<div id="heading"><table><tr><td cols=2 ><h2><?php _e('Google Plus widget Settings','weblizar');?></h2></td></tr></table></div>	
			<form class="form-horizontal" role="form" action="#" method="POST" name="google_plus_form" >
				<br>
				<div class="form-group">
					<label  class="col-sm-4"><?php _e('Google+ Page URL','weblizar'); ?></label>
					<div class="col-sm-8">						
						<input type="text"  style="width:90%;" id="page_url" name="page_url" value="<?php if($wl_google_options['page_url']) { echo esc_url( $wl_google_options['page_url']); } ?>" />
						<p class="help-block"><?php _e('Please add here your google plus page url.','weblizar'); ?></p>
					</div>
				</div>
				
				<div class="form-group">
					<label  class="col-sm-4"><?php _e('Page type','weblizar'); ?></label>
					<div class="col-sm-8">
						<?php $page_type= $wl_google_options['page_type']; ?>
						<select id="page_type" name="page_type" style="width:50%;" >
							<option <?php if ('profile' == $page_type) echo 'selected="selected"'; ?>><?php _e('profile','weblizar'); ?></option>
							<!--<option <?php if ('page' == $page_type) echo 'selected="selected"'; ?>><?php _e('page','weblizar'); ?></option>
							<option <?php if ('community' == $page_type) echo 'selected="selected"'; ?>>community</option>-->						
						</select>
						<p class="help-block"><?php _e('Select render of the google plus badge.','weblizar'); ?></p>
					</div>
				</div>				
				<div class="form-group">
					<label  class="col-sm-4"><?php _e('Width','weblizar'); ?></label>
					<div class="col-sm-8">
						<?php $width= $wl_google_options['width']; ?>
						<input type="text" type="text"  style="width:50%;" id="width" name="width" value="<?php echo esc_attr( $width ); ?>" />
						<p class="help-block"><?php _e('Set the your badge width.','weblizar'); ?></p>
					</div>
				</div>
				
				<div class="form-group">
					<label  class="col-sm-4"><?php _e('Color Scheme','weblizar'); ?></label>
					<div class="col-sm-8">
						<?php $color_scheme= $wl_google_options['color_scheme']; ?>
						<select id="color_scheme" name="color_scheme" style="width:50%;" >
							<option <?php if ('light' == $color_scheme) echo 'selected="selected"'; ?>>light</option>
							<option <?php if ('dark' == $color_scheme) echo 'selected="selected"'; ?>>dark</option>
						</select>
						<p class="help-block"><?php _e('Select color theme of the badge.','weblizar'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label  class="col-sm-4"><?php _e('Layout','weblizar'); ?></label> 
					<div class="col-sm-8">
						<?php $gp_layout= $wl_google_options['gp_layout']; ?>
						<select id="gp_layout" name="gp_layout" style="width:50%;">
							<option <?php if ('portrait' == $gp_layout) echo 'selected="selected"'; ?>>portrait</option>
							<option <?php if ('landscape' == $gp_layout) echo 'selected="selected"'; ?>>landscape</option>
						</select>
						<p class="help-block"><?php _e('Sets the orientation of the badge.','weblizar'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label  class="col-sm-4"><?php _e('Portrait Layout Settings','weblizar'); ?></label>
					<div class="col-sm-8">
						<?php $cover_photo= $wl_google_options['cover_photo']; 
							 $tagline= $wl_google_options['tagline'];
						?>					
						<input class="checkbox" type="checkbox" <?php checked($cover_photo, 'true'); ?> id="cover_photo" name="cover_photo" />
						<label ><?php _e('cover_photo','weblizar'); ?></label>			
						<input class="checkbox" type="checkbox" <?php checked($tagline, 'true'); ?> id="tagline" name="tagline" /> 
						<label ><?php _e('Tagline','weblizar'); ?></label>
						<p class="help-block"><?php _e('Choose your layout.','weblizar'); ?></p>
					</div>
				</div>				 		
				
				<div class="form-group">
					<div class="col-sm-offset-2">
					  <button type="submit" class="btn btn-default" name="google_plus_submit" id="google_plus_submit" value="submit">Submit & Preview</button>
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-5">
			<div id="heading"><table><tr><td cols=2 ><h2><?php _e('Google Plus widget Preview','weblizar');?></h2></td></tr></table></div>
			<div class="section">
				<?php $wl_google_options = get_option('wl_google_options');
				if($wl_google_options['page_url']){					
					$page_type = $wl_google_options['page_type'];
					$width = $wl_google_options['width'];
					$color_scheme = $wl_google_options['color_scheme'];
					$gp_layout = $wl_google_options['gp_layout'];
					$cover_photo = $wl_google_options['cover_photo'];
					$tagline = $wl_google_options['tagline'];
					$page_url = $wl_google_options['page_url'];					
					?>
					<div <?php if($page_type == 'profile') { ?>class="g-person"<?php } elseif($page_type == 'page') { ?>class="g-page"<?php } elseif($page_type == 'community') { ?>class="g-community"<?php } ?> data-width="<?php echo esc_attr( $width ); ?>" data-href="<?php echo esc_url( $page_url ); ?>" data-layout="<?php echo esc_attr ( $gp_layout); ?>" data-theme="<?php echo esc_attr($color_scheme); ?>" data-rel="publisher" data-showtagline="<?php echo esc_attr($tagline); ?>" data-showcoverphoto="<?php echo esc_attr($cover_photo); ?>"></div>
					<script type="text/javascript">
					  (function() {
						var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
						po.src = 'https://apis.google.com/js/platform.js';
						var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
					  })();
					</script>			
				<?php } else { echo "Please Add Google Plus Page URL"; } 		?>
			</div>
		</div>
	</div>
</div>
<!---------------- footer customization Settings form ------------------------>
<div class="block ui-tabs-panel deactive" id="option-ourproduct" >
	<div class="row-fluid pricing-table pricing-three-column">
	<div class="plan-name centre"> 
	<a style="margin-bottom:10px;textt-align:center" target="_new" href="http://weblizar.com"><img  src="http://weblizar.com/wp-content/themes/home-theme/images/weblizar2.png" /></a>
	<div class="purchase_btn_div">
	  <a href="http://www.weblizar.com"" target="_new" class="btn btn-primary btn-lg dmobtn">View Site</a>		
	</div>
	</div>	
	<div class="plan-name">
        <h2>Weblizar's Responsive Wordpress Theme</h2>
		<h6>Get The Premium, And Create your website Beautifully.  </h6>
    </div>
	<div class="col-md-6  demoftr "> 
		<h2>Enigma-Pro</h2>
		<div class="img-wrapper">
			<div class="enigma_home_portfolio_showcase">
				<img class="enigma_img_responsive ftr_img"  src="<?php echo WL_Google_Plugins_URI.'/images/enigma.png' ;?>">
				<div class="enigma_home_portfolio_showcase_overlay">
					<div class="enigma_home_portfolio_showcase_overlay_inner ">
						<div class="enigma_home_portfolio_showcase_icons">
							<a title="Link" data-toggle="modal" data-target="#myModal" href="View Detail#">View Detail</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Modal  -->
	<div class="modal " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content ">
		  <div class="modal-header ">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title" id="myModalLabel"> <a class="pro-dir-button" data-toggle="modal" data-target="#myModalGreen"  data-dismiss="modal" href="View Detail#" class="pro-dir-button"><i style="color:#000;line-height:1.5" class="fa fa-angle-right fa-2x"></i></a>
			</h4>
		  </div>
		  <div class="modal-body">
			<div class="col-md-6">
				<img class="enigma_img_responsive ftr_img"  src="<?php echo WL_Google_Plugins_URI.'/images/enigma.png' ;?>">
			</div>
			<div class="col-md-6">
				<div class="theme-info">
					<h3 class="theme-name">Enigma Pro Theme</h3>
					<h4 class="theme-author">By <a href="http://weblizar.com/" title="Visit author homepage">weblizar</a></h4>
					<p class="theme-description">Enigma is HTML5 & CSS3 Responsive WordPress Business theme with business style , 7 blog templates , 6 portfolio templates and many more</p>
					<h4  style="margin-top:20px;">Features</h4>
					<div class="col-md-6">
						<div class="enigma_sidebar_link">
							<p>
								<i class="fa fa-angle-right"></i>Responsive Design
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Retina Ready 
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Html5 & Css3 
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Multi-purpose Theme
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Unlimited Color Schemes
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Multiple Templates 
							</p>
						
						</div>
					</div>
					<div class="col-md-6">
						<div class="enigma_sidebar_link">
							<p>
								<i class="fa fa-angle-right"></i>All Browser Support
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Powerful Option Panel
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Coming Soon Mode
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Custom Shortcode
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Isotope Effects and lightbox
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Fast & Friendly Support 
							</p>
						</div>
					</div>
					<div class="col-md-12" style="margin-top:20px;">
						<a class="btn btn-success btn-lg" target="_new" href="http://weblizar.com/preview/#enigma_pro">View Demo</a>&nbsp;&nbsp;
						<a  class="btn btn-danger btn-lg" target="_new" href="http://weblizar.com/themes/enigma-premium/">Purchase Now</a>
					</div>
				</div>
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			
		  </div>
		</div>
	  </div>
	</div>
	
	
	<div class="col-md-6  demoftr "> 
		<h2>Green Lantern Pro</h2>
		<div class="img-wrapper">
			<div class="enigma_home_portfolio_showcase">
				<img class="enigma_img_responsive ftr_img" src="<?php echo WL_Google_Plugins_URI."/images/green-lantern.jpg"; ?>">
				<div class="enigma_home_portfolio_showcase_overlay">
					<div class="enigma_home_portfolio_showcase_overlay_inner ">
						<div class="enigma_home_portfolio_showcase_icons">
							<a title="Link" data-toggle="modal" data-target="#myModalGreen" href="View Detail#">View Detail</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Modal  -->
	<div class="modal" id="myModalGreen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content ">
		  <div class="modal-header ">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title" id="myModalLabel"><a data-toggle="modal" data-target="#myModal"  data-dismiss="modal" href="View Detail#" class="pro-dir-button"><i style="color:#000;line-height:1.5" class="fa fa-angle-left fa-2x"></i></a> <a data-toggle="modal" data-target="#myModalweblizar"  data-dismiss="modal" href="View Detail#"  class="pro-dir-button"><i style="color:#000;line-height:1.5" class="fa fa-angle-right fa-2x"></i></a>
			</h4>
		  </div>
		  <div class="modal-body">
			<div class="col-md-6">
				<img class="enigma_img_responsive ftr_img"  src="<?php echo WL_Google_Plugins_URI."/images/green-lantern.jpg"; ?>">
			</div>
			<div class="col-md-6">
				<div class="theme-info">
					<h3 class="theme-name">Green Lantern Pro Theme</h3>
					<h4 class="theme-author">By <a href="http://weblizar.com/" title="Visit author homepage">weblizar</a></h4>
					<p class="theme-description">Green Lantern is a Full Responsive Multi-Purpose Theme suitable for Business , corporate office amd others .Cool Blog Layout and full width page also present</p>
					<h4  style="margin-top:20px;">Features</h4>
					<div class="col-md-6">
						<div class="enigma_sidebar_link">
							<p>
								<i class="fa fa-angle-right"></i>Responsive Design
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Retina Ready 
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Html5 & Css3 
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Multi-purpose Theme
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Unlimited Color Schemes
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Multiple Templates 
							</p>
						
						</div>
					</div>
					<div class="col-md-6">
						<div class="enigma_sidebar_link">
							<p>
								<i class="fa fa-angle-right"></i>All Browser Support
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Powerful Option Panel
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Coming Soon Mode
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Custom Shortcode
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Isotope Effects and lightbox
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Fast & Friendly Support 
							</p>
						</div>
					</div>
					<p></p>
					<div class="col-md-12" style="margin-top:20px;">
						<a class="btn btn-success btn-lg" target="_new" href="http://weblizar.com/preview/#green_lantern">View Demo</a>&nbsp;&nbsp;
						<a  class="btn btn-danger btn-lg" target="_new" href="http://weblizar.com/themes/green-lantern-premium-theme/">Purchase Now</a>
					</div>
					
				</div>
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			
		  </div>
		</div>
	  </div>
	</div>
	
	<div class="col-md-6  demoftr "> 
		<h2>Guardian-Pro</h2>
		<div class="img-wrapper">
			<div class="enigma_home_portfolio_showcase">
				<img class="enigma_img_responsive ftr_img"  src="<?php echo WL_Google_Plugins_URI."/images/guardian-premium-theme.jpg"; ?>">
				<div class="enigma_home_portfolio_showcase_overlay">
					<div class="enigma_home_portfolio_showcase_overlay_inner ">
						<div class="enigma_home_portfolio_showcase_icons">
							<a title="Link" data-toggle="modal" data-target="#myModalguardian" href="View Detail#">View Detail</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Modal  -->
	<div class="modal " id="myModalguardian" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content ">
		  <div class="modal-header ">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title" id="myModalLabel"><a data-toggle="modal" data-target="#myModalGreen"  data-dismiss="modal" href="View Detail#" class="pro-dir-button"><i style="color:#000;line-height:1.5" class="fa fa-angle-left fa-2x"></i></a> <a data-toggle="modal" data-target="#myModalweblizar  data-dismiss="modal" href="View Detail#"   class="pro-dir-button"><i style="color:#000;line-height:1.5" class="fa fa-angle-right fa-2x"></i></a>
			</h4>
		  </div>
		  <div class="modal-body">
			<div class="col-md-6">
				<img class="enigma_img_responsive ftr_img"  src="<?php echo WL_Google_Plugins_URI."/images/guardian-premium-theme.jpg"; ?>">
			</div>
			<div class="col-md-6">
				<div class="theme-info">
					<h3 class="theme-name">Guardian Pro Theme</h3>
					<h4 class="theme-author">By <a href="http://weblizar.com/" title="Visit author homepage">weblizar</a></h4>
					<p class="theme-description">Guardian is HTML5 & CSS3 Responsive WordPress Business theme with business style , 5 blog templates , 5 portfolio templates and touch slider</p>
					<h4  style="margin-top:20px;">Features</h4>
					<div class="col-md-6">
						<div class="enigma_sidebar_link">
							<p>
								<i class="fa fa-angle-right"></i>Responsive Design
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Retina Ready 
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Html5 & Css3 
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Multi-purpose Theme
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Unlimited Color Schemes
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Multiple Templates 
							</p>
						
						</div>
					</div>
					<div class="col-md-6">
						<div class="enigma_sidebar_link">
							<p>
								<i class="fa fa-angle-right"></i>All Browser Support
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Powerful Option Panel
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Coming Soon Mode
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Custom Shortcode
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Isotope Effects and lightbox
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Fast & Friendly Support 
							</p>
						</div>
					</div>
					<div class="col-md-12" style="margin-top:20px;">
						<a class="btn btn-success btn-lg" target="_new" href="http://weblizar.com/preview/#guardian">View Demo</a>&nbsp;&nbsp;
						<a  class="btn btn-danger btn-lg" target="_new" href="http://weblizar.com/themes/guardian-premium-theme/">Purchase Now</a>
					</div>
				</div>
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			
		  </div>
		</div>
	  </div>
	</div>
	
	
	<div class="col-md-6 demoftr "> 
		<h2>Weblizar Pro</h2>
		<div class="img-wrapper">
			<div class="enigma_home_portfolio_showcase">
				<img class="enigma_img_responsive ftr_img"  src="<?php echo WL_Google_Plugins_URI."/images/weblizar.jpg"; ?>">
				<div class="enigma_home_portfolio_showcase_overlay">
					<div class="enigma_home_portfolio_showcase_overlay_inner ">
						<div class="enigma_home_portfolio_showcase_icons">
							<a title="Link" data-toggle="modal" data-target="#myModalweblizar" href="View Detail#">View Detail</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Modal  -->
	<div class="modal" id="myModalweblizar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content ">
		  <div class="modal-header ">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title" id="myModalLabel"><a data-toggle="modal" data-target="#myModalGreen"  data-dismiss="modal" href="View Detail#" class="pro-dir-button"><i style="color:#000;line-height:1.5" class="fa fa-angle-left fa-2x"></i></a> <a data-toggle="modal" data-target="#myModallightbox"  data-dismiss="modal" href="View Detail#"   class="pro-dir-button"><i style="color:#000;line-height:1.5" class="fa fa-angle-right fa-2x"></i></a>
			</h4>
		  </div>
		  <div class="modal-body">
			<div class="col-md-6">
				<img class="enigma_img_responsive ftr_img"  src="<?php echo WL_Google_Plugins_URI."/images/weblizar.jpg"; ?>">
			</div>
			<div class="col-md-6">
				<div class="theme-info">
					<h3 class="theme-name">Weblizar Pro Theme</h3>
					<h4 class="theme-author">By <a href="http://weblizar.com/" title="Visit author homepage">weblizar</a></h4>
					<p class="theme-description">Responsive Multi-Purpose Theme suitable for Business , corporate office and others .Cool Blog Layout and full width page.You can also use it for  portfolio, blogging or any type of site. Built with Twitter bootstrap</p>
					<h4  style="margin-top:20px;">Features</h4>
					<div class="col-md-6">
						<div class="enigma_sidebar_link">
							<p>
								<i class="fa fa-angle-right"></i>Responsive Design
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Retina Ready 
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Html5 & Css3 
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Multi-purpose Theme
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Unlimited Color Schemes
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Multiple Templates 
							</p>
						
						</div>
					</div>
					<div class="col-md-6">
						<div class="enigma_sidebar_link">
							<p>
								<i class="fa fa-angle-right"></i>All Browser Support
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Powerful Option Panel
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Coming Soon Mode
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Custom Shortcode
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Isotope Effects and lightbox
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Fast & Friendly Support 
							</p>
						</div>
					</div>
					<p></p>
					<div class="col-md-12" style="margin-top:20px;">
						<a class="btn btn-success btn-lg" target="_new" href="http://weblizar.com/preview/#weblizar_pro">View Demo</a>&nbsp;&nbsp;
						<a  class="btn btn-danger btn-lg" target="_new"  href="http://weblizar.com/themes/weblizar-premium-theme/">Purchase Now</a>
					</div>
					
				</div>
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			
		  </div>
		</div>
	  </div>
	</div>
	
	
	</div>
	
	
	<div class="row-fluid pricing-table pricing-three-column">
	<div class="plan-name">
        <h2>Weblizar's Responsive Wordpress Plugins</h2>
		<h6>Get the Plugin and create beautiful Galleries and Slideshow.</h6>
    </div>
	<div class="col-md-4 demoftr">
		<h2>Lightbox Slider Pro</h2>
		<div class="img-wrapper">
			<div class="enigma_home_portfolio_showcase">
				<img class="enigma_img_responsive ftr_img"  src="<?php echo WL_Google_Plugins_URI."/images/fancy.jpg"; ?>">
				<div class="enigma_home_portfolio_showcase_overlay">
					<div class="enigma_home_portfolio_showcase_overlay_inner ">
						<div class="enigma_home_portfolio_showcase_icons">
							<a title="Link" data-toggle="modal" data-target="#myModallightbox" href="View Detail#">View Detail</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	
	</div>
	<!-- Modal  -->
	<div class="modal " id="myModallightbox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content ">
		  <div class="modal-header ">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title" id="myModalLabel"> <a class="pro-dir-button" data-toggle="modal" data-target="#myModalweblizar"  data-dismiss="modal" href="View Detail#" class="pro-dir-button"><i style="color:#000;line-height:1.5" class="fa fa-angle-left fa-2x"></i></a> <a class="pro-dir-button" data-toggle="modal" data-target="#myModalresponsive"  data-dismiss="modal" href="View Detail#" class="pro-dir-button"><i style="color:#000;line-height:1.5" class="fa fa-angle-right fa-2x"></i></a>
			</h4>
			
		  </div>
		  <div class="modal-body">
			<div class="col-md-6">
				<img class="enigma_img_responsive ftr_img"  src="<?php echo WL_Google_Plugins_URI."/images/fancy.jpg"; ?>">
			</div>
			<div class="col-md-6">
				<div class="theme-info">
					<h3 class="theme-name">LightBox Slider Pro</h3>
					<h4 class="theme-author">By <a href="http://weblizar.com/" title="Visit author homepage">weblizar</a></h4>
					<p class="theme-description">Lightbox Slider is premium wordpress plugin to create gallery with lightbox slide</p>
					<h4  style="margin-top:20px;">Features</h4>
					<div class="col-md-6">
						<div class="enigma_sidebar_link">
							<p>
								<i class="fa fa-angle-right"></i>Responsive Design
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Ultimate Lightbox   
							</p>
							<p>
								<i class="fa fa-angle-right"></i>5 Gallery Layout 
							</p>
							<p>
								<i class="fa fa-angle-right"></i>500+ Fonts Styles
							</p>
							<p>
								<i class="fa fa-angle-right"></i>10 Color Opacity
							</p>
							<p>
								<i class="fa fa-angle-right"></i>8 Lightbox 
							</p>
						
						</div>
					</div>
					<div class="col-md-6">
						<div class="enigma_sidebar_link">
							<p>
								<i class="fa fa-angle-right"></i>Gallery Shortcode
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Unlimited Color Schemes
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Retina Ready
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Isotope Effects
							</p>
							<p>
								<i class="fa fa-angle-right"></i>All Browser Support
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Fast & Friendly Support 
							</p>
						</div>
					</div>
					<div class="col-md-12" style="margin-top:20px;">
						<a class="btn btn-success btn-lg" target="_new" href="http://weblizar.com/lightbox-slider-pro/">View Demo</a>&nbsp;&nbsp;
						<a  class="btn btn-danger btn-lg" target="_new" href="http://weblizar.com/lightbox-slider-pro/">Purchase Now</a>
					</div>
				</div>
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			
		  </div>
		</div>
	  </div>
	</div>
	
	<div class="col-md-4 demoftr">
		<h2>Reponsive Photo Gallery</h2>
		<div class="img-wrapper">
			<div class="enigma_home_portfolio_showcase">
				<img class="enigma_img_responsive ftr_img"  src="<?php echo WL_Google_Plugins_URI."/images/responsive-gallery-pro.jpg"; ?>">
				<div class="enigma_home_portfolio_showcase_overlay">
					<div class="enigma_home_portfolio_showcase_overlay_inner ">
						<div class="enigma_home_portfolio_showcase_icons">
							<a title="Link" data-toggle="modal" data-target="#myModalresponsive" href="View Detail#">View Detail</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	
	</div>
	<!-- Modal  -->
	<div class="modal " id="myModalresponsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content ">
		  <div class="modal-header ">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			
			<h4 class="modal-title" id="myModalLabel"> <a class="pro-dir-button" data-toggle="modal" data-target="#myModallightbox"  data-dismiss="modal" href="View Detail#" class="pro-dir-button"><i style="color:#000;line-height:1.5" class="fa fa-angle-left fa-2x"></i></a> <a class="pro-dir-button" data-toggle="modal" data-target="#myModalflickr"  data-dismiss="modal" href="View Detail#" class="pro-dir-button"><i style="color:#000;line-height:1.5" class="fa fa-angle-right fa-2x"></i></a>
			</h4>
		  </div>
		  <div class="modal-body">
			<div class="col-md-6">
				<img class="enigma_img_responsive ftr_img"  src="<?php echo WL_Google_Plugins_URI."/images/responsive-gallery-pro.jpg"; ?>">
			</div>
			<div class="col-md-6">
				<div class="theme-info">
					<h3 class="theme-name">Responsive Photo Gallery</h3>
					<h4 class="theme-author">By <a href="http://weblizar.com/" title="Visit author homepage">weblizar</a></h4>
					<p class="theme-description">A Highly Animated Image Gallery Plugin For WordPress</p>
					<h4  style="margin-top:20px;">Features</h4>
					<div class="col-md-6">
						<div class="enigma_sidebar_link">
							<p>
								<i class="fa fa-angle-right"></i>Responsive Design
							</p>
							<p>
								<i class="fa fa-angle-right"></i>8 Animation Effect  
							</p>
							<p>
								<i class="fa fa-angle-right"></i>5 Gallery Layout 
							</p>
							<p>
								<i class="fa fa-angle-right"></i>500+ Fonts Styles
							</p>
							<p>
								<i class="fa fa-angle-right"></i>10 Color Opacity
							</p>
							<p>
								<i class="fa fa-angle-right"></i>2 Lightbox 
							</p>
						
						</div>
					</div>
					<div class="col-md-6">
						<div class="enigma_sidebar_link">
							<p>
								<i class="fa fa-angle-right"></i>Gallery Shortcode
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Unlimited Color Schemes
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Retina Ready
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Isotope Effects
							</p>
							<p>
								<i class="fa fa-angle-right"></i>All Browser Support
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Fast & Friendly Support 
							</p>
						</div>
					</div>
					<div class="col-md-12" style="margin-top:20px;">
						<a class="btn btn-success btn-lg" target="_new" href="http://weblizar.com/plugins/responsive-photo-gallery-pro/">View Demo</a>&nbsp;&nbsp;
						<a  class="btn btn-danger btn-lg" target="_new" href="http://weblizar.com/plugins/responsive-photo-gallery-pro/">Purchase Now</a>
					</div>
				</div>
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			
		  </div>
		</div>
	  </div>
	</div>
	
	
	<div class="col-md-4 demoftr">
		<h2>Flickr Album Gallery</h2>
		<div class="img-wrapper">
			<div class="enigma_home_portfolio_showcase">
				<img class="enigma_img_responsive ftr_img"  src="<?php echo WL_Google_Plugins_URI."/images/flicker-album-gallery-pro.jpg"; ?>">
				<div class="enigma_home_portfolio_showcase_overlay">
					<div class="enigma_home_portfolio_showcase_overlay_inner ">
						<div class="enigma_home_portfolio_showcase_icons">
							<a title="Link" data-toggle="modal" data-target="#myModalflickr" href="View Detail#">View Detail</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	
	</div>
	<!-- Modal  -->
	<div class="modal " id="myModalflickr" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content ">
		  <div class="modal-header ">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title" id="myModalLabel"> <a class="pro-dir-button" data-toggle="modal" data-target="#myModalresponsive"  data-dismiss="modal" href="View Detail#" class="pro-dir-button"><i style="color:#000;line-height:1.5" class="fa fa-angle-left fa-2x"></i></a>
			</h4>
		  </div>
		  <div class="modal-body">
			<div class="col-md-6">
				<img class="enigma_img_responsive ftr_img"  src="<?php echo WL_Google_Plugins_URI."/images/flicker-album-gallery-pro.jpg"; ?>">
			</div>
			<div class="col-md-6">
				<div class="theme-info">
					<h3 class="theme-name">Flickr Album Gallery</h3>
					<h4 class="theme-author">By <a href="http://weblizar.com/" title="Visit author homepage">weblizar</a></h4>
					<p class="theme-description">A Highly Animated Flickr Gallery Plugin For WordPress</p>
					<h4  style="margin-top:20px;">Features</h4>
					<div class="col-md-6">
						<div class="enigma_sidebar_link">
							<p>
								<i class="fa fa-angle-right"></i>Responsive Design
							</p>
							<p>
								<i class="fa fa-angle-right"></i>8 Animation Effect  
							</p>
							<p>
								<i class="fa fa-angle-right"></i>6 Gallery Layout 
							</p>
							<p>
								<i class="fa fa-angle-right"></i>500+ Fonts Styles
							</p>
							<p>
								<i class="fa fa-angle-right"></i>10 Color Opacity
							</p>
							<p>
								<i class="fa fa-angle-right"></i>8 Lightbox 
							</p>
						
						</div>
					</div>
					<div class="col-md-6">
						<div class="enigma_sidebar_link">
							<p>
								<i class="fa fa-angle-right"></i>Gallery Shortcode
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Unlimited Color Schemes
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Retina Ready
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Isotope Effects
							</p>
							<p>
								<i class="fa fa-angle-right"></i>All Browser Support
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Fast & Friendly Support 
							</p>
						</div>
					</div>
					<div class="col-md-12" style="margin-top:20px;">
						<a class="btn btn-success btn-lg" target="_new" href="http://weblizar.com/plugins/flickr-album-gallery-pro/">View Demo</a>&nbsp;&nbsp;
						<a  class="btn btn-danger btn-lg" target="_new" href="http://weblizar.com/plugins/flickr-album-gallery-pro/">Purchase Now</a>
					</div>
				</div>
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			
		  </div>
		</div>
	  </div>
	</div>
	
	
	</div>											
	<div class="plan-name centre"> 
	<div class="purchase_btn_div">
	  <a href="http://weblizar.com/" target="_new" class="btn btn-primary btn-lg dmobtn">View Site</a>		
	</div>
	</div>
</div>