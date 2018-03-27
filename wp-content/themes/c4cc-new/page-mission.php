<?php
/*
Template Name: Mission
*/

get_header(); ?>

	<div id="primary" class="content-area container">
		<div id="content" class="site-content mission" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header><!-- .entry-header -->
					<div class="mobile-menu">
						<button class="mobile-activator" data-name="show" id="mobile-activator"><?php the_title(); ?></button>
						<?php wp_nav_menu( array(
								'menu' 			=> get_field('section_nav'),
								'menu_class' 	=> 'menu_dropdown',
							) 
						); ?>
					</div>

					<ul id="people-nav">
						<li class="mission current">
							<a href="/real-people/mission">Mission</a>
						</li>
                       <li class="people">
							<a href="/real-power/45th-anniversary-timeline/">The CCC Timeline</a>
						</li>
						<li class="resources/">
							<a href="/resources">Research</a>
						</li> 
                        <li class="/campaigns/">
							<a href="/real-people/people/advisory-council/">Our Focus</a>
						</li>
						<li class="annual">
							<a href="/real-people/annual-reports">Annual Reports</a>
						</li>
					</ul>
                   			
					<div class="entry-content">
						<div class="entry-content-inner-container">
							<?php if(get_field('intro')) : ?>
								<div class="intro">
									<?php the_field('intro'); ?>
								</div>
							<?php endif; ?>
							<?php the_content(); ?>
						</div>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
