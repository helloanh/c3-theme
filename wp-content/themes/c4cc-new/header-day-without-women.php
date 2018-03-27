<?php
/**
 * Template: Header Day Without Women
 *
 * Community Change Site Header for Day Without Women event March 8, 2018
 * Author: Anh K. Hoang
 *
 * @package c4cc
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>

<!--Begin Google Analytics Code-->
	<script type="text/javascript">

 	 var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-4635267-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>

<!-- CUSTOM STYLES REWRITE FOR DAY WITHOUT WOMEN !-->
<style type="text/css">

	body {
		background: url("https://www.communitychange.org/wp-content/uploads/2017/03/textured-bg-white-1.jpg") repeat;
	}
	a:visited {
		color: #213444;
	}

	#masthead {
		border-bottom: 6px solid #F6ECCA;
		background: url("https://www.communitychange.org/wp-content/uploads/2017/03/womenmarchbanner-superlight.jpg")
	}

	#site-navigation {
		background: url("https://www.communitychange.org/wp-content/uploads/2017/03/nav_back_daywithoutwomen.png");
	}
	
	.navigation-main a:hover {
		background: #6F1D1B;
	}

	.nav-title {
		color: #ffffff;
	}

	.navigation-main li .sub {
	  color: #F6ECCA;
	}

	.navigation-main ul ul {
	 	background: #F6ECCA;
	}

	.slicknav_btn .slicknav_open {
		color: #F1615C;
	}

	.site-title a {
		background: url("https://www.communitychange.org/wp-content/uploads/2017/03/CCC_Logo_Red-small.png") no-repeat;
		background-size: contain;
	}

	.slicknav_nav .slicknav_row:hover {
		border-radius: 0px;
		background: #ccc;
	}

	#slider {
		padding-bottom: 2%;
		height: auto;
		overflow: -moz-scrollbars-none;

	}

	#slider .orange-line {
		background: #6F1D1B;
	}

	#welcome p {
	 	border-top: 1px solid #F6ECCA;
	 	border-bottom: 1px solid #F6ECCA;
	}

	#pre-blog h3, #social-widgets h3{
		color: #6F1D1B;
	}

	#pre-blog .more {
		background: #6F1D1B url("https://www.communitychange.org/wp-content/uploads/2017/03/more_blog_daywithoutwomen.png") 130px 11px no-repeat;
		color: #ffffff;
	}

	#pre-blog .more:hover {
		background: #F1615C url("https://www.communitychange.org/wp-content/uploads/2017/03/more_blog_daywithoutwomen.png") 130px 11px no-repeat;
	}

	#home-blog li {
		background-color: #F6ECCA!important;
	}

	.top-social .donate {
		background: url("https://www.communitychange.org/wp-content/uploads/2017/03/donate_top_daywithoutwomen.png") 0 0 no-repeat;
		background-size: cover;
	}

	#home-blog a {
	  color: #213444;
	  font-size: 20px;
	  line-height: 22px;
	  font-weight: 600;
	  text-transform: uppercase;
	}

	#home-blog a:hover {
		background: url("https://www.communitychange.org/wp-content/uploads/2017/03/read-more-on-hover.png") 50% 9% no-repeat;
		opacity: 0.8;
	}

	#home-blog li .date {
		background: #6F1D1B;
	}

	#newsletter {
		background: #F6ECCA;
	}

	#newsletter h3 {
		color: #6F1D1B;
	}

	 #signup .submit {
	 	background: #f1615c;
	 }

	 #signup input {
	 	border-bottom: 0px solid #DCDDDE;
	 	color: #6F1D1B;
	 }

	 #signup .submit:hover {
  	background: #DF2935;
	}

	#features a:hover {
		background: #6F1D1B url("https://www.communitychange.org/wp-content/uploads/2017/03/read_more.png") center center no-repeat;
		opacity: 0.8;
	}

	#pre-footer {
		background: #f1615c;
		border-top: 0px solid #f1615c;
		padding: 20px 0;
	}

	#pre-footer a {
		color: #F6ECCA;
	}

	#colophon {
		background: #213444;
		border-top: 1px solid #213444;
		color: #ffffff;
	}

	/* Mobile */


	@media screen and (max-width: 899px) {
		.slicknav_menu {
	  	border-bottom: 4px solid #f1615c;
	  	background: #f1615c;
		}


		a.slicknav_open, .slicknav_btn {
		  background-color: #f1615c;
		}

		.slicknav_nav li {
			background: #6F1D1B;
		}

		.slicknav_menu ul {
			background: #ffffff;
		}

		.slicknav_menu ul ul a .nav-title {
			color: #ffffff;
		}
	}

	@media screen and (max-width: 480px) {
		#features .larger {
			padding-bottom: 5%;
		}	
	}

</style>

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<nav id="site-navigation" class="navigation-main" role="custom-dropdown">
	    <!-- <input type="checkbox" id="button">
		<label for="button" onclick></label> -->
		<?php $walker = new Menu_With_Description; ?>
		<?php wp_nav_menu( array( 'theme_location' => 'primary',  'walker' => $walker ) ); ?>
	</nav><!-- #site-navigation -->
	<header id="masthead" class="site-header" role="banner">
		<div class="container">
			<div class="site-branding">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			</div>
	
			<div class="top-social">
				<a href="<?php the_field('facebook', 'option'); ?>" target="_blank" class="facebook">Facebook</a>
				<a href="<?php the_field('twitter', 'option'); ?>" target="_blank" class="twitter">Twitter</a>
				

				<?php 
					if ( is_page('awards') ){
						echo '<a class="sponsor-today" id="awards-page-sponsor-today" href="https://join.communitychange.org/page/contribute/donate-now-center-for-community-change" target="_blank">Donate </a>';
					} else {
						echo '<a href="https://join.communitychange.org/page/contribute/donate-now-center-for-community-change" class="donate">Donate</a>';
					};
				?>
			</div>
		</div>
	</header><!-- #masthead -->

	<div id="main" class="site-main container">