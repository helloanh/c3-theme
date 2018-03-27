<?php
/*
Template Name: All Contributors
*/

use CCC\Services\SinglePost;
use CCC\Data\TheLatestSinglePost;
$post = new SinglePost();
post_view_tracker($post->getId());
$postCategory = $post->getMeta('category');
$postImage = $post->getImage();
get_header(); ?>

	<div id="primary" class="content-area container">
		<div id="content" class="site-content" role="main">
		<div class="row">
			<div class="col-lg-12">
				<header class="entry-header">
					<h1 class="entry-title">All Contributors</h1>
				</header>
			</div>
		</div>
		<div class="author-container all-authors-container">
		    <div class="row">
			<?php
				$contributors = wp_list_authors_hub_all('changewire');
				if(!empty($contributors)) {	
					foreach($contributors as $key => $contributor) {
						$post = new SinglePost($contributor->ID);
						$authorImg = get_avatar_url($authorEmail);
						$avatar = get_the_author_meta('display_name', $post->getAuthorId());
						$anotherauthorImg = get_avatar_url($contributor->ID);
						echo '
							<div class="col-xs-12 col-md-3 col-lg-2 author-square-container">
		                    	<div class="author-image">
			                    	<div class="author-info">
				                        <h4 class="author-name"><a href="'.$post->getAuthorUrl().'">'.$post->getAuthorName().'</a></h4>
				                        <div class="img-responsive">';
				                        echo $post->getAuthorImage();
				                        echo '</div>
				                        <p> Recent Work: <br><span style="font-size:0.95em;"><a href="'.$post->getPermalink().'">
				                            '.$post->getTitle().' </span>
				                        </p></a>  
				                    </div>
			                    </div>
			                </div>
		                ';
					}
				}
			?>
			 </div>
		 </div>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
