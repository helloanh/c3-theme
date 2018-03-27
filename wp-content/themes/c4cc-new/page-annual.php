<?php
/*
Template Name: Annual Report
*/
get_header(); ?>
	</div><!-- break out of .container from header -->
	<div id="immigrant" class="site-main container immigrant">
		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">
				<?php while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
					    <div class="timeline-carousel">
					    	<div class="container">
					    		<div class="row">
					    			<div class="col-xs-12">
								    	<?php if(have_rows('sections')) : $i=0; ?>
								        <ul class="current" id="y2000-2005">
								        	<?php while ( have_rows('sections') ) : the_row(); ?>
								            <li>
								            	<?php $image = wp_get_attachment_image_src( get_sub_field('image'), 'report-thumb'); ?>
												<?php $bigimage = wp_get_attachment_image_src( get_sub_field('image'), 'featured'); ?>
										    	<button type="button" class="round" id="section<?php echo $i; ?>" style="background-image: url(<?php echo $image[0]; ?>)">
								                	<span class="arrow"></span>
								                	<strong><?php the_sub_field('hover_text'); ?></strong>
								                    <span><?php the_sub_field('headline'); ?></span>
								                </button>
								            </li>
										    <article class="timeline-overlay clearfix" id="section<?php echo $i; ?>o">
										    	<div class="the-slider"></div>
										    	<div>
										        
										            <section>
										            	
										            	<h1><?php the_sub_field('headline'); ?></h1>
										            	<p class="text-right"><button style="border-radius: 0px; border: 0px;" type="button">CLOSE X</button></p>
										                <img src="<?php echo $bigimage[0]; ?>" />
										                <?php the_sub_field('content'); ?>	
										            </section>
										        </div>
										    </article>
								            <?php $i++; endwhile; ?>
								            <a href="<?php the_field('full_link'); ?>" class="full-report"><?php the_field('full_text'); ?></a>
								        </ul>
										<?php endif; ?>
								      <?php if(have_rows('buttons')) : ?>
								      <div class="row">
								      	<div class="col-xs-12">
									        <div class="previous-reports">
									        	<?php while(have_rows('buttons')) : the_row(); ?>
									        		<?php $text=get_sub_field('text'); ?>
													<a href="<?php the_sub_field('link'); ?>" <?php if(strlen($text)<15) { ?>class="shorter"<?php } ?>><?php echo $text; ?></a>
									    		<?php endwhile; ?>
									    	</div>
									    </div>
									   </div>
								    <?php endif; ?> 
								   </div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div><!-- #content -->
		</div><!-- #primary -->

	</div>
</div>
	<script type="text/javascript">
		$(document).ready(function(){
			// Overlay
			jQuery('.timeline-carousel ul').on('click', 'button', function(){
				var overlayID = '#' + jQuery(this).attr('id') + 'o';
				jQuery(overlayID).show().children('.the-slider').animate({width: '100%'},250).siblings().animate({opacity: 1},500);
			});
			jQuery('.timeline-overlay').on('click', 'button', function(){
				jQuery(this).parent().siblings('.the-slider').animate({width: 0},250).siblings().animate({opacity: 0},250,function(){
					jQuery(this).closest('.timeline-overlay').hide();
				});
			});
		});
	</script>
<?php get_footer(); ?>