<?php
/*
Template Name: Focus
*/

get_header(); ?>

	<div id="primary" class="content-area container">
		<div id="content" class="site-content our-focus" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h1 class="entry-title">Our Focus</h1>
						
					</header><!-- .entry-header -->
					<div class="mobile-menu">
						<button class="mobile-activator" data-name="show" id="mobile-activator"><?php the_title(); ?></button>
						<?php wp_nav_menu( array(
								'menu' 			=> get_field('section_nav'),
								'menu_class' 	=> 'menu_dropdown',
							)
						); ?>
					</div>
			
					<div class="focus-sub2">
						<ul id="focus-nav" class="menu">
							<li id="staff current" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2511">
								<a href="/real-power/focus/economic-justice/">Economic Justice</a>
							</li>
							<li id="council" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-121">
								<a href="/real-power/focus/racial-justice-immigrant-rights/">Racial Justice and Immigrant Rights</a></li>
							<li id="council" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-120">
								<a href="/real-power/focus/partners/">Partners</a></li>
							<li id="menu-item-4160" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-4155 current_page_item menu-item-4160">
								<a href="/real-power/focus/message-research/">Poverty Message Research</a></li>
						</ul>
					</div>


					<div class="entry-content">
						<?php the_post_thumbnail('featured'); ?>
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
