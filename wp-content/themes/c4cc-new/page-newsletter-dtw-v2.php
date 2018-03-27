<?php
/*
* Template Name: Newsletter DTW V2
* By Anh K. Hoang
*/
get_header('newsletter-dtw'); ?>
<body class="landing">
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
											<li><a href="#a-new-generation">In These Times</a></li>
											<li><a href="#ccc-on-the-move">CCC On The Move</a></li>
											<li><a href="#in-case-you-missed-it">In Case You Missed It</a></li>
											<li><a href="http://signup.communitychange.org/page/s/center-signup">Subscribe</a></li>
											<li><a href="https://join.communitychange.org/page/contribute/donate-now-center-for-community-change">Donate</a></li>
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
						<a href="#a-new-generation" class="more scrolly" ></a>
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<p class="text-center">
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
								<p class="text-justify">
								<?php if (get_field('in_these_times_full_text')):?>
									<?php the_field('in_these_times_full_text');?>
								<?php endif;?>
							  </p>
								<em><strong style="color: #b4436c; font-size: 14px;"><img class="alignleft" src="https://www.communitychange.org/wp-content/uploads/2015/08/Dorian-Warren.jpg" alt="kica-round-img" width="95" height="95" /></strong></em><br>

								<span id="kica-text">By Dorian Warren<br>
								CCCA President</span>
							</header>
						</div>
					</section>

					<section id="ccc-on-the-move" class="wrapper style3 special">
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
							<header class="major on-the-move text-center" style="padding-top:60px;padding-bottom:0px;margin-bottom:10px;">
								<h2>In Case You Missed It</h2>
							</header>
						</div>
						<section class="spotlight">
							<div class="image"><a href="http://bit.ly/2vpufYp"><img src="https://commchange.bsd.net/page/-/At-The-Center-Newsletter/dorian-msnbc.jpg" alt="dorian-warren-on-msnbc" /></a></div><div class="content">
								<h3>CCCA President Dorian Warren on MSNBC</h3>
								<p>CCCA President Dorian Warren was a guest on MSNBC to discuss the ongoing health care debate. In an extensive discussion, Dorian highlighted the real-world impact on Americans if the GOP takes away their medical care. He also discussed the political implications of taking Medicaid from people who need it in order to give tax breaks to the rich.</p>
							</div>
						</section>
						
						<section class="spotlight">
							<div class="image"><a href="http://nyti.ms/2uZZAim"><img src="https://commchange.bsd.net/page/-/At-The-Center-Newsletter/countryilovebw-cropped.jpg" alt="the-country-i-love" /></a></div><div class="content">
							<h3>The Country I Love</h3>
									<p>
									The Hon. Pramila Jayapal, U.S. Representative from Washington’s seventh district and former CCC Taconic Fellow, shared her story of citizenship and service in a New York Times opinion piece, The Country I Love.
									</p>
							</div>
						</section>
						<section class="spotlight">
							<div class="image"><a href="http://bit.ly/2fa9CJM"><img src="https://commchange.bsd.net/page/-/At-The-Center-Newsletter/cropped-letterbw.jpg" alt="letters-from-families-on-medicaid" /></a></div><div class="content">
									<h3>Letters from Concerned Families on Medicaid</h3>
										<p>CCC/CCCA staff and CCCA President Dorian Warren starred in a moving video in which they read letters from families who would suffer if they lost access to medical treatment that Medicaid provides. The video, produced by CCC content creator Cristina Rayas, called on all of us as Americans to choose what kind of country we want: One that protects working families or one that protects the uber rich. </p>
							</div>
						</section>
						<section class="spotlight">
							<div class="image"><a href="http://cnn.it/2sYbzxI"><img src="https://commchange.bsd.net/page/-/At-The-Center-Newsletter/grandmother-cropped.jpg" alt="as-my-grandmothers-world-darkens-marisol-cnn" /></a></div>
							<div class="content">
							<h3>As My Grandmother’s World Darkens, Medicaid Helps Preserve Her Dignity</h3>
									<p>
								CCC Director of Content Strategies and Development Marisol Bello wrote about the impact that potential Medicaid cuts would have on her 90-year-old grandmother, an immigrant from the Dominican Republic who suffers from Alzheimer’s. In the piece, which was published by CNN, Marisol writes about how Medicaid pays for home care aids that bathe, feed and clothe her grandmother, the star chef in the family who now cannot remember how to work a stove.
									</p>
							</div>
						</section>
					</section>
				
				<!-- CTA -->
					<section id="cta" class="wrapper style4">
						<div class="inner">
							<header>
								<h2>Join The Movement</h2>
								<p>Follow and support our latest organizing work.</p>
							</header>
							<ul class="actions vertical">
								<li><a href="http://signup.communitychange.org/page/s/ia-monthly-newsletter" class="button fit special" style="background-color:#26211d;">Subscribe</a></li>
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
							<li>&copy; Copyright 2017 </li><li><a href="https://communitychange.org">Center for Community Change</a></li>
							<li><a href="https://www.linkedin.com/in/anhkimhoang/">Developer</a></li>
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