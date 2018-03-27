<?php
/*
Template Name: Change Awards 2018
*/
wp_enqueue_script('jquery');
wp_enqueue_script('jquery-masonry');
wp_enqueue_script('imagesloaded',get_stylesheet_directory_uri().'/js/jquery.imagesloaded.min.js','jquery');
wp_enqueue_script('scrollto',get_stylesheet_directory_uri().'/js/jquery.scrollTo-1.4.3.1-min.js','jquery');
wp_enqueue_script('localscroll',get_stylesheet_directory_uri().'/js/jquery.localscroll-1.2.7-min.js','jquery');
wp_enqueue_script('lightbox',get_stylesheet_directory_uri().'/js/bootstrap.lightbox.min.js','jquery');
wp_enqueue_script('cc-awards',get_stylesheet_directory_uri().'/js/cc-awards.js','jquery');

get_header('legacy');
?>
<style>
	body#body-awards header.page {
	     padding-top: 0px; 
	}

	body#body-awards a.page {
		font-family: bebasneue;
	}

	body#body-awards .event-details a {
    color: #f9a61a;
    font-family: bebasneue;
}

	body#body-awards header.page li:after {
	    display: none;
	}

	body#body-awards section.page h1 {
	    margin: 20px 0px 0px;
	    font-family: sourcesansprobold;
	    background: #144b7d;
	    padding-left: 10px;
	}
	body#body-awards section.page.honorees h1 {
		    font-family: sourcesansprobold;
	}

	body#body-awards h2.honoree-name {
	    font-family: sourcesanspro,Helvetica,Arial,sans-serif;
	    padding-top: 12px;
	}

	section.awards-event-header img {
		width: 100%;
	}

