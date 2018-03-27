<?php
/*
Template Name: Change Awards 2016
*/
wp_enqueue_script('jquery');
wp_enqueue_script('jquery-masonry');
wp_enqueue_script('imagesloaded',get_stylesheet_directory_uri().'/js/jquery.imagesloaded.min.js','jquery');
wp_enqueue_script('scrollto',get_stylesheet_directory_uri().'/js/jquery.scrollTo-1.4.3.1-min.js','jquery');
wp_enqueue_script('localscroll',get_stylesheet_directory_uri().'/js/jquery.localscroll-1.2.7-min.js','jquery');
wp_enqueue_script('bootstrap',get_stylesheet_directory_uri().'/js/bootstrap.min.js','jquery');
wp_enqueue_script('lightbox',get_stylesheet_directory_uri().'/js/bootstrap.lightbox.min.js','jquery');
wp_enqueue_script('cc-awards',get_stylesheet_directory_uri().'/js/cc-awards.js','jquery');

//get bootstrap css
wp_enqueue_style('bootstrap-style', get_stylesheet_directory_uri().'/inc/bootstrap.min.css');


get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content change-awards" role="main">

			<nav class="page">
		    	<ul class="clearfix">
		        	<li><a href="#honorees" class="page">Honorees</a></li>
		            <li><a href="#sponsorship" class="page">Sponsorship</a></li>
		            <li><a href="#photos" class="page">Photos</a></li>
		            <li><a href="#spirit-of-the-awards" class="page">Spirit of the Awards</a></li>
		            <li class="event-details">
		            	<time><?php the_field('time_of_event',2); ?></time>
		                <?php the_field('location_of_event',2); ?> &nbsp; <a target="_blank" href="<?php the_field('map_link',2); ?>">MAP &gt;&gt;</a>
		                
		            </li>
		        </ul>
		    </nav>
			<!-- tf added center top to style 4-29-14 -->
