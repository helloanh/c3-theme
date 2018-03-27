<?php
use CCC\Services\SinglePost;
use CCC\Data\TheLatestSinglePost;

$post = new SinglePost();
post_view_tracker($post->getId());
$postCategory = $post->getMeta('category');
$postImage = $post->getImage();

get_header('change-wire'); ?>

    <div id="single-post">
        <div class="post-head container">
            <ul class="post-social-links">
<!--                 <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li> -->
                <li>
                    <span class="category-title">CATEGORY</span>
                    <a href="#">
                        <?php foreach($post->getCategory() as $title => $link): ?>
                        <li>
                            <a href="<?= $link; ?>"><?= $title; ?></a></li>
                        <?php endforeach; ?></a>
                        </li>
            </ul>
            <h1><?= $post->getTitle(); ?></h1>
            <em><?= $post->getUnderTitle(); ?></em>
            <p>by <a href="<?= $post->getAuthorUrl()?>"><?= $post->getAuthorName(); ?></a>, <?= $post->getCreatedAt('F j, Y g:i a '); ?></p>
        </div>
        <div class="post-image">
            <?php
            if($video = $post->getMetaEmbed('link_to_video', ['100%', 500]))
                echo $video;
            else
                echo '<div class="container"><img class="img-responsive" src="'.$post->getImage().'"></div>';
            ?>
        </div>
        <div class="container" id="single-post-content-container">
            <div class="post-story col-lg-10 col-lg-offset-1 col-xs-12">
				<?php apply_filters('the_content', $post->getContent()); ?>
            </div>
            <ul class="post-tags col-lg-10 col-lg-offset-1 col-xs-12">
                <li class="tags-title">TAGS</li>
				<?php foreach($post->getCategory() as $title => $link): ?>
                    <li><a href="<?= $link; ?>">
                        <li><?= $title; ?></a><li>
                    </li>
				<?php endforeach; ?>
            </ul>
            <ul class="post-social-share">
              <? echo do_shortcode('[DISPLAY_ULTIMATE_SOCIAL_ICONS]'); ?>
            </ul>
             <div class="post-author">
                <div class="post-author-image"><?php echo $post->getAuthorImage(); ?></div>
                <div class="post-author-bio">
                    <h3>
                        <a href='<?= $post->getAuthorUrl()?>'> <?= $post->getAuthorName();?></a>
                    </h3>
                    <?= $post->getAuthorBio(); ?>
                </div>
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
	                echo '<div class="col-md-4 col-sm-6 col-xs-12 post" style="background-image: url('.$single->getImage().')">
                        <div class="post-container">
                            <small>IN '.$single->getCategory().'</small>
                            <h3>'.$single->getTitle().'</h3>
                            <p class="author"><span>'.$single->getAuthorName().'</span> '.$single->getCreatedAt('F j, Y g:i a ').'</p>
                            <p class="excerpt">'.$single->getExcerpt().'</p>
                        </div>
                    </div>';
                }
                ?>
            </div>
        </div>
    </div>

<?php get_footer('hub'); ?>
