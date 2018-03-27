<?php
/*
Template Name: Nomination Form 2017
* Anh K. Hoang
*/
wp_enqueue_script('jquery');

wp_enqueue_style('cc-nomination-form-2017',get_template_directory_uri().'/inc/change-champions-nomination-form.css');
wp_enqueue_script("recaptcha", esc_url("//www.google.com/recaptcha/api.js"), 'jquery');

get_header(); ?>

<style>
a {
   color: rgb(241, 103, 36);
}
ul#gform_fields_5 {
    list-style: none;
}
article#post-9348 form#gform_4 ul {
   list-style: none !important;
}
article#post-9348 .site-content .entry-header h1 {
   color: #b5c3bd;
   text-align: center;
}
article#post-9348 h3.gform_title {
  margin-bottom: 1.15em;
  text-align: center;   
  color: white;
  padding: 10px 0;
  color: #ffffff;
  font-size: 2rem;
  background: #144d7d;
  padding: 5px;
  font-family: SourceSansProBlack;
}

article#post-9348 .entry-content h2 {   
	color: #144B7D;
	font-size: 1.5em;
	margin-bottom: 4px;
	border-bottom: 2px solid;
}
label {
	font-weight: 600;
	font-style: italic;
	font-size: 1.15em;
	color: #444;
}
label.gfield_label.gfield_label_before_complex {
	color: rgb(241, 103, 36);
	font-weight: 600;
	text-transform: uppercase;
}
span.gfield_required {
	color: rgb(241, 103, 36);
}
a#gform_save_5_link {
    background: #d9d9d9;
    padding: 5px 20px;
    width: 50%;
    color: #144d7d;
    /* text-transform: uppercase; */
    font-size: 1rem;
}
input#gform_submit_button_5 {
	padding: 10px;
	margin: 20px 0;
	width: 25%;
	background: #f4a216;
	color: #fff;
	text-transform: uppercase;
}
.validation_error {
    color: red;
    font-size: 1.55rem;
    text-align: center;
}

.form_saved_message {
    padding: 20px 30px;
    background: #FFDE40;
}

.form_saved_message a {
	color: #144d7d;
}

.form_saved_message_emailform input[type=email] {
    margin-top: 20px;
}

.form_saved_message_emailform input[type=submit] {
	border: 0px solid #ccc;
    line-height: normal;
    font-weight: 700;
    margin-top: 20px;
    padding: 5px 10px;
    background: #144D7D;
    color: white;
    width: 25%;
}
</style>
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

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
					<?php if(get_field('section_nav')) : ?>
						<div class="mobile-menu">
							<button class="mobile-activator" data-name="show" id="mobile-activator"><?php the_title(); ?></button>
							<?php wp_nav_menu( array(
									'menu' 			=> get_field('section_nav'),
									'menu_class' 	=> 'menu_dropdown',
								) 
							); ?>
						</div>
					<?php endif; ?>
				
					<div class="entry-content">
						<?php if(get_field('intro')) : ?>
							<div class="intro">
								<?php the_field('intro'); ?>
							</div>
						<?php endif; ?>
						<?php the_content(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
