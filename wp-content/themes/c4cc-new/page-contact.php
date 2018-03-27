<?php
/*
Template Name: Contact Us
*/

get_header(); ?>

	<div id="primary" class="content-area container">
		<div id="content" class="site-content contact-us" role="main">

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

					<div class="entry-content extended">
						<div class="address">
							<?php the_field('address'); ?>
						</div>
						<div class="employment">
							<?php the_field('employment_tease'); ?>
						</div>
						<div class="social">
							<ul>
								<li><a href="<?php the_field('facebook', 'option'); ?>" class="facebook">Facebook</a></li>
								<li><a href="<?php the_field('twitter', 'option'); ?>" class="twitter">Twitter</a></li>
								<li><a href="<?php the_field('youtube', 'option'); ?>" class="youtube">YouTube</a></li>
								<li><a href="<?php the_field('flickr', 'option'); ?>" class="flickr">Flickr</a></li>
							</ul>
						</div>
					</div>

					<div class="entry-content contact-form">
						<?php if(get_field('intro')) : ?>
							<div class="intro">
								<?php the_field('intro'); ?>
							</div>
						<?php endif; ?>
						<?php the_content(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
