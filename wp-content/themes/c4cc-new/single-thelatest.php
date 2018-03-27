<?php
use CCC\Services\SinglePost;


$post = new SinglePost();

post_view_tracker($post->getId());

$postCategory = $post->getMeta('category');
$postImage = $post->getImage();

get_header(); ?>
    <div id="single-post">
        <div class="post-head container">
            <ul class="post-social-links">
<!--                 <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li> -->
                <li><a href="<?= get_category_link($postCategory); ?>"><?= get_cat_name($postCategory); ?></a></li>
            </ul>
            <h1><?= $post->getTitle(); ?></h1>
            <em><?= $post->getUnderTitle(); ?></em>
            <p>by <a href="<?= $post->getAuthorUrl()?>"><?= $post->getAuthorName(); ?></a> | <?= $post->getCreatedAt('F j, Y g:i a '); ?></p>
        </div>
        <div class="post-image">
            <?php if($postImage && !empty($postImage)): ?>
                <div class="post-image-container img-responsive" style="background-size: cover; background: url(<?= $postImage; ?>) no-repeat center center;"></div>
            <?php endif; ?>
            <div class="container post-image-copyright">
                <p><?= $post->getImageCaption(); ?></p>
            </div>
        </div>
        <div class="container" id="single-post-content-container">
            <div class="post-story">
                <div class="post-story-content-fix col-lg-10 col-lg-offset-1 col-xs-12">
				    <p><?= apply_filters('the_content', $post->getContent()); ?></p>
                </div>
            </div>
            <ul class="post-tags col-lg-10 col-lg-offset-1 col-xs-12">
                <li class="tags-title">Category:</li>
				<?php foreach($post->getCategory() as $title => $link): ?>
                    <li><a href="<?= $link; ?>">
                        <?= $title; ?></a>
                    </li>
				<?php endforeach; ?>
            </ul>
            <ul class="post-social-share col-lg-10 col-lg-offset-1 col-xs-12">
                <? echo do_shortcode('[DISPLAY_ULTIMATE_SOCIAL_ICONS]'); ?>
            </ul>
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
                        <div class="cpc-metas"><i>IN: </i> ';
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
<script>
    // fixing small gravatar image issue
    $('.post-author-image img').attr('width', 205).attr('height', 205);
</script>

<?php get_footer(); ?>
