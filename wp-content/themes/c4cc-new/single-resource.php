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
            <div class="post-resource">
                <?php
                    $meta_resource = $post->getMeta('choice_a_media');
                    $resource_content = $post->getMeta($meta_resource);
                    if($meta_resource == 'audio') {
                        $audioFileUrl = wp_get_attachment_url($resource_content);
                        echo '<audio controls>
                            <source src="'.$audioFileUrl.'" type="audio/ogg">
                            Your browser does not support the audio element.
                        </audio>';
                    }
                    elseif($meta_resource == 'link') {
                        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $resource_content, $match)) {
                            $output = parse_url($resource_content, PHP_URL_QUERY);
                            $youtube_code = str_replace('v=', '', $output);
                            $video_url = 'https://www.youtube.com/embed/'.$youtube_code;
                        }
                        else {
                            $output = parse_url($resource_content);
                            $vimeo_url = trim($output['path'], '/');
                            $video_url = 'https://player.vimeo.com/video/'.$vimeo_url;
                        }
                        echo '<iframe src="'.$video_url.'" width="100%" height="450" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
                    }
                    else {
                        $audioFileUrl = wp_get_attachment_url($resource_content);
                        echo '<div class="file-download">Resource (PDF/DOCX): <a href="'.$audioFileUrl.'" class="sb-orange">Download it!</a></div>';
                    }
                ?>
            </div>
            <?php
            $imgUrl = $post->getImage();
            $imgCaption = $post->getImageCaption();
            $htmlPostImg1 = "<div class='post-image'><div class='container'><img class='img-responsive' src='";
            $htmlPostImg2 =  "'></div><div class='container post-image-copyright'>";
            $htmlPostImg3 = "<p>$imgCaption</p></div></div>";

            if(!empty($imgUrl)){
                 echo $htmlPostImg1 . $imgUrl . $htmlPostImg2;
                 echo $htmlPostImg3;
            }
        ?>

            <div class="post-story">
                <p><?= apply_filters('the_content', $post->getContent()); ?></p>
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
                <? echo do_shortcode('[DISPLAY_ULTIMATE_SOCIAL_ICONS]'); ?>
          </ul>
      </div>
  </div>

<?php get_footer(); ?>
