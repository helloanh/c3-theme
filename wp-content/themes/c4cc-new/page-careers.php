<?php
/*
Template Name: Careers
*/

get_header(); ?>

<div id="careers">
	<div id="primary" class="content-area container">
		<div id="content" class="site-content our-focus" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h1 class="entry-title">Careers</h1>
					</header><!-- .entry-header -->
					<div class="mobile-menu">
						<button class="mobile-activator" data-name="show" id="mobile-activator"><?php the_title(); ?></button>
						<?php wp_nav_menu( array(
								'menu' 			=> get_field('section_nav'),
								'menu_class' 	=> 'menu_dropdown',
							)
						); ?>
					</div>

					<ul id="career-nav">
						<li class="current-openning current">
							<a href="/contact/careers/">Current Openings</a>
						</li>
						<li class="why-work-here">
							<a href="/contact/careers/why-work-here/">Why Work Here</a>
						</li>
                        <li class="staff-alumni">
							<a href="/contact/careers/alumni-spotlight/">Staff Alumni Spotlight</a>
						</li>
					</ul>

					<div class="entry-content">
						<?php the_post_thumbnail('featured'); ?>
						<?php if(get_field('intro')) : ?>
							<div class="intro">
								<?php the_field('intro'); ?>
							</div>
						<?php endif; ?>
						<?php the_content(); ?>
						<ul class="focus-extended">
							<?php $i=1; $id=1; ?>
							<?php while(has_sub_field('sub_section')) : ?>
								<li <?php if($i %3 == 0) : echo 'class="last"'; endif; ?> style="background: #E2E3E4 url(<?php the_sub_field('image'); ?>) center center no-repeat">
									<a class="name-overlay" id="section<?php echo $id; ?>"><?php the_sub_field('title'); ?></a>
									<div id="sub-section<?php echo $id; ?>" class="sub-section">
										<div class="section-left">
											<img src="<?php the_sub_field('image'); ?>" />
										</div>
										<div class="section-right">
											<h3><?php the_sub_field('title'); ?></h3>
											<?php the_sub_field('content'); ?>
										</div>
										<button type="button" class="close-btn">close</button>
									</div>
								</li>
							<?php $i++; $id++; ?>
							<?php endwhile; ?>
						</ul>



					</div><!-- .entry-content -->
				</article><!-- #post-## -->

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
</div>
<script type='text/javascript'>
	/* Staff Show/Hide */
	jQuery('.name-overlay').click(function(){
		jQuery('.sub-section').animate({width: 0},100);
		var $ID = 'sub-' + jQuery(this).attr('id');
		jQuery('#' + $ID + '.sub-section').show().animate({width: '1080px'},200);

	});
	jQuery('.sub-section .close-btn').click(function(){
		var $ID = 'section' + jQuery(this).attr('id');
		jQuery(this).parent('.sub-section').animate({width: 0},250);
	});
</script>

<?php get_footer(); ?>
