 <?php
/*
Template Name: ChangeWire Most Read All
*/
use CCC\Services\SinglePost;
$post = new SinglePost();

post_view_tracker($post->getId());

$postCategory = $post->getMeta('category');
$postImage = $post->getImage();

get_header('changewire'); 
global $hub;
?>

 <div class="container" id="changewire-headlines">
    <div class="hub-section section-no-padding row">
    	<div class="col-lg-12">
    		<h1 class="text-center">Most Read </h1>
    	</div>

        <div class="col-lg-12">
           <div class="stories-list story-border-top">
                <div class="badge">Most Read</div>
                <!-- <a href="#" class="see-all">See All</a> -->
            </div>
			<?= $hub->mostReadAll(); ?>
        </div>
    </div>
</div>
<div id="the-latest">
    <div class="container">
        <h2>Related Articles</h2>
        <div class="row">
            <?php
            $relatedPosts = $post->getRelatedPosts();
            foreach($relatedPosts as $post) {
                $single = new SinglePost($post);

                echo '<div class="col-md-4 col-sm-6 col-xs-12 cover-post" style="background-image: url('.$single->getImage().')">
                    <div class="cp-container">
                    <div class="cpc-metas"><i>IN:</i> ';
                        foreach($single->getCategory() as $title => $link) {
                            echo '<a href="'.$link.'">'.$title.'</a>';
                        }
                    echo '</div>
                        <h3 class="cpc-title"><a href="'.$single->getPermalink().'">'.$single->getTitle().'</a></h3>
                        <p class="cpc-post-info"><span>'.$single->getAuthorName().'</span> '.$single->getCreatedAt('F j, Y g:i a ').'</p>
                        <p class="cpc-excerpt">'.$single->getExcerpt().'</p>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>
</div>

<?php get_footer('changewire'); ?>