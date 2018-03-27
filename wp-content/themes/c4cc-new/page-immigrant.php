<?php
/*
Template Name: Immigrant Timeline
*/
get_header();
?>

	</div><!-- break out of .container from header -->

	<div id="immigrant" class="site-main">

	<div id="primary" class="content-area">
		<div id="content" class="site-content container " role="main">
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

				    <div class="timeline-carousel">
				    	<ul class="current">
				        	<li class="intro">
								<h2>They didn&rsquo;t set out to change a nation, just a single law.</h2>
								<p>For many of the people who would make it their mission to transform the country&rsquo;s cruel and dysfunctional immigration system, it would be the hardest thing they would ever do, and perhaps the most important.</p>
								<p>As the organization that launched, staffs and coordinates the national coalition called FIRM (Fair Immigration Reform Movement), the Center for Community Change has played a crucial and largely hidden role in seeking this historic social change.</p>
								<p>Please join us on the journey that is not yet finished. In this timeline you can visit high points – and low points – of CCC, FIRM and the long road to immigration reform.</p>
				            </li>
				        </ul>
				        <ul id="y2000-2005">
				        	<li>
				            	<button type="button" id="y2000" style="background: url(<?php echo get_template_directory_uri(); ?>/inc/images/t-2000.jpg);">
				                	<span class="arrow"></span>
				                	<strong>2000</strong>
				                    <span>Immigrant Organizing Committee takes its first action.</span>
				                </button>
				            </li>
				            <li>
				            	<button type="button" id="y2001" style="background: url(<?php echo get_template_directory_uri(); ?>/inc/images/t-2001.jpg);">
				                	<span class="arrow"></span>
				                	<strong>2001</strong>
				                    <span>9/11 sets back immigration reform efforts.</span>
				                </button>
				            </li>
				            <li>
				            	<button type="button" id="y2002" style="background: url(<?php echo get_template_directory_uri(); ?>/inc/images/t-2002.jpg);">
				                	<span class="arrow"></span>
				                	<strong>2002</strong>
				                    <span>CCC and IOC build statewide immigrant rights groups.</span>
				                </button>
				            </li>
				            <li>
				            	<button type="button" id="y2003" style="background: url(<?php echo get_template_directory_uri(); ?>/inc/images/t-2003.jpg);">
				                	<span class="arrow"></span>
				                	<strong>2003</strong>
				                    <span>Immigrant Organizing Committee evolves into FIRM.</span>
				                </button>
				            </li>
				            <li>
				            	<button type="button" id="y2004" style="background: url(<?php echo get_template_directory_uri(); ?>/inc/images/t-2004.jpg);">
				                	<span class="arrow"></span>
				                	<strong>2004</strong>
				                    <span>FIRM, DREAMers and voters.</span>
				                </button>
				            </li>
				            <li>
				            	<button type="button" id="y2005" style="background: url(<?php echo get_template_directory_uri(); ?>/inc/images/t-2005.jpg);">
				                	<span class="arrow"></span>
				                	<strong>2005</strong>
				                    <span>A FIRM campaign saves a young woman from deportation.</span>
				                </button>
				            </li>
				        </ul>
				        <ul id="y2006-2010">
				        	<li>
				            	<button type="button" id="y2006" style="background: url(<?php echo get_template_directory_uri(); ?>/inc/images/t-2006.jpg);">
				                	<span class="arrow"></span>
				                	<strong>2006</strong>
				                    <span>Massive marches nationwide.</span>
				                </button>
				            </li>
				            <li>
				            	<button type="button" id="y2007" style="background: url(<?php echo get_template_directory_uri(); ?>/inc/images/t-2007.jpg);">
				                	<span class="arrow"></span>
				                	<strong>2007</strong>
				                    <span>Culture wars and presidential politics.</span>
				                </button>
				            </li>
				            <li>
				            	<button type="button" id="y2008" style="background: url(<?php echo get_template_directory_uri(); ?>/inc/images/t-2008.jpg);">
				                	<span class="arrow"></span>
				                	<strong>2008</strong>
				                    <span>Raids and votes.</span>
				                </button>
				            </li>
				            <li>
				            	<button type="button" id="y2009" style="background: url(<?php echo get_template_directory_uri(); ?>/inc/images/t-2009.jpg);">
				                	<span class="arrow"></span>
				                	<strong>2009</strong>
				                    <span>A powerful new tool for building a movement.</span>
				                </button>
				            </li>
				            <li>
				            	<button type="button" id="y2010" style="background: url(<?php echo get_template_directory_uri(); ?>/inc/images/t-2010.jpg);">
				                	<span class="arrow"></span>
				                	<strong>2010</strong>
				                    <span>FIRM pushes for action.</span>
				                </button>
				            </li>
				        </ul>
				        <ul id="present">
				        	<li>
				            	<button type="button" id="y2011" style="background: url(<?php echo get_template_directory_uri(); ?>/inc/images/t-2011.jpg);">
				                	<span class="arrow"></span>
				                	<strong>2011</strong>
				                    <span>Change Takes Courage</span>
				                </button>
				            </li>
				            <li>
				            	<button type="button" id="y2012" style="background: url(<?php echo get_template_directory_uri(); ?>/inc/images/t-2012.jpg);">
				                	<span class="arrow"></span>
				                	<strong>2012</strong>
				                    <span>Relief for DREAMers and power at the polls.</span>
				                </button>
				            </li>
				            <li>
				            	<button type="button" id="y2013" style="background: url(<?php echo get_template_directory_uri(); ?>/inc/images/t-2013.jpg);">
				                	<span class="arrow"></span>
				                	<strong>2013</strong>
				                    <span>Progress and pressure.</span>
				                </button>
				            </li>
				            <li>
				            	<button type="button" id="y2014" style="background: url(<?php echo get_template_directory_uri(); ?>/inc/images/t-2014.jpg);">
				                	<span class="arrow"></span>
				                	<strong>2014</strong>
				                    <span>Administrative Relief and an end to deportations.</span>
				                </button>
				            </li>
				            <li>
				            	<button type="button" id="whatsnext" style="background: url(<?php echo get_template_directory_uri(); ?>/inc/images/t-whatsnext.jpg);">
				                	<span class="arrow"></span>
				                	<strong>What&rsquo;s Next?</strong>
				                    <span>Join us on this unfinished journey.</span>
				                </button>
				            </li>
				        </ul>
				        <nav class="timeline">
				    		<button type="button" class="current">Intro</button>
				        	<button type="button">2000–2005</button>
				        	<button type="button">2006–2010</button>
				        	<button type="button">2011–Present</button>
				        	<span class="marker"></span>
				    	</nav>
				    </div>

				    <article class="timeline-overlay clearfix" id="y2000o">
				    	<div class="the-slider"></div>
				    	<div>
				        	<button type="button">close</button>
				            <h1 class="mobile-dropper">2000: Immigrant Organizing Committee takes its first action.</h1>
				            <section>
				                <figure>
				                    <img src="<?php echo get_template_directory_uri(); ?>/inc/images/2000-1-Deepak-B&W.jpg" />
				                    <figcaption>
				                        Deepak Bhargava
				                    </figcaption>
				                </figure>
				                <div>
				                	<p>CCC convened diverse grassroots groups to create the National Campaign for Jobs and Income Support, a coalition to fight the conditions that create poverty. The coalition&rsquo;s Immigrant Organizing Committee asked the entire national coalition – immigrant groups and non-immigrant groups alike – to make immigration reform a priority issue. They agreed – but it was a tense moment, as Center for Community Change executive director Deepak Bhargava describes.</p>
									<p>&ldquo;The immigration subcommittee was prepared to bring a proposal to the full campaign that we should embrace immigration reform. I could even feel some chills up my spine about a very consequential decision being made. Would the rest of the campaign embrace this issue? Would it be seen as a core economic issue or as a distraction?&rdquo;</p>
				                </div>
				            </section>
				            <section>
				                <figure>
				                    <img src="<?php echo get_template_directory_uri(); ?>/inc/images/2000-2-Angelica-B&W.jpg" />
				                    <figcaption>
				                        Angelica Salas addresses the National Campaign for Jobs and Income Support.
				                    </figcaption>
				                </figure>
				                <div>
				                    <p>Angelica Salas, director of Coalition for Humane Immigrant Rights of Los Angeles, explained, &ldquo;FIRM&rsquo;s formation came out of an agreement by many organizations that weren&rsquo;t immigrant-based, but who understood that if we were going to move forward an anti-poverty agenda in this country, then immigrants had to be included in that fight.&rdquo;</p>
				                </div>
				            </section>
				        </div>
				    </article>

				    <article class="timeline-overlay clearfix" id="y2001o">
				    	<div class="the-slider"></div>
				    	<div>
				        	<button type="button">close</button>
				            <h1 class="mobile-dropper">2001: 9/11 sets back immigration reform efforts.</h1>
				            <section>
				                <figure>
				                	<img src="<?php echo get_template_directory_uri(); ?>/inc/images/2001-NCJIS-launch-bw.jpg" />
				                    <figcaption>
				                        View from the stage at the National Campaign for Jobs and Income Support launch event.
				                    </figcaption>
				                </figure>
				                <div>
				                    <p>In May 2001, the National Campaign for Jobs and Income Support held a public launch event that brought together 1,600 grassroots leaders from 43 states. The coalition had officially embraced immigration reform as an issue.</p>
				                </div>
				            </section>
				            <section>
				                <figure>
				                	<!-- Embedded videos need ?wmode=transparent added to the end of their url. This prevents the video from glitching into the foreground while hidden, etc. -->
				                    <iframe width="494" height="371" src="//www.youtube.com/embed/Syo-E_Bn6kA?wmode=transparent" frameborder="0" allowfullscreen></iframe>
				                </figure>
				                <div>
				                    <p>But the optimism vanished after 9/11. Watch CCC&rsquo;s Son Ah Yun talk about the impact of 9/11 and why immigration reform is an economic justice issue.</p>
				                </div>
				            </section>
				        </div>
				    </article>

				    <article class="timeline-overlay clearfix" id="y2002o">
				    	<div class="the-slider"></div>
				    	<div>
				        	<button type="button">close</button>
				            <h1 class="mobile-dropper">2002: CCC and IOC build statewide immigrant rights groups.</h1>
				            <section>
				                <figure>
				                    <img src="<?php echo get_template_directory_uri(); ?>/inc/images/2002-TIRRC.jpg" />
				                </figure>
				                <div>
				                	<p>With federal policy change no longer an option in the anti-immigrant atmosphere that followed 9/11, CCC and the Immigrant Organizing Committee turned to building statewide immigrant rights groups. The goal was to prevent states from adopting anti-immigrant laws and encourage pro-immigrant policies. In the 2000s, immigration patterns had begun to shift, and large immigrant communities were springing up in states that had rarely seen immigrants. Tennessee was one. &ldquo;It was encouragement and assistance from CCC that helped me have the confidence to start the coalition,&rdquo; said David Lubell of the Tennessee Immigrant and Refugee Rights Coalition. &ldquo;There probably wouldn&rsquo;t be a coalition if not for the work of CCC.&rdquo;</p>
				                </div>
				            </section>
				        </div>
				    </article>

				    <article class="timeline-overlay clearfix" id="y2003o">
				    	<div class="the-slider"></div>
				    	<div>
				        	<button type="button">close</button>
				            <h1 class="mobile-dropper">2003: Immigrant Organizing Committee evolves into FIRM.</h1>
				            <section>
				                <figure>
				                    <img src="<?php echo get_template_directory_uri(); ?>/inc/images/2003-Pramila-laughing-old.jpg" />
				                    <figcaption>
				                        Pramila Jayapal
				                    </figcaption>
				                </figure>
				                <div>
				                	<p>The Immigrant Organizing Committee held listening sessions to learn about the concerns of immigrants nationwide. The committee hammered out principles for a new immigrant rights coalition, and named it FIRM – the Fair Immigration Reform Movement. This collaboration set the pattern for how FIRM would operate. FIRM&rsquo;s executive committee, in 2013 comprised of 16 organizations, has met faithfully every week by conference call and every few months in person to develop collaborative strategies and move campaigns.</p>
									<p>Pramila Jayapal led Hate Free Zone (now called OneAmerica) in Washington state when it joined FIRM in 2003. &ldquo;What&rsquo;s special about FIRM to me,&rdquo; she said, &ldquo;is it&rsquo;s all people who are working on the ground, deeply engaged in community organizing and at the same time deeply strategic and connected to how you make change happen in a holistic way.&rdquo;</p>
				                </div>
				            </section>
				        </div>
				    </article>

				    <article class="timeline-overlay clearfix" id="y2004o">
				    	<div class="the-slider"></div>
				    	<div>
				        	<button type="button">close</button>
				            <h1 class="mobile-dropper">2004: FIRM, DREAMers and voters.</h1>
				            <section>
				                <figure>
				                    <img src="<?php echo get_template_directory_uri(); ?>/inc/images/2004-1-DB-and-FIRM-reporters .JPG" />
				                    <figcaption>
				                        Deepak Bhargava talks to reporters at the FIRM launch event.
				                    </figcaption>
				                </figure>
				                <div>
				                	<p>The Fair Immigration Reform Movement introduced itself to the nation with a public launch event that combined training and strategy sessions with speakers including Senator Ted Kennedy and Hillary Shelton of the NAACP.</p>
				                </div>
				            </section>
				            <section>
				                <figure>
				                    <img src="<?php echo get_template_directory_uri(); ?>/inc/images/2004-2-students.jpg" />
				                    <figcaption>
				                        DREAMers from across the country demand a path to citizenship. Photo credit: Maricela Donahue
				                    </figcaption>
				                </figure>
				                <div>
				                	<p>That year CCC and FIRM held the first mock graduation ceremony for DREAMers. &ldquo;Now what?&rdquo; asked the signs hanging from the necks of the 300 immigrant students in caps and gowns who filed across the lawn of the U.S. Capitol.</p>
				                </div>
				            </section>
				            <section>
				                <figure>
				                    <img src="<?php echo get_template_directory_uri(); ?>/inc/images/2004-3-CCC-and-vols-GOTV.JPG" />
				                    <figcaption>
				                        Volunteers work to get out the vote.
				                    </figcaption>
				                </figure>
				                <div>
				                	<p>CCC also started its nonpartisan Community Voting Project to increase the number of low-income people who vote. CCC&rsquo;s partner groups – many of them FIRM members – pushed 275,684 new and infrequent voters to the polls, primarily the hard-to-reach immigrant, minority and low-income citizens that most traditional voter programs overlooked.</p>
				                </div>
				            </section>
				        </div>
				    </article>

				    <article class="timeline-overlay clearfix" id="y2005o">
				    	<div class="the-slider"></div>
				    	<div>
				        	<button type="button">close</button>
				            <h1 class="mobile-dropper">2005: A FIRM campaign saves a young woman from deportation.</h1>
				            <section>
				                <figure>
				                    <img src="<?php echo get_template_directory_uri(); ?>/inc/images/2005-Marie-Gonzalez-and-parents.jpg" />
				                    <figcaption>
				                        Marie Gonzalez and her parents
				                    </figcaption>
				                </figure>
				                <div>
				                	<p>Marie Gonzales had lived in the U.S. since she was five. But she had no papers, and in 2005, she and her parents were scheduled to be deported. In response, CCC and FIRM launched We Are Marie, their first social media campaign. Young people blogged and wrote letters to Congress about Marie&rsquo;s plight and that of other DREAMers. Marie&rsquo;s parents were deported to Costa Rica – but she was allowed to stay in the U.S. This campaign confirmed for FIRM the power of personal stories – and the leadership potential of immigrant youth.</p>
				                </div>
				            </section>
				        </div>
				    </article>

				    <article class="timeline-overlay clearfix" id="y2006o">
				    	<div class="the-slider"></div>
				    	<div>
				        	<button type="button">close</button>
				            <h1 class="mobile-dropper">2006: Massive marches nationwide.</h1>
				            <section>
				                <figure>
				                    <img src="<?php echo get_template_directory_uri(); ?>/inc/images/2006-Deepak-in-rally-crowd.jpg" />
				                    <figcaption>
				                        CCC&lsquo;s Deepak Bhargava speaks to clergy and activists. Photo credit: Colin Duncan
				                    </figcaption>
				                </figure>
				                <div>
				                	<p>In response to a proposed federal law that would make it a crime to be undocumented or to help anyone who was undocumented, FIRM groups across the country worked with diverse community, labor, faith and media partners to organize rallies that brought millions of people into the streets. In March, Chicago groups held a demonstration with 100,000 people and Los Angeles with 500,000. In Washington CCC and FIRM brought 300 members of the clergy and 3,000 grassroots leaders to the Capitol as the Senate was considering a comprehensive immigration reform bill. On April 10th, immigrants and their allies in 102 cities held rallies of unprecedented size and scope, followed by still more demonstrations in May. </p>
				                </div>
				            </section>
				        </div>
				    </article>

				    <article class="timeline-overlay clearfix" id="y2007o">
				    	<div class="the-slider"></div>
				    	<div>
				        	<button type="button">close</button>
				            <h1 class="mobile-dropper">2007: Culture wars and presidential politics.</h1>
				            <section>
				                <figure>
				                	<iframe width="494" height="371" src="//www.youtube.com/embed/NfemBK175dE?wmode=transparent" frameborder="0" allowfullscreen></iframe>
				                </figure>
				                <div>
				                	<p>In March, 300 armed immigration agents conducted a military-style raid on a factory in New Bedford, Mass., and arrested 350 immigrant workers, who were flown to Texas and then deported, leaving devastated families behind. An immigration reform bill was proposed in Congress but failed to pass. Airwaves and the Internet filled with anti-immigrant rhetoric. Watch CCC&lsquo;s Gabe Gonzalez explain how a janitor in O&lsquo;Hare Airport gave him a reason to hope.</p>
				                </div>
				            </section>
				            <section>
				                <figure>
				                    <img src="<?php echo get_template_directory_uri(); ?>/inc/images/2007-Heartland.jpg" />
				                    <figcaption>
				                        Presidential candidates talk to grassroots leaders in Iowa.
				                    </figcaption>
				                </figure>
				                <div>
				                	<p>In the midst of these culture wars, CCC and FIRM group Iowa Citizens for Community Improvement brought 3,500 grassroots leaders from around the country to Iowa City to meet the presidential candidates and ask them directly how they planned to address the interconnected issues of immigration reform, poverty and health care.</p>
				                </div>
				            </section>
				        </div>
				    </article>

				    <article class="timeline-overlay clearfix" id="y2008o">
				    	<div class="the-slider"></div>
				    	<div>
				        	<button type="button">close</button>
				            <h1 class="mobile-dropper">2008: Raids and votes.</h1>
				            <section>
				                <figure>
				                    <img src="<?php echo get_template_directory_uri(); ?>/inc/images/2008-FLIC-voting-demo.JPG" />
				                    <figcaption>
				                        Florida Immigration Coalition shows its voting spirit.
				                    </figcaption>
				                </figure>
				                <div>
				                	<p>Federal immigration agents conducted a massive armed raid on a meat packing plant in Postville, Iowa, dragging away 400 undocumented workers to be detained and deported. CCC and FIRM sent staff to help the town&lsquo;s immigrant community, reeling in the aftermath. In November, immigrants raised their voices at the polls. CCC&lsquo;s Community Voting Project helped 37 grassroots organizations – mostly FIRM groups – in 24 states register almost 103,000 low-income voters.</p>
				                </div>
				            </section>
				        </div>
				    </article>

				    <article class="timeline-overlay clearfix" id="y2009o">
				    	<div class="the-slider"></div>
				    	<div>
				        	<button type="button">close</button>
				            <h1 class="mobile-dropper">2009: A powerful new tool for building a movement.</h1>
				            <section>
				                <figure>
				                    <iframe width="494" height="278" src="//www.youtube.com/embed/khmorFInAwc?wmode=transparent" frameborder="0" allowfullscreen></iframe>
				                </figure>
				                <div>
				                	<p>CCC and FIRM partnered with CCC&rsquo;s advocacy arm, the Campaign for Community Change (now the Center for Community Change Action), New Organizing Institute and United We Dream to test and adapt movement building trainings, one of the most potent tools the immigration reform movement would employ. The intensive training turned volunteers into leaders by equipping them with five dynamic practices of organizing. Within months, CCC and FIRM partners had trained 1,075 new volunteer leaders – largely immigrant youth – and that was just the beginning. Movement building graduates propelled immigration reform efforts with their creativity and passion. Watch this video from an early training in Colorado.</p>
				                </div>
				            </section>
				        </div>
				    </article>

				    <article class="timeline-overlay clearfix" id="y2010o">
				    	<div class="the-slider"></div>
				    	<div>
				        	<button type="button">close</button>
				            <h1 class="mobile-dropper">2010: FIRM pushes for action.</h1>
				            <section>
				                <figure>
				                    <img src="<?php echo get_template_directory_uri(); ?>/inc/images/2010-1-PAZ-walking.JPG" />
				                    <figcaption>
				                        Petra Falcon (center) and Promise Arizona activists demonstrate.
				                    </figcaption>
				                </figure>
				                <div>
				                	<p>In January, FIRM and its allies conducted 152 public events in 41 states. Still, President Obama did not push immigration reform as he had promised. Adding to the frustration, in Arizona a cruel state law made daily life perilous for immigrants. CCC helped immigrant leaders in Arizona create a new organization to fight back, called Promise Arizona.</p>
				                </div>
				            </section>
				            <section>
				                <figure>
				                    <img src="<?php echo get_template_directory_uri(); ?>/inc/images/2010-2-March-for-America-crowd.jpg" />
				                    <figcaption>
				                        The March for America
				                    </figcaption>
				                </figure>
				                <div>
				                	<p>Fed up with the President&rsquo;s failure to act on immigration and with anti-immigrant laws cropping up in states, CCC, the Campaign for Community Change (now the Center for Community Change Action), FIRM and allies found a way to demand action. They brought 250,000 people from across the country to rally on the National Mall in DC.</p>
				                </div>
				            </section>
				            <section>
				                <figure>
				                	<iframe width="494" height="371" src="//www.youtube.com/embed/gt4lLcVQ7pg?wmode=transparent" frameborder="0" allowfullscreen></iframe>
				                </figure>
				                <div>
				                	<p>The President responded, inviting CCC&lsquo;s Deepak Bhargava, a handful of FIRM leaders and select leaders of labor, civil rights, faith and other organizations to the White House for a candid – and challenging – discussion. FIRM pushed the President to use his executive powers to stop deportations that were tearing families apart. The President pushed back. Watch Gara LaMarche, formerly of The Atlantic Philanthropies, describe the result.</p>
				                </div>
				            </section>
				        </div>
				    </article>

				    <article class="timeline-overlay clearfix" id="y2011o">
				    	<div class="the-slider"></div>
				    	<div>
				        	<button type="button">close</button>
				            <h1 class="mobile-dropper">2011: Change Takes Courage</h1>
				            <section>
				                <figure>
				                	<iframe width="494" height="371" src="//www.youtube.com/embed/QCIjeN5N26E?wmode=transparent" frameborder="0" allowfullscreen></iframe>
				                </figure>
				                <div>
				                	<p>FIRM launched a national campaign of direct action and civil disobedience to pressure the administration to stop the deportations. FIRM director Marissa Graciosa said, &ldquo;It was the analysis of FIRM that President Obama made the promises, and President Obama could make the changes.&rdquo; In August, he did: a new policy called prosecutorial discretion that would seek to deport people who had committed crimes, not everyday immigrants. While the policy helped, it did not come close to ending the deportations.</p>
									<p>Alabama passed a harsh anti-immigrant law, and CCC and FIRM sent staff and resources to help. FIRM held its annual summit meeting in Alabama to strengthen local organizations and prove they were not alone. Watch former CCC staff Sean Thomas-Breitfeld explain what the immigrant rights fight in Alabama taught him about his African American heritage.</p>
				                </div>
				            </section>
				        </div>
				    </article>

				    <article class="timeline-overlay clearfix" id="y2012o">
				    	<div class="the-slider"></div>
				    	<div>
				        	<button type="button">close</button>
				            <h1 class="mobile-dropper">2012: Relief for DREAMers and power at the polls.</h1>
				            <section>
				                <figure>
				                    <iframe width="494" height="371" src="//www.youtube.com/embed/a2TadR5LwuM?wmode=transparent" frameborder="0" allowfullscreen></iframe>
				                </figure>
				                <div>
				                	<p>The courageous action of young immigrants put pressure on the administration and paid off with a new policy of &ldquo;deferred action&rdquo; for DREAMers – two years of safety from deportation and authorization to work for hundreds of thousands of eligible young people. On the day the program went into effect, August 15, 2012, FIRM groups across the country helped 17,900 young people apply for work permits and relief for deportation. You can take a look here.</p>
				                </div>
				            </section>
				            <section>
				                <figure>
				                	<iframe width="494" height="371" src="//www.youtube.com/embed/9vSQnY2-X60?wmode=transparent" frameborder="0" allowfullscreen></iframe>
				                </figure>
				                <div>
				                	<p>In November, immigrants made their voices heard at the polls, and suddenly politicians of all stripes declared immigration reform a priority. Activists didn&rsquo;t stop: CCC and its advocacy arm, the Campaign for Community Change, FIRM, SEIU and allies launched the Alliance for Citizenship to increase momentum for immigration reform. Watch CCC&rsquo;s Marissa Graciosa talk about Arizona, Alabama, and a new super-citizen who cast his first vote in 2012.</p>
				                </div>
				            </section>
				        </div>
				    </article>

				    <article class="timeline-overlay clearfix" id="y2013o">
				    	<div class="the-slider"></div>
				    	<div>
				        	<button type="button">close</button>
				            <h1 class="mobile-dropper">2013: Progress and pressure.</h1>
						<!-- modified 1-14-14 by tf -->
				             <section>
				                <figure>
				                    <img src="http://www.communitychange.org/wp-content/uploads/2014/01/2013-YIA-march-for-mmigration.jpg" />
				                </figure>
				                <div>
				                	<p>Children were among the movement's most important messengers in 2013. With their families, they rode buses to the nation's capital and joined marches on the National Mall and other cities throughout the country. In November, a delegation of FIRM children met with members of Birmingham's 1963 Children's Crusade, who marched arm in arm with the children and called immigration reform the "civil rights issue of this generation." <a href="http://www.communitychange.org/top-20-moments-2013-fight-immigration-reform/">Click here</a> to see more highlights from 2013.</p>
				                </div>
				            </section>
				        </div>
				    </article>

				     <article class="timeline-overlay clearfix" id="y2014o">
				    	<div class="the-slider"></div>
				    	<div>
				        	<button type="button">close</button>
				            <h1 class="mobile-dropper">2014: Administrative Relief and an end to deportations.</h1>
						      <section>
				                <figure>
				                    <img src="<?php echo get_template_directory_uri(); ?>/inc/images/2014-March.jpg" />
				                </figure>
				                <div>
				                	<p>In November 2014, after months of direct pressure from our movement, President Obama responded to our demands by announcing a plan for administrative relief. Commonly known as Executive Action on Immigration, the plan is comprised of a number of different actions that the Obama Administration can take to ease the burden of undocumented immigrants living in the US. Executive Action on Immigration has the potential to shield up to 3.7 million immigrants from deportations by expanding DACA and creating additional programs that allow eligible undocumented immigrants living in the US to qualify for deferred action and apply for work permits.</p>
				<p>While anti-immigrant legislators have temporarily stalled the implementation of this plan by blocking the program in litigation and lawsuits, our community continues to fight back. Although Executive Action on Immigration is not a permanent solution, it is the largest step forward for immigrant rights in decades.</p>
				                </div>
				            </section>
				        </div>
				    </article>

				    <article class="timeline-overlay clearfix" id="whatsnexto">
				    	<div class="the-slider"></div>
				    	<div>
				        	<button type="button">close</button>
				            <h1 class="mobile-dropper">What's Next? Join us on this unfinished journey.</h1>
				            <section>
				                <figure>
				                	<iframe width="494" height="371" src="//www.youtube.com/embed/21Qy4FEfXII?wmode=transparent" frameborder="0" allowfullscreen></iframe>
				                </figure>
				                <div>
				                	<p>Watch the video to get a glimpse of the movement in action. We are closer than ever to achieving real and comprehensive immigration reform that will provide a path to citizenship for 11 million aspiring Americans. <strong>But we can&lsquo;t do it without your help.</strong></p>
				                    <p><a href="https://join.communitychange.org/page/contribute/immigration">Make a donation today</a> to help the Center for Community Change write a happy ending to this story. As the coordinator of FIRM, CCC plays a central role in the strategy and implementation of the coalition&lsquo;s work. Your support will go immediately to helping advance our immigrant rights work.</p>
									<p>Through FIRM, we bring local and statewide grassroots groups together and equip them to achieve national impact on immigration reform. We help ensure the voices of immigrants are widely represented in the media and in the public policy debate. We can&lsquo;t stop now! <a href="https://join.communitychange.org/page/contribute/immigration">Donate today and help us finish the work of immigration reform!</a></p>
									<p><a href="https://join.communitychange.org/page/s/immigration-report">The Center is producing a report that tells the story of our immigration reform work from the 1990s through today. Click here if you&lsquo;d like to be notified when this report is available on our website.</a></p>
				                </div>
				            </section>
				        </div>
					</article>
				</article>
			<?php endwhile; ?>
		</div><!-- #content -->
	</div><!-- #primary -->
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
<?php get_footer(); ?>
