<?php
/*
Template Name: Publications 2016
*/
	wp_enqueue_script('jquery');
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/inc/bootstrap.min.css' );
	wp_enqueue_style('bootstrap-theme', get_template_directory_uri() . '/inc/bootstrap-theme.min.css' );
	wp_enqueue_style('pub2016',get_template_directory_uri() . '/inc/publications2016.css');
	wp_enqueue_script('bootstrap', get_template_directory_uri() .'/js/bootstrap337.min.js','jquery');

get_header(); ?>

</div><!-- break out of .container from header -->
<div id="publication" class="container pub2016">
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
				<?php endwhile; ?>
				</div><!-- #content -->
			</div><!-- #primary -->


				<div class="pub-intro container">
						<div class="row">
							<div class="col-lg-12">
								<h2>The 2015 guidance makes it clear that consideration of targeted economic, environmental, social and governmental factors is consistent with ERISA’s fiduciary obligations. </h2>
							</div>
							<div class="col-lg-6">
								<p>Lorem ipsum dolor sit amet, vel oportere posidonium ne, eam no diam persecuti. Te postea quaestio adipiscing eum. Ius et reque fabulas adolescens, usu quot probo explicari ea, an sea blandit mediocritatem. Causae detracto voluptaria eos te.
									Qui simul delectus adipisci eu, ne mei suas meliore liberavisse, vix no eros mazim iudico. His mazim solet soluta in. Esse quodsi aliquam nam ad, saepe deseruisse nec ut. Ea dolor primis ancillae pro, eu mel nonumy vocibus. Ut quo homero pericula. His idque nusquam vivendum cu, his accumsan expetenda at.
									Ne porro epicuri hendrerit nam. At sit falli dicunt deserunt, ei phaedrum aliquando prodesset duo. Assentior comprehensam at eam, mea autem alterum ornatus eu, ei vis saperet antiopam interpretaris. Amet dolor semper ut vim, qui perfecto intellegebat signiferumque cu, duo at elitr vulputate. Nec offendit assentior deterruisset ex, duo putent aeterno bonorum no.
								Ea usu natum mollis conclusionemque, in sea mazim voluptatibus. Eu meis expetenda honestatis usu. Numquam accusata ne duo, cum intellegam contentiones eu, vis suas persecuti an. Ei sea nemore efficiendi omittantur, viris detraxit usu id.
								</p>
							</div> <!-- col-lg-6 -->
							<div class="col-lg-6">
								<p>Lorem ipsum dolor sit amet, vel oportere posidonium ne, eam no diam persecuti. Te postea quaestio adipiscing eum. Ius et reque fabulas adolescens, usu quot probo explicari ea, an sea blandit mediocritatem. Causae detracto voluptaria eos te.
								Ea usu natum mollis conclusionemque, in sea mazim voluptatibus. Eu meis expetenda honestatis usu. Numquam accusata ne duo, cum intellegam contentiones eu, vis suas persecuti an. Ei sea nemore efficiendi omittantur, viris detraxit usu id.
								</p>
							</div> <!-- col-lg-6 -->			
						</div> <!-- row -->
					</div> <!-- end pub-intro container -->
					<div class="pub-body container">
						<div class="row">
						</div> <!-- row -->

						<div class="row">
							<div class="col-lg-4 ">
								<h4> Title of Publication </h4>
								<a href="#""><img src="http://placehold.it/350x250"></a>
								<p> Lorem ipsum dolor sit amet, vel oportere posidonium ne, eam no diam persecuti. Te postea quaestio adipiscing eum. Ius et reque fabulas adolescens, usu quot probo explicari ea, an sea blandit mediocritatem. </p>
								<button type="button" class="btn btn-default"> Read More</button>
							</div>
							<div class="col-lg-4 ">
								<h4> Title of Publication </h4>
								<a href="#""><img src="http://placehold.it/350x250"></a>
								<p> Lorem ipsum dolor sit amet, vel oportere posidonium ne, eam no diam persecuti. Te postea quaestio adipiscing eum. Ius et reque fabulas adolescens, usu quot probo explicari ea, an sea blandit mediocritatem. </p>
								<button type="button" class="btn btn-default"> Read More</button>
							</div>
							<div class="col-lg-4">
								<h4> Title of Publication </h4>
								<a href="#""><img src="http://placehold.it/350x250"></a>
								<p> Lorem ipsum dolor sit amet, vel oportere posidonium ne, eam no diam persecuti. Te postea quaestio adipiscing eum. Ius et reque fabulas adolescens, usu quot probo explicari ea, an sea blandit mediocritatem. </p>
								<button type="button" class="btn btn-default"> Read More</button>
							</div>
						</div>
					</div> <!-- pub-intro container -->

			
				
<?php get_footer(); ?>