</style>
	<div id="primary" class="content-area container">
		<div id="content" class="site-content change-awards" role="main">
			<nav class="page">
		    	<ul class="clearfix">
								<li><a href="#this-years-honorees" class="page">2018 Honorees</a></li>
								<li><a href="#nominate-a-champion" class="page">Nominate a Champion</a></li>
								<li><a href="#spirit-of-the-awards" class="page">Spirit of the Awards</a></li>
								<li><a href="#event-photos" class="page">Event Photos</a></li>
								<li><a href="#sponsors" class="page">Sponsors</a></li>
								<li><a href="#join-us-2018" class="page">Spirit of the Awards</a></li>
								<li><a href="#previous-year-honorees" class="page">Previous Honorees</a></li>
		            <!-- <li class="event-details page">
		            	<time><a href="http://thehowardtheatre.com/">Howard Theatre</a></time>
		            </li> -->
		        </ul>
		    </nav>
			<!-- tf added center top to style 4-29-14 -->
		<header class="page" >
			<section class="awards-event-header">
				<img src="https://communitychange.org/wp-content/uploads/2018/03/awards-banner-temp.png">
			</section>
		</header>
			<section class="page clearfix">
				<a class="anchor"></a>
				<h1>Join Us</h1>
			    <section id="join-us-1018">
			    	<p>Together we will celebrate our first fifty years, drawing courage from the legacy of leaders across our last half-century as we step together into the next one. </p>
			    	<div class="row">
						<div class="col-md-4 col-xs-12 col-md-offset-1">
							<p class="text-center">
								<i class="fa fa-4x fa-ticket"></i><br>Purchase Tickets
			    			</p>
						</div><!-- col-lg-3 col-xs-12 -->
						<div class="col-md-6 col-xs-12">
							<p class="text-center icon">
								<i class="fa fa-4x fa-bullhorn"></i><br>Sponsor the Event
					    	</p>
						</div><!-- col-lg-3 col-xs-12 -->
					</div><!-- first row end -->
					<div class="row">
						<div class="col-lg-12">
							<p>
								Not able to join us on September 27? Participate in spirt by placing a message on our <a style="color:#144b7d;" href="https://join.cccaction.org/page/contribute/movement-moments-wall-tickets">	
								Movement Moments Wall</a>! For more information contact Susan Rightsell at 202-393-9332 or srightsell@communitychange.org.
							</p>
						</div
					</div>
			    </section>
			</section>
			<section class="page honorees" id="this-years-honorees">
				<h1 class="special-header"> This Year's Honorees </h1>
				<div class="honoree-2017-container">
					<div class="row">
						<div class="col-lg-4 col-md-6 col-xs-12 col-lg-offset-1">
							<a href="http://fairimmigration.org/"><img class="img-honoree-2017" src="https://communitychange.org/wp-content/uploads/2018/03/firm.png"></a>
							<h2 class="honoree-name"> Champion in Community Activism </h2>
							<p> Fair Immigration Reform Movement</p>
						</div><!-- col-lg-3 col-xs-12 -->
						<div class="col-lg-4 col-md-6 col-xs-12 col-lg-offset-1">
							<a href="http://www.jpbfoundation.org/"><img class="img-honoree-2017" src="https://communitychange.org/wp-content/uploads/2018/03/barbara-1.png"></a>
							<h2 class="honoree-name"> Champion in Philanthropic Leadership </h2>
							<p> Barbara Picower, President, The JPB Foundation</p>
						</div><!-- col-lg-3 col-xs-12 -->
					</div><!-- first row end -->
				</div><!-- container honoree-2017-container end -->
			</section>


			<section class="page clearfix nominate-a-champion" id="nominate-a-champion">
				<a class="anchor"></a>
				<h1>Nominate a Champion</h1>
					<div class="container-nominate">
				   		<p>Established by CCC and the Petra Foundation in 2016, the Emerging Change Champion Award supports and celebrates a rising star in the economic and social justice movement who has shown outstanding leadership in our shared work to build power for low-income communities of color. <br>
						Nominations will be accepted through May 14, 2018. 
				   		</p>
				   		<p class="text-center"><a href="https://communitychange.org/emerging-change-champions-nomination-2018/"><button class="btn btn-info">Nomination Form Here </button></a></p>
				   	</div>
			</section>
			    
		  	<!-- Spirit of the Awards -->
			<section class="page clearfix spirit-of-the-awards" id="spirit-of-the-awards">
				<a class="anchor"></a>
				<h1>Spirit of the Awards</h1>
			    <section class="sota-explanation" >
			    	<p>We celebrate the work that often goes unheralded, and the people and organizations that keep our vision for a just world alive. Too frequently, we focus only on the final outcome of a campaign instead of taking a moment to honor the often-unsung heroes behind the scenes. The Community Change Champions Awards were created to do just that: to recognize the people and organizations whose work is making progress toward social justice a reality. </p>
			    </section>
			   	<section class="sota-recognitions">
					    <p>The <strong>organizers and leaders</strong> who inspire people to identify the changes they need and take action to fight for them.<p>
					    <p>The <strong>public servants</strong> who carry the voices of the people with them into the corridors of power.</p>
					    <p>The <strong>artists and thinkers</strong> who envision a more just future, and what it will take to get us all there.</p>
					    <p>The <strong>donors and philanthropists</strong> who help build a broader movement by connecting people with resources that help them fight for change.</p>
					    <p>Our partners in the <strong>labor movement</strong>, who share CCC’s commitment to rights and opportunity for hard-working people.</p>
					    <p>The <strong>organizations</strong> that bring people together and build their communities with grassroots power.</p>
					    <p>And the <strong>activists</strong> who demonstrate bravery, determination and resolve, even when the obstacles seem insurmountable and change seems out of reach.</p>

			    	</ul>
			    </section>
			</section>
				<!-- Previous Year Honorees -->
			    <section class="page honorees" id="previous-year-honorees">
			    	<a class="anchor" id="honorees"></a>
			    	<h1 class="special-header">Previous Honorees</h1>
					<div id="myCarousel" class="carousel slide">
			        	<div class="the-slider"></div>
						<div class="carousel-inner">
			                <?php
							$categories=get_categories('taxonomy=cca_year&orderby=name');
							foreach ($categories as $cat) {
							?>
			                <div class="item">
			                	<ul class="honoree-nav">
									<?php
			                        $the_query = new WP_Query('post_type=cca_honoree&posts_per_page=5&order=ASC&orderby=menu_order&cca_year='.$cat->cat_name);
			                        while ($the_query->have_posts()) : $the_query->the_post();
			                        ?>
			                        <?php if(get_field('year') == 'previous'){ ?>
			                        <li class="honoree-group" style="background: url(<?php $attachment_id = get_field('group_picture'); $size = 'honoree-group'; $image = wp_get_attachment_image_src( $attachment_id, $size ); echo $image[0]; ?>) no-repeat;">
			                        <?php } elseif(get_field('thumbnail_picture')){ ?>
			                        <li style="background: url(<?php $attachment_id = get_field('thumbnail_picture'); $size = 'thumb-small'; $image = wp_get_attachment_image_src( $attachment_id, $size ); echo $image[0]; ?>);">
			                        <?php } else { ?>
			                        <li style="background: url(<?php $attachment_id = get_field('picture'); $size = 'honoree-200'; $image = wp_get_attachment_image_src( $attachment_id, $size ); echo $image[0]; ?>);">
			                        <?php } ?>
			                        <?php if(get_field('year') == 'previous'){ ?>
			                        	<article>
			                            	<h1 class="special-header"><?php the_title(); ?></h1>
			                                <?php the_field('honorees'); ?>
			                            </article>
			                        <?php } else{ ?>
			                            <button type="button" class="launch-honoree" id="b-<?php echo the_ID(); ?>">
			                                <strong><?php the_title(); ?></strong>
			                                <?php the_field('description'); ?>
			                            </button>
			                        <?php } ?>
			                        </li>
			                        <?php
			                        endwhile;
			                        ?>
			                    </ul>
							</div>
							<?php
			                }
			                wp_reset_query();
			                ?>
						</div>
			            <?php
						$categories=get_categories('taxonomy=cca_year&orderby=name');
						foreach ($categories as $cat) {
			            	$the_query = new WP_Query('post_type=cca_honoree&posts_per_page=5&order=ASC&orderby=menu_order&cca_year='.$cat->cat_name);
			            	while ($the_query->have_posts()) : $the_query->the_post();
			            ?>
			            <article class="about-honoree clearfix" id="a-<?php echo the_ID(); ?>">
			                <img src="<?php $attachment_id = get_field('picture'); $size = 'honoree'; $image = wp_get_attachment_image_src( $attachment_id, $size ); echo $image[0]; ?>" title="<?php the_title(); ?>" />
			                <h1><?php the_title(); ?></h1>
			                <?php the_field('about'); ?>
			                <button type="button" class="close-btn">close</button>
			            </article>
			            <?php
			            	endwhile;
						}
			            wp_reset_query();
			            ?>
					</div>
			        <nav>
			        	<p><?php the_field('year_navigation_blurb',1841); ?></p>
			            <ol>
			            	<?php
			                $terms_year = get_terms('cca_year');
							$count_year = count($terms_year); $i=0;
							if ($count_year > 0) {
								foreach ($terms_year as $term_year) {
									$i++;
									$term_list_year .= '<li><button type="button" title="' . sprintf(__('View honorees from %s', 'my_localization_domain'), $term_year->name) . '" data-target="#myCarousel" data-slide-to="0">' . $term_year->name . '</button></li>';
								}
								echo $term_list_year;
							}
							?>
			            </ol>
			        </nav>
			        <article class="about-honorees clearfix">
						<?php the_field('about',1841); ?>
			        </article>
			  	</section>
			  	<!-- End Previous Year Honorees -->
			  	<!-- Facebook Album Embed -->
			  	<section class="page clearfix spirit-of-the-awards" id="event-photos">
			  		<h1>Last Year Event Photos</h1>
			  	   	<section class="sota-recognitions">
			  		<!-- <div class="fb-post" data-href="https://www.facebook.com/media/set/?set=a.10155922044326661.1073741835.5970146660&amp;type=3" data-width="750" data-show-text="true"><blockquote cite="https://www.facebook.com/media/set/?set=a.10155922044326661.1073741835.5970146660&amp;type=3" class="fb-xfbml-parse-ignore"><p>Photos from our 13th Annual Change Champions Awards where we celebrated heroes on the frontlines of resistance from...</p>Posted by <a href="https://www.facebook.com/communitychange/">The Center for Community Change</a> on&nbsp;<a href="https://www.facebook.com/media/set/?set=a.10155922044326661.1073741835.5970146660&amp;type=3">Wednesday, October 18, 2017</a></blockquote></div> -->
			  	    <?php photo_gallery(1); ?>
			  	    </section>
			  	</section>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>
