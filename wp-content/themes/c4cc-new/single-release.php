<?php use CCC\Services\SinglePost;

$post = new SinglePost();

post_view_tracker($post->getId());

/**
 * The Template for displaying all single press releases.
 *
 * @package c4cc
 */

get_header(); ?>

	    <div id="single-post">
	        <div class="post-head container">
	            <ul class="post-social-links">
<!-- 	              <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
	                <li><a href="#"><i class="fa fa-twitter"></i></a></li> -->
	                <li><span class="category-title">CATEGORY</span>
	                    <a href="#">
	                        <?php foreach($post->getCategory() as $title => $link): ?>
	                        <li>
	                            <a href="<?= $link; ?>"><?= $title; ?></a></li>
	                        <?php endforeach; ?></a>
	                         </li>
	            </ul>
	            <h1><?= $post->getTitle(); ?></h1>
	            <em><?= $post->getUnderTitle(); ?></em>
	            <p><?= $post->getCreatedAt('F j, Y g:i a'); ?></p>
	            <ul class="post-social-share">
	                 <? echo do_shortcode('[DISPLAY_ULTIMATE_SOCIAL_ICONS]'); ?>
	            </ul>
	        </div>

	       <?php 
	           $imgUrl = $post->getImage(); 
	           $imgCaption = $post->getImageCaption();
	           $htmlPostImg1 = "<div class='post-image'><div class='post-image-container' style='background-image: url(";
	           $htmlPostImg2 =  ");></div><div class='container post-image-copyright'>";
	           $htmlPostImg3 = "<p>$imgCaption</p></div></div></div>";

	           if(!empty($imgUrl)){
	                echo $htmlPostImg1 . $imgUrl . $htmlPostImg2;
	                echo $htmlPostImg3;    
	           }
	       ?>

	        <div class="container" id="single-post-content-container">
	            <div class="post-story">
	            	<div class="post-story-content-fix col-lg-10 col-lg-offset-1 col-xs-12">
						<?= apply_filters('the_content', $post->getContent()); ?>
					</div>
	            </div>
	        </div>
	    </div>

    <div class="container all-releases-container"> 	
    	
	</div>

    <div id="the-latest">
        <div class="container all-releases-container">
            <h2>Latest Press Releases </h2>
            <div class="row">
    	    	<?php while ( have_posts() ) : the_post(); ?>		
    					<?php 
    					  $temp = $wp_query; 
    					  $wp_query = null; 
    					  $wp_query = new WP_Query(); 
    					  $args = array (
    					      'post_type'              => 'release',
    					      'post_status'			   => 'publish',
    					      'posts_per_page'         => '3',
    					  );
    					  $wp_query->query($args); 
    					  while ($wp_query->have_posts()) : $wp_query->the_post(); 
	    					  echo "<div class='col-md-4 col-sm-6 col-xs-12 cover-post' style='background-image: url(https://communitychange.org/wp-content/uploads/2017/12/press-release-box.jpg)'>
				                        <div class='cp-container'>
				                         <div class='cpc-metas'>IN: PRESS RELEASES</div>";
				              echo "<h3 class='cpc-title'><a href=";
				              		the_permalink();
				              echo ">";
				           			the_title();
				              echo '</a></h3>';
				              echo "<p class='cpc-post-info'>";
				              		the_time('F j, Y g:i a ');
				              echo "</p>
				                  	</div>
				              	</div>";
    					?>

    					<?php endwhile; ?>													
    					 <?php 
    					  $wp_query = null; 
    					  $wp_query = $temp;  // Reset
    					 ?>
    	    	<?php endwhile; // end of the loop. ?>
               
            </div>
        </div>
    </div>

<?php get_footer(); ?>