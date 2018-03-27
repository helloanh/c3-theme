<?php

/*
Template Name: Petra Fellows
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
							<a>Fellows</a>
						</li>
						<li class="board">
							<a href="/real-people/communications-fellows/">Communication Fellows</a>
						</li>
            <li class="fellows current">
							<a href="/real-people/petra-fellows/">Petra Fellows</a>
						</li>
					</ul>
					<div class="entry-content">
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
									<?php while(has_sub_field('petra_fellow')) : ?>
										<li <?php if($i %4 == 0) : echo 'class="last"'; endif; ?> style="background: #E2E3E4 url(<?php the_sub_field('photo'); ?>) center center no-repeat">
                                            <a class="name-overlay" id="staff<?php echo $id; ?>"><span><?php the_sub_field('name'); ?></span></a>

											<div id="bio-staff<?php echo $id; ?>" class="ac-bio">
												<div class="staff-left">
													<div class='img-block'>
														<img src="<?php the_sub_field('photo'); ?>" />
													</div>
												</div>
												<div class="staff-right">
													<?php if(get_sub_field('death_date')) : ?>
														<h3><?php the_sub_field('name'); ?> (d.<?php the_sub_field('death_date'); ?>)</h3>
                                                    <?php else :?>
                                                    	<h3><?php the_sub_field('name'); ?></h3>
													<?php endif; ?>

                                                    <h3>Fellowship Date: <?php the_sub_field('fellowship_date'); ?></h3>
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
							<br class="clear" />
						<?php // endwhile; ?>


					</div><!-- .entry-content -->
				</article><!-- #post-## -->

				<div class="navigation">
                    <a href="http://www.communitychange.org/real-people/petra-fellows/" class="nav-previous"><< Page 1</a>
                    <a href="http://www.communitychange.org/real-people/petra-fellows2/" class="nav-next">Page 2 >></a>
                </div>

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
