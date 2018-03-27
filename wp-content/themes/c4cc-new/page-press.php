<?php
/*
Template Name: Press Release Index
*/

get_header(); ?>

	<div id="primary" class="content-area container">
		<div id="content" class="site-content press-release" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						
					</header><!-- .entry-header -->
					<div class="mobile-menu">
						<button class="mobile-activator" data-name="show" id="mobile-activator"><?php the_title(); ?></button>
						
					</div>
					<div class="entry-content">
						<?php if(get_field('intro')) : ?>
							<div class="intro">
								<?php the_field('intro'); ?>
							</div>
						<?php endif; ?>
						<?php the_content(); ?>
							<div class="release-list">
						<?php 
						  $temp = $wp_query; 
						  $wp_query = null; 
						  $wp_query = new WP_Query(); 
						  $wp_query->query('post_type=release'.'&paged='.$paged); 
						
						  while ($wp_query->have_posts()) : $wp_query->the_post(); 
						?>
									<p><?php the_time('F j, Y'); ?><br />
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
						
						
						<?php endwhile; ?>													
						 <?php 
						  $wp_query = null; 
						  $wp_query = $temp;  // Reset
						 ?>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
	
<?php get_footer(); ?>
