<?php
/*
Template Name: Do Something
*/
get_header(); ?>
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
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<?php if(get_field('section_nav')) : ?>
									<?php wp_nav_menu( array(
								 'menu' => get_field('section_nav'),
								 'depth' => 1
								 ) ); ?>
						<?php endif; ?>
					</header><!-- .entry-header -->
					<div class="mobile-menu">
						<button class="mobile-activator" data-name="show" id="mobile-activator"><?php the_title(); ?></button>
						<?php wp_nav_menu( array(
								'menu' 			=> get_field('section_nav'),
								'menu_class' 	=> 'menu_dropdown',
							) 
						); ?>
					</div>

				
					<div class="entry-content do-something">
						<?php the_post_thumbnail(); ?>
						<?php if(get_field('intro')) : ?>
							<div class="intro">
								<?php the_field('intro'); ?>
							</div>
						<?php endif; ?>
						<?php the_content(); ?>
						<br class="clear" />
						<div id="extended">
							<div class="lower-left">
								<h2><?php the_field('lower_left_title'); ?></h2>
								<div class="lower-content">
									<?php the_field('lower_left_content'); ?>
								</div>
								<a href="<?php the_field('lower_left_link'); ?>" class="lower-button">
									<span><?php the_field('lower_left_link_name'); ?></span>
								</a>
							</div>
							<div class="lower-mid">
								<h2><?php the_field('lower_mid_title'); ?></h2>
								<div class="lower-content">
									<?php the_field('lower_mid_content'); ?>
								</div>
								<a href="<?php the_field('lower_mid_link'); ?>" class="lower-button">
									<span><?php the_field('lower_mid_link_name'); ?></span>
								</a>
							</div>
							<div class="lower-connect">
								<h3>Connect</h3>
								<a class="twitter-timeline" href="https://twitter.com/CCCAction" data-widget-id="455753226025828352">Tweets by @CCCAction</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script><br /><br />
				 				<div class="fb-like-box" data-href="https://www.facebook.com/CCCAction" data-width="340" data-show-faces="true" data-header="true" data-stream="false" data-show-border="false"></div>
							</div>
							<br class="clear" />
						</div>
<!-- annotation made by tf 9-19-13 -->
<p align="center" style="font-size:82%"><br>*This page paid for by the Center for Community Change Action.</p>
					</div><!-- .entry-content -->
					
				</article><!-- #post-## -->

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>