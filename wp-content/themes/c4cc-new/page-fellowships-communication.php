<?php

/*
Template Name: Communications Fellows
*/

get_header(); ?>

	<div id="primary" class="content-area container">
		<div id="content" class="site-content people" role="main"> <!-- fellowship taken out of class def by tf 6-15-15 -->

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
							<a href="/real-people/fellowships/">Fellows</a>
						</li>
						<li class="board current">
							<a href="/real-people/communications-fellow">Communication Fellows</a>
						</li>
					    <li class="fellows">
							<a href="/real-people/petra-fellows/">Petra Fellows</a>
						</li>
					</ul>

					<div class="entry-content">
						<?php if(get_field('intro')) : ?>
							<div class="intro">
								<?php the_field('intro'); ?>
							</div>
						<?php endif; ?>
						<?php $id=1; ?>
						<?php while(has_sub_field('staff_team')): ?>
							<div class="team">
								<ul>
									<?php $i=1; ?>
									<?php while(has_sub_field('team_member')) : ?>
										<li <?php if($i %4 == 0) : echo 'class="last"'; endif; ?> style="background: #E2E3E4 url(<?php the_sub_field('photo'); ?>) center center no-repeat">

											<a class="name-overlay" id="staff<?php echo $id; ?>"><?php the_sub_field('name'); ?></a>
											<div id="bio-staff<?php echo $id; ?>" class="staff-bio">
												<div class="staff-left">
													<div class='img-block'>
														<img src="<?php the_sub_field('photo'); ?>" />
													</div>
												</div>
												<div class="staff-right">
													<h3><?php the_sub_field('name'); ?> | <?php the_sub_field('title'); ?></h3>
													<p class="email"><?php the_sub_field('email_address'); ?></p>
													<p><?php the_sub_field('bio'); ?></p>
												</div>
												<button type="button" class="close-btn">close</button>
											</div>
										</li>
										<?php $i++; $id++; ?>
									<?php endwhile; ?>
								</ul>
							</div>
							<br class="clear" />
						<?php endwhile; ?>


						<?php the_content(); ?>

					</div><!-- .entry-content -->
				</article><!-- #post-## -->

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<script type='text/javascript'>
	/* Staff Show/Hide */
	jQuery('.name-overlay').click(function(){
		//jQuery('.honorees .carousel-inner').hide().css({opacity: 0});
		jQuery('.staff-bio').animate({width: 0},100);
		var $ID = 'bio-' + jQuery(this).attr('id');
		jQuery('#' + $ID + '.staff-bio').show().animate({width: '100%'},200);

	});
	jQuery('.staff-bio .close-btn').click(function(){
		var $ID = 'bio-' + jQuery(this).attr('id');
		jQuery(this).parent('.staff-bio').animate({width: 0},250);

	});
</script>

<?php get_footer(); ?>
