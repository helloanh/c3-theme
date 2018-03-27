<?php

/*
Template Name: Staff
*/
get_header(); ?>
	<div id="primary" class="content-area">
		<div id="content" class="site-content people container" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						
					</header><!-- .entry-header -->
					<div class="mobile-menu">
						<button class="mobile-activator" data-name="show" id="mobile-activator"><?php the_title(); ?></button>
						
					</div>

					<ul id="people-nav">
						<li class="staff current">
							<a>Staff</a>
						</li>
						<li class="board">
							<a href="/real-people/people/board-of-directors/">Board</a>
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
							<?php $anchor=1; ?>
							<?php while(has_sub_field('staff_team')): ?>
								<a href="#team<?php echo $anchor; ?>" class="team-nav<?php if($anchor %4 == 0) : echo ' last'; endif; ?>"><?php the_sub_field('team_name'); ?></a>
								<?php $anchor++; ?>
							<?php endwhile; ?>
							<?php $id=1; $anchor=1; ?>
							<?php while(has_sub_field('staff_team')): ?>
								<div class="team staff-team">
									<h2 id="team<?php echo $anchor; ?>"><?php the_sub_field('team_name'); ?></h2>
									<a href="#post-<?php the_ID(); ?>" class="back-top">Back to Top</a>
									<button id="team<?php echo $anchor; ?>-activator" class="mobile-dropper" data-name="show"><?php the_sub_field('team_name'); ?></button>
									<ul id="team<?php echo $anchor; ?>-list" class="team-list">
										<?php $i=1; ?>
										<?php while(has_sub_field('team_member')) : ?>
											<?php if(get_sub_field('photo')) : ?>
												<li <?php if($i %4 == 0) : echo 'class="last"'; endif; ?> style="background: #E2E3E4 url(<?php the_sub_field('photo'); ?>) center center no-repeat">
													<a class="name-overlay" id="staff<?php echo $id; ?>"><?php the_sub_field('name'); ?></a>
											<?php else : ?>
												<li <?php if($i %4 == 0) : echo 'class="last"'; endif; ?> style="background: #E2E3E4 url('<?php echo get_template_directory_uri(); ?>/images/no-pic.png') center center no-repeat">									
													<a class="name-overlay solid" id="staff<?php echo $id; ?>"><?php the_sub_field('name'); ?></a>
											<?php endif; ?>
												<div id="bio-staff<?php echo $id; ?>" class="staff-bio">
													<div class="staff-left">
														<div class='img-block'>
															<img src="<?php the_sub_field('photo'); ?>" />
														</div>
													</div>
													<div class="staff-right">
														<h3 class="staff-name"><?php the_sub_field('name'); ?> | <?php the_sub_field('title'); ?></h3>
														<p class="email"><a href="mailto:<?php the_sub_field('email_address'); ?>"><?php the_sub_field('email_address'); ?></a></p>
														<p><?php the_sub_field('bio'); ?></p>
														<?php if(get_sub_field('quote')) : ?>
															<h3>Quote</h3>
															<?php the_sub_field('quote'); ?>
														<?php endif; ?>
													</div>
													<button type="button" class="close-btn">close</button>
												</div>
											</li>
											<?php $i++; $id++; ?>
										<?php endwhile; ?>
									</ul>
								</div>
								<?php $anchor++; ?>
							<?php endwhile; ?>
							<!-- <br class="clear" /> -->
						</div>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->

			<?php endwhile; // end of the loop. ?>
		</div><!-- #content -->
	</div><!-- #primary -->
<script type='text/javascript'>
	jQuery('.name-overlay').click(function(){
		jQuery('.staff-bio').animate({width: 0},100);
		var $ID = 'bio-' + jQuery(this).attr('id');
		jQuery('#' + $ID + '.staff-bio').show().animate({width: '100%'},200);
		
	});
	jQuery('.staff-bio .close-btn').click(function(){
		var $ID = 'bio-' + jQuery(this).attr('id');
		jQuery(this).parent('.staff-bio').animate({width: 0},250);

	});
   	jQuery('a[href^="#"]').bind('click.smoothscroll',function (e) {
	        e.preventDefault();
	        var target = this.hash,
	        $target = jQuery(target);
	      
	        jQuery('html, body').stop().animate({
	            'scrollTop': $target.offset().top-100
	        }, 900, 'swing', function () {
	            window.location.hash = target;
	        });
    });
    jQuery(".mobile-dropper").click(function () {
        jQuery(this).next().toggleClass( "show" );
	});
</script>

<?php get_footer(); ?>
