<?php
/*
* Template Name: At the Center Quarter Newsletter
* By Anh K. Hoang
*/
get_header('newsletter-dtw'); ?>
<body class="landing">
		<style>
			section.special, article.special { text-align: left;}
			.wrapper.style1.special ul li, .wrapper.style1 strong, .wrapper.style1 b { color: #444; }
			header.on-the-move { text-align: center;}
			body.landing #page-wrapper {
			    background-position: center center;
			}
			.in-case-banner-div { background: #eee;}
			.wrapper.style4 { background: rgba(255,255,255,0.45);}
			ul.features img { width: 300px;}
		</style>
		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						<h1><a href="https://communitychange.org"><img id="logo-img" src="https://communitychange.org/wp-content/uploads/2017/04/c3-white-logo.png"></a></h1>
						<nav id="nav">
							<ul>
								<li class="special">
									<a href="#menu" class="menuToggle"><span>Menu</span></a>
									<div id="menu">
										<ul>
											<li><a href="#banner">Top</a></li>
											<li><a href="#in-these-times">In These Times</a></li>
											<li><a href="#ccca-on-the-move">CCC On The Move</a></li>
											<li><a href="#in-case-you-missed-it">In Case You Missed It</a></li>
											<li><a href="http://signup.communitychange.org/page/s/ia-monthly-newsletter">Subscribe</a></li>
											<li><a href="https://join.communitychange.org/page/contribute/c3-donate-today">Donate</a></li>
										</ul>
									</div>
								</li>
							</ul>
						</nav>
					</header>

				<!-- Banner -->
					<section id="banner">
						<div class="inner">
							<h2>At the Center: CCC Quarterly Newsletter <br> 
								<?php if (get_field('issue_season_year')):?>
									<?php the_field('issue_season_year');?>
								<?php endif;?>
							</h2>
							<h3>In These Times </h3>
						</div>
						<a href="#in-these-times" class="more scrolly" ></a>
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<p>
										<?php if (get_field('in-these-times-subheading')):?>
											<?php the_field('in-these-times-subheading');?>
										<?php endif;?>
									</p>
									<p class="text-justify">
										<?php if (get_field('banner_excerpt')):?>
									<?php the_field('banner_excerpt');?>
									<?php endif;?>
								 <br><br>
									</p>
								</div>
							</div>
						</div>					
					</section>

				<!-- One -->
					<section id="a-new-generation" class="wrapper style1 special">
						<div class="inner">
							<header class="major">
								
								<?php if (get_field('in_these_times_full_text')):?>
									<p><?php the_field('in_these_times_full_text');?></p>
								<?php endif;?>		
							</header>
						</div>
					</section>

					<section id="ccca-on-the-move" class="wrapper style3 special">
						<div class="inner">
							<header class="major">
								<h2>CCC On The Move</h2>
									<?php if (get_field('on_the_move_full_text')):?>
										<?php the_field('on_the_move_full_text');?>
									<?php endif;?>
							</header>
							<!-- repeater field for on the move stories -->
							<?php if( have_rows('on_the_move_highlight_stories') ): ?>
								<ul class="features">
								<?php while( have_rows('on_the_move_highlight_stories') ): the_row(); 
									$otf_title = get_sub_field('on_the_move_story_title');
									$otf_image_ext_url = get_sub_field('on_the_move_image_url_external');
									$dest_link = get_sub_field('on_the_movie_image_destination_link');
								?>
									<li>
										<?php if( $dest_link ): ?>
											<a href="<?php echo $dest_link; ?>">
										<?php endif; ?>
										<?php if ($otf_image_ext_url): ?>
												<img src="<?php echo $otf_image_ext_url; ?>" />
											<?php endif; ?>
										<?php if( $dest_link ): ?>
											</a>
									  <?php if($otf_title): ?>
									    	<h3><?php echo $otf_title; ?></h3>
									   <?php endif ?>
									<?php endif; ?>
									</li>
									<?php endwhile; ?>
								</ul>
							<?php endif; ?>
						</div>
					</section>
					<section id="in-case-you-missed-it" class="wrapper alt style2">
						<div class="in-case-banner-div">
							<header class="major on-the-move" style="padding-top:60px;padding-bottom:0px;margin-bottom:10px;">
								<h2 class="text-center">In Case You Missed It</h2>
							</header>
						</div>
							<?php if( have_rows('spotlight') ): ?>		 
							    	<?php while( have_rows('spotlight') ): the_row(); ?>
									<section class="spotlight">	
										<div class="image">
											<a href="<?php the_sub_field('spotlight_external_url'); ?>">
												<img src="<?php the_sub_field('spotlight_img_link'); ?>" alt="" />
											</a>
										</div>		
										<div class="content">
											<h3><?php the_sub_field('spotlight_header'); ?></h3>
											<p><?php the_sub_field('spotlight_description'); ?></p>
										</div>
									</section>
							    	<?php endwhile; ?>
							<?php endif; ?>			
					</section><!-- end in case you missed it -->
				<!-- CTA -->
					<section id="cta" class="wrapper style4">
						<div class="inner">
							<header>
								<h2>Celebrate 50 Years: From Protest to Power</h2>
								<p>We’ll keep you updated on the latest events and engagement opportunities during our 50th Anniversary year.</p>
							</header>
							<ul class="actions vertical">
								<li><a href="https://join.communitychange.org/page/s/50th-anniversary-sign-up" class="button fit special" style="background-color:#26211d;">Subscribe</a></li>
								<li><a href="https://join.communitychange.org/page/contribute/donate-now-center-for-community-change" class="button fit special" style="background-color:#26211d;">Donate</a></li>
							</ul>
						</div>
					</section>

				<!-- Footer -->
					<footer id="footer">
						<ul class="icons">
							<li><a class="modimg" href="https://twitter.com/communitychange" style="color:#e8be2d;"><img alt="tw" class="banner" height="25" src="https://reformimmigrationforamerica.org/wp-content/uploads/2017/04/icon-twitter.png" style="display:block;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;border: none;" width="25" /></a><span class="label"></span></a></li>

							<li><a class="modimg" href="https://www.facebook.com/communitychange/" style="color:#e8be2d;"><img alt="fb" class="banner" height="25" src="https://reformimmigrationforamerica.org/wp-content/uploads/2017/04/icon-facebook.png" style="display:block;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;border: none;" width="25" /></a><span class="label"></span></a></li>

							<li>	<a class="modimg" href="https://www.youtube.com/user/ChangeNationVideo" style="color:#e8be2d;"><img alt="yt" class="banner" height="25" src="https://reformimmigrationforamerica.org/wp-content/uploads/2017/04/icon-youtube.png" style="display:block;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;border: none;" width="25" /></a></li>
							
						</ul>
						<ul>
						<ul class="copyright">
							<li>&copy; Copyright 2017 </li><li><a href="https://communitychange.org">Center for Community Change</a>
							</li>
						</ul>
						<ul class="copyright"> 
							<li>Site by <a style="text-decoration: none;" href="https://www.linkedin.com/in/anhkimhoang/">Anh K. Hoang</a></li>
						</ul>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="https://communitychange.org/wp-content/themes/c4cc-new/inc/deepak-dtw-main-jquery.min.js"></script>
			<script src="https://communitychange.org/wp-content/themes/c4cc-new/inc/jquery.scrollex.min.js"></script>
			<script src="https://communitychange.org/wp-content/themes/c4cc-new/inc/jquery.scrolly.min.js"></script>
			<script src="https://communitychange.org/wp-content/themes/c4cc-new/inc/deepak-dtw-main-skel.min.js"></script>
			<script src="https://communitychange.org/wp-content/themes/c4cc-new/inc/deepak-dtw-main-util.js"></script>
			<!--[if lte IE 8]><script src="https://communitychange.org/wp-content/themes/c4cc-new/inc/respond.min.js"></script><![endif]-->
			<script src="https://communitychange.org/wp-content/themes/c4cc-new/inc/deepak-dtw-main.js"></script>
			<!-- Latest compiled and minified JavaScript -->
   	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</body>
</html>