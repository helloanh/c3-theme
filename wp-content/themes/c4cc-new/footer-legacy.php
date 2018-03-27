<?php
/**
 * Template Name: Legacy Footer
 */
?>

<section id="join-us" class="pane-section">
	<div class="join-us-form">
        <div class="container">
            <h2>Join Us</h2>
	        <?= SNQuery::open('join-us-form'); ?>
                <div class="row">
                    <div class="col-md-4  col-sm-6 col-xs-12">
                        <?= SNQuery::field('email'); ?>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
	                    <?= SNQuery::field('firstname'); ?>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
	                    <?= SNQuery::field('lastname'); ?>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-12">
	                    <?= SNQuery::field('submit'); ?>
                    </div>
                </div>
	        <?= SNQuery::close(); ?>
        </div>
    </div>
    <div class="join-us-actions">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-xs-4 ele-right">
                    <a href="#" class="jua-btn">Contact Us</a>
                </div>
                <div class="col-sm-4 col-xs-4 ele-center">
                    <a href="#" class="jua-btn align-two-lines">Join Our Team</a>
                </div>
                <div class="col-sm-4 col-xs-4 ele-left">
                    <a href="#" class="jua-btn">Donate</a>
                </div>
            </div>
        </div>
    </div>
</section>

<footer>
	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-12 footer-left-bloc">
					<div class="row">
						<div class="col-md-2 col-sm-6 col-xs-12">
							<h4>Career</h4>
							<h4>Contact</h4>
							<h4>Donate</h4>
                            <?=
                            ccc_social_share(
                                WP_HOME,
                                get_bloginfo('title'),
                                get_bloginfo('description'),
                                ['facebook', 'twitter'],
                                'home-social-links'
                            );
                            ?>
						</div>
						<div class="col-md-4 col-sm-6 col-xs-12">
							<h4>Contact</h4>
							<ul>
								<li>Center for Community Change 1536 U Street NW Washington, DC 20009</li>
								<li>202.339.9300</li>
								<li><a href="mailto:info@communitychange.org">info@communitychange.org</a></li>
							</ul>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<h4>About</h4>
							<ul>
								<li><a href="#">Mission</a></li>
								<li><a href="#">Staff</a></li>
								<li><a href="#">Campaigns</a></li>
							</ul>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<h4>Quick Links</h4>
							<ul>
								<li><a href="#">Donate</a></li>
								<li><a href="#">Press Releases</a></li>
								<li><a href="#">Campaigns</a></li>
								<li><a href="#">Blog</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-12">
					<div class="row">
						<div class="col-xs-10 col-xs-offset-1 footer-right-bloc">
							<div class="check-out-c4-txt">
								<h5>Check out our sister organization:</h5>
							</div>

		                	<img class="img-responsive c4-logo-footer" alt="cccaction logo" src="<?= asset('images/footer-right-bloc.png') ?>">
	                	</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="under-footer">
		<div class="container">
			<div class="logos">
                <ul>
                    <li><a href="#"><img class="img-responsive" src="<?= asset('images/logo.png') ?>" alt="CCC Logo"></a></li>
                    <li><a href="#"><img class="img-responsive" src="<?= asset('images/4Star2015.jpg') ?>" alt="Charity Navigator 4 starts"></a></li>
                    <li><a href="#"><img class="img-responsive" src="<?= asset('images/bestorgs2015.jpg') ?>" alt="Best orgs 2015"></a></li>
                </ul>
			</div>
			<div class="links">
				<ul>
					<li><a href="#">Privacy Policy</a></li>
					<li><a href="#">Terms of Use</a></li>
					<li><a href="#">Financial Information</a></li>
				</ul>
			</div>
		</div>
	</div>
    <?php //wp_footer(); ?>
</footer>
<script type="text/javascript">
			jQuery(document).ready(function(){
				// Carousel
				var currentSelection = 0;
				var isAnimating = false;
				jQuery('nav.timeline').on('click', 'button', function(){
					var newSelection = jQuery(this).index();
					if( newSelection === currentSelection || isAnimating ){
						return false;
					}
					var travelSteps = Math.abs(currentSelection - newSelection);
					var travelDistance = travelSteps * 192;
					var currentItems = jQuery('.current').children();
					var newItems = jQuery('.timeline-carousel ul').eq(newSelection).children();
					isAnimating = true;
					if( newSelection > currentSelection ){
						travelDistance = '+=' + travelDistance;
						jQuery('.marker').animate({ marginLeft: travelDistance }, (currentItems.length * 90) + (newItems.length * 90) );
						jQuery('.timeline-carousel .current').attr('class','moveToLeft');
						jQuery('nav.timeline .current').removeClass('current');
						jQuery(this).addClass('current');
						setTimeout( function(){
							jQuery('.timeline-carousel ul').eq(newSelection).attr('class','moveFromRight');
						}, currentItems.length * 90 );
						setTimeout( function(){
							jQuery('.timeline-carousel ul').eq(newSelection).addClass('current');
							currentSelection = newSelection;
							isAnimating = false;
						}, (currentItems.length * 90) + (newItems.length * 90) );
					}
					else if( newSelection < currentSelection ){
						travelDistance = '-=' + travelDistance;
						jQuery('.marker').animate({ marginLeft: travelDistance }, (currentItems.length * 90) + (newItems.length * 90) );
						jQuery('.timeline-carousel .current').attr('class','moveToRight');
						jQuery('nav.timeline .current').removeClass('current');
						jQuery(this).addClass('current');
						setTimeout( function(){
							jQuery('.timeline-carousel ul').eq(newSelection).attr('class','moveFromLeft');
						}, currentItems.length * 90 );
						setTimeout( function(){
							jQuery('.timeline-carousel ul').eq(newSelection).addClass('current');
							currentSelection = newSelection;
							isAnimating = false;
						}, (currentItems.length * 90) + (newItems.length * 90) );
					}
				});

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

			jQuery(".mobile-dropper").click(function () {
	        	jQuery(this).siblings().toggleClass( "show" );
			});
</script>
</body>
</html>
