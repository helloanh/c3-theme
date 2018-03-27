<?php
/*
Template Name: Timeline
*/

wp_enqueue_script('jquery');
wp_enqueue_script('easing',get_template_directory_uri() . '/js/jquery.easing.1.3.js');
wp_enqueue_script('modernizr',get_template_directory_uri() . '/js/modernizr.custom.11333.js');
wp_enqueue_style('timeline',get_template_directory_uri() . '/inc/timeline.css');
get_header();
?>


	</div><!-- break out of .container from header -->

	<div id="timeline" class="site-main timeline container">
	<div id="primary" class="content-area container">
		<div id="content" class="site-content container" role="main">
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
						<!-- <button class="mobile-activator" data-name="show" id="mobile-activator"><?php the_title(); ?></button> -->
						<?php //wp_nav_menu( array(
								//'menu' 			=> get_field('section_nav'),
								//'menu_class' 	=> 'menu_dropdown',
							//)
						//); ?>
					</div>


					<nav id="decades" class="default">
			            <div class="ss-links" id="ss-links">
			                <a href="#1968">1968</a>
			                <a href="#1970s">1970s</a>
			                <a href="#1980s">1980s</a>
			                <a href="#1990s">1990s</a>
			                <a href="#2000s">2000s</a>
			                <a class="last" href="#2010s">What's Next</a>
			            </div>
					</nav>
					<div class="entry-content">
						<p>
							In 2012, the Center for Community Change marked the 45th anniversary of its founding. Through four and a half decades, we’ve employed an impressive range of strategies to advance our work, but our overriding goal is constant: to empower low-income people, particularly in communities of color, to make change that improves their communities and the public policies that affect their lives. Through every strand of our work, past and present, runs the conviction that those most affected by economic and social injustice are the best equipped to identify what change is necessary, and to make it happen. We carry this strategy forward as we reflect on our rich history today.
						</p>

					</div>

			            <div id="ss-container" class="ss-container">
			                <div class="rowYear">
			                    <h2 class = "year" id="1968">1968</h2>
			                </div>
			                <button id="1968-activator" class="mobile-dropper" data-name="show">1968</button>
			                <div class='ss-row ss-large'>
			                    <div class='dot'></div><div class='ss-left'>
			                        <a href="#" class='ss-circle ss-circle-1'></a>
			                    </div>
			                    <div class='ss-right'>
			                        <h3>
			                            In the 1960s, almost every facet of American life was transforming amidst world-changing social movements for the rights of African-Americans, women and farmworkers, and widespread resistance to war in Vietnam. Throughout the decade, the United States had made significant new federal investments to combat inequality through the War on Poverty, but the

			constraints of <span>institutionalized racism and lack of economic opportunity

			still made a meaningful transition out of poverty impossible</span> for millions

			of Americans, particularly those in communities of color.
			<em>Photo Credit: UPI/ Corbis-Betman</em>
			                        </h3>
			                    </div>
			                </div>
			                <div class='ss-row ss-medium'>
			                    <div class='dot'></div><div class='ss-left'>
			                      <h3>
			                            In April 1968, the United States lost its most respected and visionary

			leader for people of color and the poor with the assassination of Dr. Martin

			Luther King, Jr. – a tragedy that underscored entrenched resistance toward

			equality for African-American communities. Two months later, Robert F.

			Kennedy was killed after winning the California primary for the Democratic

			presidential nomination, and the country lost another of its highest-profile

			voices for the poor. <span>The Center for Community Change was created as the

			first project of the Robert F. Kennedy Memorial Foundation</span>, intended by

			his friends and colleagues to carry on his vision and values.
			                        </h3>
			                    </div>
			                    <div class='ss-right'>
			                        <a href="#" class='ss-circle ss-circle-2'></a>
			                    </div>
			                </div>

			                <div class='ss-row ss-medium'>
			                    <div class='dot'></div><div class='ss-left'>
			                        <a href="#" class='ss-circle ss-circle-3'></a>
			                    </div>
			                    <div class='ss-right'>
			                      <h3>
			                           In early years, CCC provided six community groups in California, Illinois,

			Mississippi and New Jersey with technical assistance, organizational

			development, planning and fundraising, and hands-on help with community

			organizing campaigns in their neighborhoods; within five years, that number

			expanded to 21 groups. More than four decades later, <span>we’ve worked with

			hundreds of grassroots groups and networks of low-income people

			that represent the diversity of life – and poverty – in the United States</span>:

			urban, suburban and rural geographies that are home to low-income AfricanAmerican, Latino, Asian, Native American, and white communities, as well as

			immigrants from around the world.
			<em>Photo Credit: Mary Ann Dolcemascolo</em>
			                        </h3>
			                    </div>
			                </div>


			                <div class='ss-row ss-medium'>
			                    <div class='dot'></div><div class='ss-left'>
			                      <h3> <!-- tf updated em tags to i to prevent styling issues 9-19-13 -->
			                           Among CCC’s first issues was one of poverty’s most harrowing: hunger.

			Within our first year, CCC published <i>Hunger USA</i>, a report on the extensive

			hunger and malnutrition that many were shocked to find within the United

			States. With momentum from press attention to the report, we sponsored the

			National Council on Hunger and Malnutrition, which is credited with <span>leading

			to the creation of the food stamps program</span> – which today helps almost 50

			million Americans.
			<em>Photo Credit: Mary Ann Dolcemascolo</em>

			                        </h3>
			                    </div>
			                    <div class='ss-right'>
			                        <a href="#" class='ss-circle ss-circle-4'></a>
			                    </div>
			                </div>

			            </div>
			            <div id="ss-container" class="ss-container">

			                <div class="rowYear">
			                        <h2 class = "year" id="1970s">1970</h2>
			                </div>
			                <button id="1970-activator" class="mobile-dropper" data-name="show">1970</button>

			                <div class='ss-row ss-large'>
			                    <div class='dot'></div><div class='ss-left'>
			                        <a href="#" class='ss-circle ss-circle-5'></a>
			                    </div>
			                    <div class='ss-right'>
			                      <h3>
			                            In the 1970s, the previous decade’s investments against poverty were

			decimated by program cuts and a shift to give local governments more

			control in how to allocate federal funds – which almost always means less

			investment in issues that matter to poor communities and communities

			of color. CCC created the National Citizens Monitoring Project to teach

			grassroots leaders how to <span>monitor local spending and challenge

			government officials in order to get the funding and investments their

			communities needed.</span>
			<em>Photo Credit: Earl Dotter</em>
			                        </h3>
			                    </div>
			                </div>
			                <div class='ss-row ss-large'>
			                    <div class='dot'></div><div class='ss-left'>
			                      <h3>
			                            While the Citizens Monitoring Project kept an eye on government spending,

			CCC helped partners use the new Community Reinvestment Act to ensure

			that private institutions were making loans and credit available to low-income communities. CCC created the Neighborhood Revitalization Project

			to <span>challenge banks that were discriminating against communities of

			color</span>, give partners the training and strategy they needed to increase private

			investment into their neighborhoods, and win regulatory changes that made

			it easier to examine the lending records of financial institutions.
			                        </h3>
			                    </div>
			                    <div class='ss-right'>
			                        <a href="#" class='ss-circle ss-circle-6'></a>
			                    </div>
			                </div>

			                <div class='ss-row ss-medium'>
			                    <div class='dot'></div><div class='ss-left'>
			                        <a href="#" class='ss-circle ss-circle-7'></a>
			                    </div>
			                    <div class='ss-right'>
			                      <h3>
			                           When neither government investment nor private funds were making

			enough of a difference, low-income organizations turned to the practice

			of community development, a strategy that CCC helped launch and spread

			throughout the country. <span>A community development corporation (CDC)

			creates its own economic enterprises – like building affordable housing

			or commercial developments – that provide jobs, services, and new

			revenue and activity in communities</span>. Although CCC no

			longer does community development work, today several thousand CDCs

			across the country generate millions of dollars in investments for critical

			jobs, affordable housing and commercial development that low-income

			communities can control and shape themselves.
			                        </h3>
			                    </div>
			                </div>
			            </div>
			            <div id="ss-container" class="ss-container">

			                <div class="rowYear">
			                    <h2 class = "year" id="1980s">1980</h2>
			                </div>
						    <button id="1980-activator" class="mobile-dropper" data-name="show">1980</button>
			                <div class='ss-row ss-medium'>
			                    <div class='dot'></div><div class='ss-left'>
			                      <h3>
			                            At the start of the 1980s, the largest tax cuts in U.S. history cost the country

			hundreds of billions in revenue, and social programs took vicious hits. CCC

			launched and supported many national coalitions to address the human

			suffering related to federal budget fallout, and <span>prevented billions of dollars

			in attempted budget cuts</span> to social programs.

			<em>Photo Credit: Earl Dotter</em>
			                        </h3>
			                    </div>
			                    <div class='ss-right'>
			                        <a href="#" class='ss-circle ss-circle-8'></a>
			                    </div>
			                </div>

			                <div class='ss-row ss-medium'>
			                    <div class='dot'></div><div class='ss-left'>
			                        <a href="#" class='ss-circle ss-circle-9'></a>
			                    </div>
			                    <div class='ss-right'>
			                      <h3>
			                           Drastic cuts to affordable housing programs created an acute homelessness

			crisis in the 1980s. The Center helped public housing residents organize to

			save their homes, work that would continue for decades and create a national

			network of housing residents that won national policy changes that mandated

			resident inclusion in housing boards. And CCC pioneered Housing Trust Fund

			campaigns, which secure ongoing sources of public funding for affordable

			housing in state and municipal budgets through real estate taxes or other

			revenue sources. Today this program <span>generates almost a billion

			dollars for affordable housing each year, making it the most successful

			affordable housing strategy in the United States</span>.
			                        </h3>
			                    </div>
			                </div>
			            </div>
			            <div id="ss-container" class="ss-container">

			                <div class="rowYear">
			                        <h2 class = "year" id="1990s">1990</h2>
			                </div>
						    <button id="1990-activator" class="mobile-dropper" data-name="show">1990</button>

			                <div class='ss-row ss-medium'>
			                    <div class='dot'></div><div class='ss-left'>
			                      <h3>
			                            Welfare reform in the 1990s drastically cut benefits to poor families –

			a major attack on the social programs that had served as insurance for

			Americans since the Great Depression. The Center launched the National

			Campaign for Jobs and Income Support to challenge the impression that

			these reforms had been effective in reducing suffering, and to counter the

			invisibility of poverty in a prosperous time. The campaign represented a

			shift toward <span>bringing local groups with varied interests and issues into

			one coordinated coalition to make change on national policy issues</span> –

			a strategy that set the stage for CCC’s broad range of national policy work

			today.
			                        </h3>
			                    </div>
			                    <div class='ss-right'>
			                        <a href="#" class='ss-circle ss-circle-10'></a>
			                    </div>
			                </div>

			                <div class='ss-row ss-medium'>
			                    <div class='dot'></div><div class='ss-left'>
			                        <a href="#" class='ss-circle ss-circle-11'></a>
			                    </div>
			                    <div class='ss-right'>
			                      <h3>
			                            Welfare reform set stringent work requirements for benefit recipients – but

			many people couldn’t even take for granted the means to get to and from

			a job. Low-income people are disproportionately likely to rely on public

			transit, but the municipal boards with the power to shut down a bus route

			almost never had representatives of the communities that relied on these

			services. CCC founded the Transportation Equity Network to push local

			decision-makers to <span>make public transit actually serve public needs</span>.

			The network won local victories that expanded or saved transit for poor

			communities and helped change federal transportation regulations to

			require disclosure and consultation with affected communities before local

			authorities made transit decisions.
			                        </h3>
			                    </div>
			                </div>

			            </div>
			            <div id="ss-container" class="ss-container">
			                <div class="rowYear">
			                    <h2 class = "year" id="2000s">2000</h2>
			                </div>
				            <button id="2000-activator" class="mobile-dropper" data-name="show">2000</button>
			                <div class='ss-row ss-large'>
			                    <div class='dot'></div><div class='ss-left'>
			                      <h3>
			                            In the new millennium, CCC made a major shift to empower grassroots

              partners to be effective not just in their communities, but also through

             efforts to inform and shape national policy debates. In 2003, the Center

             established the Campaign for Community Change, (now Center for Community

             Change Action), a 501(c)4 sister organization that can do <span>more targeted

             advocacy and organizing</span> around critical policy issues affecting low-income

             people. CCCAction helps grassroots leaders and organizations do even more

             assertive work in Washington, D.C. and around the country to push for

             the changes their communities need.
			                        </h3>
			                    </div>
			                    <div class='ss-right'>
			                        <a href="#" class='ss-circle ss-circle-12'></a>
			                    </div>
			                </div>

			                <div class='ss-row ss-medium'>
			                    <div class='dot'></div><div class='ss-left'>
			                        <a href="#" class='ss-circle ss-circle-13'></a>
			                    </div>
			                    <div class='ss-right'>
			                      <h3>
			                            We created the Community Voting Project in 2004 to help community

			organizing groups integrate voter outreach, registration, education and

			mobilization into their work – both to address the disproportionately low

			civic participation rates among people of color, and to connect potential

			voters to community organizations that are fighting for their interests 365

			days a year, not just on Election Day. At the time, it was a new strategy for

			the community organizing field; today, the majority of community organizing

			groups are doing civic engagement outreach and we see the <span>electoral

			impact of more engaged and mobilized communities of color</span> with each

			election cycle.
			                        </h3>
			                    </div>
			                </div>

			                <div class='ss-row ss-medium'>
			                    <div class='dot'></div><div class='ss-left'>
			                      <h3>
			                            CCC was one of the first national non-immigrant organizations to make

			comprehensive immigration reform a priority almost 15 years ago. In

			2004, we founded what is now the nation’s largest grassroots immigration

			coalition, the Fair Immigration Reform Movement (FIRM). We’ve mobilized

			and empowered immigrants to speak out about their place in this country

			and coordinated with national ally organizations to <span>set the stage for

			immigrants to take to the streets and to the ballot box to demand

			change</span>. Today, after more than a decade of organizing and the brave

			advocacy of immigrants, we and our allies continue the fight for

			comprehensive immigration reform that provides a path to citizenship

			for 11 million aspiring Americans.

			<em>Photo Credit: Jonathan Laurence/www.jonathanlaurence.com</em>
			                        </h3>
			                    </div>
			                    <div class='ss-right'>
			                        <a href="#" class='ss-circle ss-circle-14'></a>
			                    </div>
			                </div>

			                <div class='ss-row ss-medium'>
			                    <div class='dot'></div><div class='ss-left'>
			                       <a href="#" class='ss-circle ss-circle-15'></a>
			                    </div>
			                    <div class='ss-right'>
			                       <h3>
			                            We built on the work of our National Campaign for Jobs and Income Support

			with a push to improve working conditions and create meaningful job

			opportunity for low-income workers – a challenge that became only more

			urgent and challenging after the housing and economic crises deepened

			economic suffering across the country. Even as the economy recovers,

			<span>opportunity for many workers remains scarce for a variety of reasons

			including their prior experience and training, education level, age,

			primary language, or where they live</span>. Creating the opportunity for

			sustained and quality work for these constituencies remains a major focus of

			our economic justice organizing.
			                        </h3>
			                    </div>
			                </div>

			                <div class='ss-row ss-medium'>
			                    <div class='dot'></div><div class='ss-left'>
			                      <h3>
			                            CCC was already engaged with partner groups to push for a change to the

			health care system that left 40 million Americans without insurance for

			years before it became the flashpoint issue of President Obama’s first term.

			Amidst riotous debate, CCC and partners mobilized uninsured people across the

			country to center the health care debate around the <span>moral injustice of a

			system that routinely delivered death, disability and financial ruin to those

			without insurance</span> –thus shaping opinion in favor of reform that eventually

			constituted the biggest expansion of public benefits since CCC was founded.

			Since then, we’ve worked with partners to defend the funding for Social

			Security, Medicare and Medicaid, and make improvements that will better

			serve aging Americans and others who rely on these programs for their

			health and economic security.

			<em>Photo Credit: Courtesy of Health Care for America Now</em>
			                        </h3>
			                    </div>
			                    <div class='ss-right'>
			                        <a href="#" class='ss-circle ss-circle-16'></a>
			                    </div>
			                </div>
			            </div>
			            <div id="ss-container" class="ss-container">

			                <div class="rowYear">
			                    <h2 class = "year" id="2010s">What's Next</h2>
			                </div>
			                <button id="2010-activator" class="mobile-dropper" data-name="show">What's Next</button>

			 <!-- original code commented out by tf 10.7.13
			                <div class='ss-row ss-large'>
			                    <div class='dot'></div><div class='ss-left'>
			                      <a href="#" class='ss-circle ss-circle-30'></a>
			                    </div>
				-->
							<div class='ss-row ss-large'>
			                    <div class='dot'></div><div class='ss-left'>
			                      <iframe width="400" height="225" src="https://www.youtube.com/embed/hRhJ0sbu8c0?list=UUTBK-CO0QtCieo65DkWrN5w" frameborder="0" allowfullscreen style="margin-top:60px; padding-left:50px; padding-right:50px;"></iframe>
			                    </div>
			                    <div class='ss-right'>
			                        <h3>

			The Center for Community Change is humbled to reflect on the results of more

            than four decades of work with our partner groups – the organizing strategies

            we pioneered, the grassroots organizations we built, the vibrant coalitions we

            created, the policies that have changed for the better as a result of our work,

            and – perhaps most important – the <span>many thousands of low-income people who

            became social change leaders because of our training and support, and have since

            changed their communities and our country</span>. We know that our strategies are

            effective – and we need them now as much as ever. Poverty and its consequences in

            the United States are as dire today as in the tumultuous year of our founding, and

            the disproportionate rates of poverty among women and people of color constitute a

            moral crisis our nation must address. That’s why we commemorated our 45th anniversary

            by launching a major new national initiative to combat poverty in this country –

            and we hope you will join us.

		<!--	<em>Photo Credit: Jeffrey Lowy, courtesy of One Nation Working Together</em> -->
			                        </h3>
			                    </div>
			                </div>
						</div>
				</article>
			<?php endwhile; ?>
		</div><!-- #content -->
	</div><!-- #primary -->
    </div><!-- #timeline -->
		<script type="text/javascript">
		jQuery(function() {
			var menu = jQuery('#decades'),
				pos = menu.offset();

				jQuery(window).scroll(function(){
					if(jQuery(this).scrollTop() > pos.top+menu.height() && menu.hasClass('default')){
						menu.fadeOut('fast', function(){
							jQuery(this).removeClass('default').addClass('fixed').fadeIn('fast');
						});
					} else if(jQuery(this).scrollTop() <= pos.top && menu.hasClass('fixed')){
						menu.fadeOut('fast', function(){
							jQuery(this).removeClass('fixed').addClass('default').fadeIn('fast');
						});
					}
				});

			var $sidescroll	= (function() {
				if (jQuery(window).width() > 767) {
					// the row elements
				var $rows			= jQuery('#ss-container > div.ss-row'),
					// we will cache the inviewport rows and the outside viewport rows
					$rowsViewport, $rowsOutViewport,
					// navigation menu links
					$links			= jQuery('#ss-links > a'),
					// the window element
					$win			= jQuery(window),
					// we will store the window sizes here
					winSize			= {},
					// used in the scroll setTimeout function
					anim			= false,
					// page scroll speed
					scollPageSpeed	= 2000 ,
					// page scroll easing
					scollPageEasing = 'easeInOutExpo',
					// perspective?
					hasPerspective	= false,
					perspective		= hasPerspective && Modernizr.csstransforms3d,
					// initialize function
					init			= function() {
						// get window sizes
						getWinSize();
						// initialize events
						initEvents();
						// define the inviewport selector
						defineViewport();
						// gets the elements that match the previous selector
						setViewportRows();
						// if perspective add css
						if( perspective ) {
							$rows.css({
								'-webkit-perspective'			: 600,
								'-webkit-perspective-origin'	: '50% 0%'
							});
						}
						// show the pointers for the inviewport rows
						$rowsViewport.find('a.ss-circle').addClass('ss-circle-deco');
						// set positions for each row
						placeRows();
					},
					// defines a selector that gathers the row elems that are initially visible.
					// the element is visible if its top is less than the window's height.
					// these elements will not be affected when scrolling the page.
					defineViewport	= function() {
						jQuery.extend( jQuery.expr[':'], {
							inviewport	: function ( el ) {
								if ( jQuery(el).offset().top < winSize.height ) {
									return true;
								}
								return false;
							}
						});
					},
					// checks which rows are initially visible
					setViewportRows	= function() {
						$rowsViewport 		= $rows.filter(':inviewport');
						$rowsOutViewport	= $rows.not( $rowsViewport )
					},
					// get window sizes
					getWinSize		= function() {
						winSize.width	= $win.width();
						winSize.height	= $win.height();
					},
					// initialize some events
					initEvents		= function() {
						// navigation menu links.
						// scroll to the respective section.
						$links.on( 'click.Scrolling', function( event ) {
							// scroll to the element that has id = menu's href
							jQuery('html, body').stop().animate({
								scrollTop: jQuery( jQuery(this).attr('href') ).offset().top - 150
							}, scollPageSpeed, scollPageEasing );
							return false;
						});
						jQuery(window).on({
							// on window resize we need to redefine which rows are initially visible (this ones we will not animate).
							'resize.Scrolling' : function( event ) {
								// get the window sizes again
								getWinSize();
								// redefine which rows are initially visible (:inviewport)
								setViewportRows();
								// remove pointers for every row
								$rows.find('a.ss-circle').removeClass('ss-circle-deco');
								// show inviewport rows and respective pointers
								$rowsViewport.each( function() {
									jQuery(this).find('div.ss-left')
										   .css({ left   : '0%' })
										   .end()
										   .find('div.ss-right')
										   .css({ right  : '0%' })
										   .end()
										   .find('a.ss-circle')
										   .addClass('ss-circle-deco')
                                           .addClass('dot"');
								});
							},
							// when scrolling the page change the position of each row
							'scroll.Scrolling' : function( event ) {
								// set a timeout to avoid that the
								// placeRows function gets called on every scroll trigger
								if( anim ) return false;
								anim = true;
								setTimeout( function() {
									placeRows();
									anim = false;
								}, 10 );
							}
						});

					},
					// sets the position of the rows (left and right row elements).
					// Both of these elements will start with -50% for the left/right (not visible)
					// and this value should be 0% (final position) when the element is on the
					// center of the window.
					placeRows		= function() {
							// how much we scrolled so far
						var winscroll	= $win.scrollTop(),
							// the y value for the center of the screen
							winCenter	= winSize.height / 2 + winscroll;
						// for every row that is not inviewport
						$rowsOutViewport.each( function(i) {
							var $row	= jQuery(this),
								// the left side element
								$rowL	= $row.find('div.ss-left'),
								// the right side element
								$rowR	= $row.find('div.ss-right'),
								// top value
								rowT	= $row.offset().top;
							// hide the row if it is under the viewport
							if( rowT > winSize.height + winscroll ) {
								if( perspective ) {
									$rowL.css({
										'-webkit-transform'	: 'translate3d(-75%, 0, 0) rotateY(-90deg) translate3d(-75%, 0, 0)',
										'opacity'			: 0
									});
									$rowR.css({
										'-webkit-transform'	: 'translate3d(75%, 0, 0) rotateY(90deg) translate3d(75%, 0, 0)',
										'opacity'			: 0
									});
								}
								else {
									$rowL.css({ left 		: '-50%' });
									$rowR.css({ right 		: '-50%' });
								}
							}
							// if not, the row should become visible (0% of left/right) as it gets closer to the center of the screen.
							else {
									// row's height
								var rowH	= $row.height(),
									// the value on each scrolling step will be proporcional to the distance from the center of the screen to its height
									factor 	= ( ( ( rowT + rowH / 2 ) - winCenter ) / ( winSize.height / 2 + rowH / 2 ) ),
									// value for the left / right of each side of the row.
									// 0% is the limit
									val		= Math.max( factor * 50, 0 );
								if( val <= 0 ) {
									// when 0% is reached show the pointer for that row
									if( !$row.data('pointer') ) {
										$row.data( 'pointer', true );
										$row.find('.ss-circle').addClass('ss-circle-deco');
                                        $row.addClass('dot');
									}
								}
								else {
									// the pointer should not be shown
									if( $row.data('pointer') ) {
										$row.data( 'pointer', false );
										$row.find('.ss-circle').removeClass('ss-circle-deco');
									}
								}
								// set calculated values
								if( perspective ) {

									var	t		= Math.max( factor * 75, 0 ),
										r		= Math.max( factor * 90, 0 ),
										o		= Math.min( Math.abs( factor - 1 ), 1 );
									$rowL.css({
										'-webkit-transform'	: 'translate3d(-' + t + '%, 0, 0) rotateY(-' + r + 'deg) translate3d(-' + t + '%, 0, 0)',
										'opacity'			: o
									});
									$rowR.css({
										'-webkit-transform'	: 'translate3d(' + t + '%, 0, 0) rotateY(' + r + 'deg) translate3d(' + t + '%, 0, 0)',
										'opacity'			: o
									});
								}
								else {
									$rowL.css({ left 	: - val + '%' });
									$rowR.css({ right 	: - val + '%' });
								}
							}
						});
					};
				return { init : init };
				}
			})();
			$sidescroll.init();
		});
		jQuery(".mobile-dropper").click(function () {
	        jQuery(this).siblings().toggleClass( "show" );
		});

		</script>
<?php get_footer(); ?>