<header class="page" style="background: center top url(<?php $attachment_id = get_field('header_image',2); $size = 'header'; $image = wp_get_attachment_image_src( $attachment_id, $size ); echo $image[0]; ?>) no-repeat;"> 
		        <h1> Event Highlights 2016 </h1>
		        <section class="page clearfix event-photos-2016">
							<p class="text-center"> Thank you for attending our 2016 Change Champions Awards.  We hope to see you next year.  </p>
							<?php echo do_shortcode("[URIS id=6116]"); ?>
			</section>
		    	
			<h1>Honorary Host Committee</h1>
		        <div class="hononary-host-committee">
		        	<article>
		            	<?php the_field('honorary_host_committee', 2); ?>
		        	</article>
		        </div>
		    </header>
		    <section class="page clearfix honorees">
		    	<a class="anchor" id="honorees"></a>
		    	<h1>Honorees</h1>
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
		                            	<h1><?php the_title(); ?></h1>
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
		    
		        <!-- ***************** NEW SPONSORS SECTION 8.2.2016 ******************* -->
		        <h1 class="sponsors-section-title">This Year&rsquo;s Sponsors</h1>
		        <section class="page clearfix sponsors-2016-updated">
		            <div class="container">
		            	<div class="row champions-sponsors-row">
		            		<div class="col-lg-2">
		            		</div>
		            		<div class="col-lg-4">
		            			<h2 class="sponsors-type-header"> Champion </h2>
		            			<h3> SEIU </h3>
		            			
		            		</div>
		            		<div class="col-lg-4">
		            			<h2 class="sponsors-type-header"> Platinum </h2>
		            			<h3> Amalgamated Bank </h3>
		            			
		            		</div>
		            		<div class="col-lg-2">
		            		</div>
		            	</div><!-- end row champions-sponsors-row -->

		            	<div class="row gold-silver-bronze-sponsors-row">
		    	        	<div class="col-md-4">
		    	        		<h2> Gold </h2>
		    	        		<h3> Ed and Jan Booth </h3>
		    	        		<h3> Susan Sandler and Steve Philips </h3>
		    	        		<h3> United Food and Commercial Workers International Union, AFL-CIO, CLC </h3>
		    	        	</div> 
		    	        	<div class="col-md-4">
		    	        		<h2> Silver </h2>
		    	        		<h3> Friedrike Merck </h3>
		    	        		<h3> Gelman Rosenberg & Freedman </h3>
		    	        		<h3> Katrina vanden Heuvel, Editor and Publisher, &amp; The Nation</h3>
		    	        		<h3> Nia Community Foundation </h3>
		    	        		<h3> Planned Parenthood Action Fund </h3>
		    	        		<h3> Quinn Delaney and Wayne Jordan </h3>
		    		        	<h3> SCOPE LA (Strategic Concepts in Organizing &amp; Policy Education) </h3>
		    	        		<h3> UNITE HERE International Union </h3>
		    	        	</div>
		    	        	<div class="col-md-4">
		    	        		<h2> Bronze </h2>
		    	        		<h3> Barry and Paula Litt </h3>
		    	        		<h3> Democracy Alliance </h3>
		    	        		<h3> Hodge, Hart &amp; Schleifer, Inc.</h3>
		    	        		<h3> J Hannah Kranzberg </h3>
		    	        		<h3> Jeff and Karen Berman</h3>
		    	        		<h3> Susan Adelman and Claudio Llanos </h3>
		    	        		<h3> Tim Sweeney </h3>
		    	        	
		    	        	</div>
		            	</div> <!-- end row gold-silver-bronze-sponsors-row -->
		            	<div class="row supporter-sponsors-row">
		            		<div class="col-lg-12">
		            			<h2 class="sponsors-type-header"> Supporter </h2>
		            				<div class="row">
		            					<div class="col-md-6 col-xs-12">
		    		        				<h3> Arlene Holt Baker and Willie Baker </h3>
		    			        			<h3> Center on Budget and Policy Priorities </h3>
		    			        			<h3> Community Service Society of New York </h3>
		    			        			<h3> City First Bank of DC </h3>
		    			        			<h3> Diane Feeney </h3>
		    			        			<h3> Dorian Warren </h3>
		    			        			<h3> Elaine Reuben </h3>
		    			        			<h3> Gara LaMarche </h3>
		    			        			<h3> Harmon, Curran, Spielberg &amp; Eisenberg, LLP </h3>
		    			        			<h3> Jackie Jenkins-Scott </h3>
		    		        				<h3>Jane Fox-Johnson and Mitchell Johnson </h3>
		    		        				<h3>Janlori Goldman and Katherine Franke </h3>
		  	
		    			        		</div>
		    		        			<div class="col-md-6 col-xs-12">
		    		        				<h3>Jim and Suzanne Gollin </h3>
		    		        				<h3>Judy Patrick </h3>
		    		        				<h3>Karen Grove </h3>
		    		        				<h3>Karol Barger </h3>
		    		        				<h3>Lisa Garcia–Bedolla </h3>
		    		        				<h3>Manuel Pastor </h3>
		    		        				<h3>Mary M. Lassen and Martin Liebowitz </h3>
		    		        				<h3>Morris Family Foundation </h3>	
		    		        				<h3>Ryan Young and Matthew Layton</h3>
		    		        				<h3>Sarah Delaney </h3>
		    		        				<h3>Sam Karp and Janie Tyre</h3>
		    		        			</div>
		    		        		</div> <!-- row -->			
		            		</div>
		            	</div><!-- end row champions-sponsors-row -->
		            </div><!--  end container -->
		        </section> <!-- end page clearfix sponsors-2016-updated -->

		    <section class="page clearfix become-a-sponsor">
		        	<a class="anchor" id="sponsorship"></a>
		        	<h1>Become A Sponsor</h1>
		            <article>
		            	<?php the_field('about',1812); ?>
		                <ul class="sponsorship">
		                    <li class="sponsorship champion">
		                        <header>
		                            <h1>Champion</h1>
		                            <h2><?php the_field('contribution',1812); ?></h2>
		                        </header>
		                        <ul>
		                        	<li>Recognition of your sponsorship from the podium</li>
		                        	<li>Logo prominently featured on signage at event </li>
		                        	<li class="last-child">Recognition in press materials</li>
		                        </ul>
		                    </li>
		                    <li class="sponsorship levels">
		                        <ul>
		                            <li>
		                                <strong><?php the_field('level_2_title',1812); ?></strong>
		                                <?php the_field('level_2_contribution',1812); ?>
		                            </li>
		                            <li>
		                                <strong><?php the_field('level_3_title',1812); ?></strong>
		                                <?php the_field('level_3_contribution',1812); ?>
		                            </li>
		                            <li>
		                                <strong><?php the_field('level_4_title',1812); ?></strong>
		                                <?php the_field('level_4_contribution',1812); ?>
		                            </li>
		                            <li>
		                                <strong><?php the_field('level_5_title',1812); ?></strong>
		                                <?php the_field('level_5_contribution',1812); ?>
		                            </li>
		                            <li>
		                                <strong><?php the_field('level_6_title',1812); ?></strong>
		                                <?php the_field('level_6_contribution',1812); ?>
		                            </li>
		                        </ul>
		                    </li>
		                    <li class="sponsorship benefits">
		                        <strong><?php the_field('header',1812); ?></strong>
		                        <?php the_field('benefits',1812); ?>
		                    </li>
		                </ul>
		    		<!-- tf added changed page from 25 to 1812 4-29-14 -->
		                <a class="sponsor-today" href="<?php the_field('sponsor_today_link',1812); ?>" target="_blank">Sponsor Today!</a>
		            </article>
		        </section>
		    	<section class="page clearfix event-photos">
		    	<a class="anchor" id="photos"></a>
		    	<h1>2015 Event Photos</h1>
		    	<ul>
		    		<?php
		    		$query2 = new WP_Query('post_type=cca_eventphoto&posts_per_page=-1&order=ASC&orderby=menu_order');
		    		while( $query2->have_posts() ) : $query2->the_post();
		    		?>
		    		<li class="thumb-<?php the_field('thumbnail_size'); ?>" style="background: url(<?php $attachment_id = get_field('photo'); $thumbsize = get_field('thumbnail_size'); $size = 'thumb-' . $thumbsize; $image = wp_get_attachment_image_src( $attachment_id, $size ); echo $image[0]; ?>);">
		    			<button type="button" data-toggle="" data-target="#lightbox<?php the_ID(); ?>"><?php the_title(); ?></button>
		    		</li>
		    		<div id="lightbox<?php the_ID(); ?>" class="lightbox hide fade" tabindex="-1" aria-hidden="true">
		    			<div class='lightbox-content'>
		    				<img src="<?php $attachment_id = get_field('photo'); $size = 'full'; $image = wp_get_attachment_image_src( $attachment_id, $size ); echo $image[0]; ?>">
		    				<div class="lightbox-caption">
		    					<p><?php the_title(); ?></p>
		    				</div>
		    			</div>
		    		</div>
		    		<?php
		    		endwhile;
		    		wp_reset_postdata();
		    		?>
		    	</ul>
		    </section>


		    <section class="page clearfix spirit-of-the-awards">
		    	<a class="anchor" id="spirit-of-the-awards"></a>
		    	<h1>Spirit of the Awards</h1>
		        <section class="sota-explanation">
		        	<?php the_field('explanation',1829); ?>
		        </section>
		        <section class="sota-recognitions">
		        	<?php the_field('recognitions',1829); ?>
		        </section>
		        <section class="sota-invitation">
		        	<?php the_field('invitation',1829); ?>
		        </section>
		        <a class="buy-tickets" target="_blank" href="<?php the_field('buy_tickets_link',2); ?>">Buy Tickets</a>
		    </section>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
