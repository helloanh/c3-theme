<?php
/*
Template Name: Board
*/

get_header(); ?>

	<div id="primary" class="content-area container">
		<div id="content" class="site-content people" role="main">

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

					<ul id="people-nav">
						<li class="staff">
							<a href="/real-people/people/staff/">Staff</a>
						</li>
						<li class="board current">
							<a>Board</a>
						</li>
						<li class="council">
							<a href="/real-people/fellowships/">Fellows</a>
						</li>
                      <li class="council">
							<a href="/real-people/people/advisory-council/">Advisory Council</a>
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
