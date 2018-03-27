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
              <!-- <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
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
          <p>by <a href="<?= $post->getAuthorUrl()?>"><?= $post->getAuthorName(); ?></a> | <?= $post->getCreatedAt('F j, Y g:i a'); ?></p>

      </div>
        <div class="container">
            <div class="post-story">
                <p><?= $post->getContent(); ?></p>
            </div>
        </div>
      
    </div>
    <div class="container">
          <ul class="post-tags">
              <li class="tags-title">Category</li>
      <?php foreach($post->getCategory() as $title => $link): ?>
                  <li><a href="<?= $link; ?>"><?= $title; ?></a></li
      <?php endforeach; ?>
          </ul>
          <ul class="post-social-share">
                <? echo do_shortcode('[social_warfare]'); ?>

          </ul>
      </div>
  </div>

<?php get_footer(); ?>
