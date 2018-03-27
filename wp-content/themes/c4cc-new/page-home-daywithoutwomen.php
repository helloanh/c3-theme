<?php
/*
Template Name: Home Day Without Women
*
* by Anh K. Hoang
* To use this theme for the home page, copy paste the code below.  Make sure you make a back up copy of page-home.php template.
*/
wp_enqueue_script('jquery');
wp_enqueue_script('flexslider',get_stylesheet_directory_uri().'/js/jquery.flexslider-min.js','jquery'); 
//wp_enqueue_style('flexslider-style',get_stylesheet_directory_uri().'/js/flexslider.css'); 


get_header('day-without-women'); ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=243699582414721";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div id="slider2">
						<?php if(get_field('slides')): ?>		
							<ul class="slides">
								<?php while(has_sub_field('slides')): ?>
									<li>
										<a class="slide" href="<?php the_sub_field('link'); ?>" style="background: url(<?php the_sub_field('image'); ?>) top center no-repeat; background-size: 100%;">
											<p class="orange-line"  style="background: #f1615c !important;""><?php the_sub_field('first_line'); ?></p>
											<p class="grey-line"><?php the_sub_field('second_line'); ?></p>										
										</a>
									</li>
								<?php endwhile; ?>
							</ul>
						<?php endif; ?>	
					</div>
					<div id="slider">		
										<div style="position: relative;"><ul class="slides" style="width: 1600%;">
										    <li class="clone" style="width: 1080px; float: left; display: block;">
															<a class="slide" href="https://www.facebook.com/communitychange/" style="top center no-repeat; background-size: 100%;">
																<img src="https://www.communitychange.org/wp-content/uploads/2017/03/CCC-banner1-1.png">
															<!-- 	<p class="orange-line">In honor of all working women marching across the world,</p>
																<p class="grey-line">today we support with red in solidarity!</p>	 -->									
															</a>
												</li>																
										</div>
					</div>

					<div id="welcome">
						<h2><?php the_field('intro_title'); ?></h2>
						<p><?php the_field('intro_copy'); ?></p>
					</div>
					<?php $recent = new WP_Query( array(
				           	'posts_per_page' => 3,
						   	)
						);
			 		if ($recent->have_posts()) : $i=1; ?>
			 			<div id="pre-blog">
				 			<h3>From the Blog</h3>
				 			<a href="/real-power/blog/" class="more">More from our blog</a>
				 			<br class="clear" />
			 			</div>
			 			<ul id="home-blog">
				 			<?php while ($recent->have_posts()) : $recent->the_post();  ?>
				 				<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'home-blog', false, '' ); ?>
				 				<li class="block<?php echo $i; ?>" style="background: url('<?php echo $src[0]; ?>') no-repeat">
				 					<div class="date"><?php the_time('j.F.y'); ?></div>
				 					<a href="<?php the_permalink(); ?>">
					 					<?php the_title(); ?>
				 					</a>
				 				</li>
				 				<?php $i++; ?>				 		
				 			<?php endwhile;?>
			 			</ul>
			 			<br class="clear" />
			 		<?php endif; wp_reset_query(); ?> 
			 		<div id="social-widgets">
			 			<h3>On Twitter</h3>
			 			<a class="twitter-timeline" data-dnt="true" href="https://twitter.com/communitychange" data-widget-id="375716758285332480">Tweets by @communitychange</a>
			 				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			 			<h3>On Facebook</h3>
			 			<div class="fb-like-box" data-href="https://www.facebook.com/communitychange" data-width="350" data-show-faces="true" data-header="true" data-stream="false" data-show-border="false"></div>
			 		</div>
			 		<div id="features">
			 			<div class="cluster">
				 			<div class="larger" style="background: url(<?php the_field('large_image'); ?>) top center no-repeat">
								<a href="<?php the_field('large_link'); ?>" target="_blank">
									Read More	
								</a>
							</div>
							<?php if(get_field('small_linked_images')): ?>		
								<ul class="smaller">
									<?php while(has_sub_field('small_linked_images')): ?>
										<li style="background: url(<?php the_sub_field('small_image'); ?>) top center no-repeat">
											<a href="<?php the_sub_field('small_link'); ?>" target="_blank">
												Read More	
											</a>
										</li>
									<?php endwhile; ?>
								</ul>
							<?php endif; ?>
							<br class="clear" />				 			
							<div id="newsletter">
								<h3>Sign up for News and Updates</h3>
								<form name="signup" action="http://signup.communitychange.org/page/signup/center-signup" method="post" id="signup">
								<p>
								    <label for="firstname"> First Name</label> <input type="text" placeholder="First" value="" id="firstname" name="firstname" />
									<label for="lastname">Last Name</label> <input type="text" placeholder="Last" value="" id="lastname" name="lastname" />
								  </p>
								    <p>
								     <label for="email">Email</label> <input type="email" name="email" placeholder="Email" value="" id="email" />
								     <label for="zip">Zip</label> <input type="text" placeholder="Zip" name="zip" value="" id="zip" />
								     <input name="submit-btn" class="submit" value="Signup" type="submit">
								  <input name="redirect_url" type="hidden" value=""><input id="_guid" name="_guid" type="hidden" value="">
								</form>
							</div>
						</div>
			 		</div>
				
				</article><!-- #post-## -->

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
	<script type="text/javascript">
		// Can also be used with $(document).ready()
		jQuery(window).load(function() {
		  jQuery('#slider').flexslider({
		    animation: "slide"
		  });
		});
	</script>

	<!-- Hotjar Tracking Code for www.communitychange.org -->
	<script>
	    (function(h,o,t,j,a,r){
	        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
	        h._hjSettings={hjid:388723,hjsv:5};
	        a=o.getElementsByTagName('head')[0];
	        r=o.createElement('script');r.async=1;
	        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
	        a.appendChild(r);
	    })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
	</script>



<?php get_footer(); ?>