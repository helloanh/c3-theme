<?php
/*
Template Name: Focus Advanced
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
						<div class="containter">
							<ul class="focus-extended">
								<?php $i=1; $id=1; ?>
								<?php
								// check if the repeater field has rows of data
								if( have_rows('sub_section') ):

                                while(have_rows('sub_section')) : the_row(); ?>
									<li <?php if($i %3 == 0) : echo 'class="last"'; endif; ?> style="background: #E2E3E4 url(<?php the_sub_field('image', 'option'); ?>) center center no-repeat">
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
								<?php endwhile;
								else :

									echo "";

								endif;

								?>
							</ul>
						</div>



					</div><!-- .entry-content -->
				</article><!-- #post-## -->

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
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
