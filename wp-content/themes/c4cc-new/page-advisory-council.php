<?php

/*
Template Name: Advisory Council
*/

get_header(); ?>

	<div id="primary" class="content-area container">
		<div id="content" class="site-content people" role="main">

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
						<li class="staff">
							<a href="/real-people/people/staff/">Staff</a>
						</li>
						<li class="board">
							<a href="/real-people/people/board-of-directors/">Board</a>
						</li>

						<li class="council">
							<a href="/real-people/fellowships/">Fellows</a>
						</li>
						<li class="council current">
							<a>Advisory Council</a>
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

							<?php $id=1; ?>
							<?php // while(has_sub_field('staff_team')): ?>
								<div class="team">
									<ul>
										<?php $i=1; ?>
										<?php while(has_sub_field('council_member')) : ?>
											<?php if(get_sub_field('photo')) : ?>
												<li <?php if($i %4 == 0) : echo 'class="last"'; endif; ?> style="background: #E2E3E4 url(<?php the_sub_field('photo'); ?>) center center no-repeat">
													<a class="name-overlay" id="staff<?php echo $id; ?>"><?php the_sub_field('name'); ?></a>

										<?php else : $i=$i-1; ?>


											<?php endif; ?>

												<div id="bio-staff<?php echo $id; ?>" class="ac-bio">
													<div class="staff-left">
														<div class='img-block'>
															<img src="<?php the_sub_field('photo'); ?>" />
														</div>
													</div>
													<div class="staff-right">
														<h3 class="staff-name"><?php the_sub_field('name'); ?> </h3>
														<h3 class="staff-title"> <?php the_sub_field('title'); ?></h3>
	                                                    <h3 class="staff-org"><?php the_sub_field('organization'); ?></h3>
														<div class="ac-social">
	                                                        <?php if(get_sub_field('twitter')) : ?>
	                                                        	<a href="<?php the_sub_field('twitter'); ?>" target="_blank" class="twitter">Twitter</a>
	                                                        <?php endif; ?>
	                                                        <?php if(get_sub_field('facebook')) : ?>
	                                                        	<a href="<?php the_sub_field('facebook'); ?>" target="_blank" class="facebook">Facebook</a>
	                                                        <?php endif; ?>
	                                                        <?php if(get_sub_field('instagram')) : ?>
	                                                        	<a href="<?php the_sub_field('instagram'); ?>" target="_blank" class="instagram">Instagram</a>
	                                                        <?php endif; ?>
	                                               		</div>

														<p><?php the_sub_field('bio'); ?></p>
	                                                    <?php if(get_sub_field('relevant_works')) : ?>
															<h3>Relevant Works</h3>
															<?php the_sub_field('relevant_works'); ?>
														<?php endif; ?>


													</div>
													<button type="button" class="close-btn">close</button>
												</div>
											</li>
											<?php $i++; $id++; ?>
										<?php endwhile; ?>
									</ul>
								</div>
							<?php // endwhile; ?>
							<br class="clear" />
						</div>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<script type='text/javascript'>
	jQuery('.name-overlay').click(function(){
		jQuery('.ac-bio').animate({width: 0},100);
		var $ID = 'bio-' + jQuery(this).attr('id');
		jQuery('#' + $ID + '.ac-bio').show().animate({width: '100%'},200);

	});
	jQuery('.ac-bio .close-btn').click(function(){
		var $ID = 'bio-' + jQuery(this).attr('id');
		jQuery(this).parent('.ac-bio').animate({width: 0},250);

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

</script>

<?php get_footer(); ?>
