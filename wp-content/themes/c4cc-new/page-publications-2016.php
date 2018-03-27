<?php
/*
Template Name: Publications 2016

		by Anh K Hoang

		display all publications for annual 2016 reports

*/
	wp_enqueue_script('jquery');
	wp_enqueue_style('bootstrap-style', get_stylesheet_directory_uri().'/inc/bootstrap337.min.css' );
	wp_enqueue_style('bootstrap-theme', get_stylesheet_directory_uri().'/inc/bootstrap-theme.min.css' );

	wp_enqueue_script('bootstrap', get_stylesheet_directory_uri().'/js/bootstrap337.min.js','jquery');
	wp_enqueue_script('lightbox', get_stylesheet_directory_uri().'/js/bootstrap.lightbox.min.js','jquery');
	wp_enqueue_style('pub2016', get_stylesheet_directory_uri().'/inc/publications2016.css');

get_header(); ?>
	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Merriweather:300i, 400|Source+Serif+Pro:600" rel="stylesheet">



</div><!-- break out of .container from header -->

<div id="publication" class="site-content container">
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>
					</header><!-- .entry-header -->
				</article>

			<div class="pub-intro container">
				<div class="row">
					<div class="col-lg-12">
						<!-- <h1 class="text-center">Nothing About Us Without Us</h1> -->
						<h2 class="text-center"> "It is a public health imperative to use the power of public health to re-envision and change our justice system and virtually all its component parts." <br>
						<span class="pub-subheader"> - Human Impact Partners, A Framework Connecting Criminal Justice and Public Health </span></h2>
						
					</div>
				</div class="row">
				<div class="row">
					<div class="col-lg-12">
						<p>Low-income communities and communities of color bear the brunt of over-policing and increased rates of incarceration. These communities have experienced generations of government neglect and disinvestment, and the very systems that are supposed to provide safety and support often do more harm than good. The people impacted by incarceration share similar stories of the failures of public systems to intervene in the series of circumstances that led to incarceration. Their accounts have distinct themes: childhood sexual abuse, trafficking, domestic abuse, poverty, and addiction.</p>	

						<p><a class="link-pub" href="http://www.communitychange.org/wp-content/uploads/2016/10/Womens-Gathering-Materials-Sept-2016.pdf">The public health field can offer powerful tools to advance anti-criminalization campaigns using a health equity lens</a>. In September 2016, Center for Community Change and Human Impact Partners held a women’s gathering on health and criminalization.  We brought together women of color impacted by incarceration and public health officials to build relationships across the divide between these groups.</p>

						<p> The convening placed women impacted by incarceration at the heart of public health strategies. Throughout the gathering, we returned to a common refrain: “Nothing about us without us.” It sparked engagement on new areas of work, including a commitment to promote health equity through new collaborations, partnership, and shared learning to develop and implement health equity programs that are directly informed by the people who live in criminalized, disinvested communities. <p>

						<p> Materials from the convening are available below.</p>
							<!-- <a class="btn btn-success" href="#" role="button">Read the Report</a> 	 -->
					</div> <!-- col-lg-12 -->
				</div> <!-- row -->
			</div> <!-- end pub-intro container -->
					
			<div class="pub-body container">
				<div class="row">
					<div class="col-lg-12 col-xs-12">
						<h4 class="pub-title"> Publication: Building A Culture of Health </h4><br><br>
						<div class="row">
							<div class="col-lg-6 col-xs-12">
								 <a href="http://www.communitychange.org/wp-content/uploads/2016/10/Womens-Gathering-Materials-Sept-2016.pdf"><p class="text-center"><img class="img-responsive pub-img" src="http://www.communitychange.org/wp-content/uploads/2016/10/article-frontpage-1.jpg"></p></a>
								<p class="text-center"><a href="http://www.communitychange.org/wp-content/uploads/2016/10/Womens-Gathering-Materials-Sept-2016.pdf"><button type="button" class="btn btn-default"> Read More</button></a></p>
								<!-- <a href="http://www.communitychange.org/wp-content/uploads/2016/10/Womens-Gathering-Materials-Sept-2016.pdf"><img class="download-button img-responsive" src="https://s14.postimg.org/fovdl29ap/download_cloud_flat.png" width="100px;"></a> -->
							</div>
							<div class="col-lg-6 col-xs-12">
								<p class="quote"><em> Excerpt: "Disparate incarceration rates and everything that drives them are a public health issue. The same structural and institutional racism that drives mass incarceration also drives health inequities."</em></p>
								
							</div>
						</div>
						<br>
					</div> <!-- col-lg-4 col-md-4 col-sm-6 col-xs-12 -->

		

					<!-- <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<h4 class="pub-title"> Title of Publication </h4>
							<p class="text-center"><a href="#""><img class="img-responsive"  src="http://placehold.it/400x400"></a></p>
								<img class="download-button img-responsive" src="https://s14.postimg.org/fovdl29ap/download_cloud_flat.png" width="80px;">
							<p> Lorem ipsum dolor sit amet, vel oportere posidonium ne, eam no diam persecuti. Te postea quaestio adipiscing eum. Ius et reque fabulas adolescens, usu quot probo explicari ea, an sea blandit mediocritatem. </p>
							<p class="text-center"><button type="button" class="btn btn-default"> Read More</button></p>			
					</div> -->  <!-- col-lg-4 col-md-4 col-sm-6 col-xs-12 -->
			  </div> <!-- end row -->			
								
			</div> <!-- pub-body-->

	
					
			</div> <!-- pub-body-->
		
			</div><!-- #content -->
		</div><!-- #primary -->
</div> <!-- publication -->




<?php get_footer(); ?>