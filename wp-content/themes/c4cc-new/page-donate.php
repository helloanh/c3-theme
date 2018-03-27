<?php
/*
Template Name: Donate
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content donate" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<div class="menu-real-change-container">
							<ul id="menu-real-change" class="menu">
								<li id="menu-item-235" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-235">
									<a href="http://c3c4wpemain.wpengine.com/real-change/something/">Do Something</a></li>
								<li id="menu-item-2513" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-36 current_page_item menu-item-2513">
									<a href="http://c3c4wpemain.wpengine.com/real-change/ways-donate/">Ways to Donate</a></li>
								<li id="menu-item-2429" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2429">
									<a href="https://join.communitychange.org/page/contribute/donate-monthly-to-center-for-community-change">Monthly Giving</a></li>
							</ul>
						</div>
					</header><!-- .entry-header -->
					<div class="mobile-menu">
						<button class="mobile-activator" data-name="show" id="mobile-activator"><?php the_title(); ?></button>
						<?php wp_nav_menu( array(
								'menu' 			=> get_field('section_nav'),
								'menu_class' 	=> 'menu_dropdown',
							) 
						); ?>
					</div>
					<div class="container way-donate-banner">
						<div class="row">
							<div class="col-xs-12">
								<p class="text-center"><?php the_post_thumbnail(); ?></p>
							</div>
						</div>
					</div>
				
					<div class="entry-content">
						<ul class="donate_buttons">
							<li class="button1"><a href="<?php the_field('button_1_link'); ?>" ><?php the_field('button_1_text'); ?></a></li>
							<li class="button2"><a href="<?php the_field('button_2_link'); ?>"><?php the_field('button_2_text'); ?></a></li>
							<li class="button3"><a href="<?php the_field('button_3_link'); ?>"><?php the_field('button_3_text'); ?></a></li>
							<li class="button4"><a href="<?php the_field('button_4_link'); ?>"><?php the_field('button_4_text'); ?></a></li>
						</ul>
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
