<?php get_header(); ?>

<div id="authors">

	<div class="container authors-title">
		<span>Contributors</span>
	</div>

	<?php
    $currentPage = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	  $authorEmail = get_the_author_meta( 'user_email' );
	  $authorPosts = get_posts([
		'post_type'      => ['changewire'],
		'post_status'    => 'publish',
		'author'         =>  get_the_author_meta('ID'),
		'orderby'        => 'post_date',
		'order'          => 'DESC',
		'paged'          => $currentPage,
		'posts_per_page' => 6
	]);
	?>

	<div class="author-container">
		<div class="container">
			<div class="author-image" style="background-image: url(<?= get_avatar_url($authorEmail)?>;)"></div>
			<div class="author-info">
				<h1><?php the_author(); ?></h1>
				<ul class="social-links">
					<li><a href="<?php the_author_meta('facebook_link'); ?>"><i class="fa fa-facebook"></i></a></li>
					<li><a href="<?php the_author_meta('twitter_link'); ?>"><i class="fa fa-twitter"></i></a></li>
					<li><a href="<?php the_author_meta('url'); ?>"><i class="fa fa-home"></i></a></li>
					<li><a href="<?php the_author_meta('linkedin_link'); ?>"><i class="fa fa-linkedin"></i></a></li>
					<li><a href="mailto:<?= $authorEmail; ?>"><i class="fa fa-envelope"></i></a></li>
				</ul>
				<p><?php the_author_meta( 'description' ); ?></p>
			</div>
		</div>
	</div>

    <div class="container author-posts">
        <div class="stories-list story-border-top">
            <div class="badge">All work</div>
        </div>
        <?php if(!empty($authorPosts)): ?>
        <div class="row">
            <?php
            foreach ($authorPosts as $post) {
                $post = new \CCC\Services\SinglePost($post);
                ?>
                <div class="col-sm-6 col-xs-12">
                    <div class="post-container" style="background-image: url(<?= $post->getImage(); ?>)">
                        <div class="post-info-container">
                            <ul class="post-categories">
                                <?php
                                if(count($categories = $post->getCategory()) > 0) {
	                                foreach($categories as $title => $link) {
	                                    echo '<li><a href="'.$link.'">'.$title.'</a></li>';
                                    }
                                }
                                ?>
                            </ul>
                            <h2><a href="<?= $post->getPermalink(); ?>"><?= $post->getTitle(); ?></a></h2>
                            <div class="post-metas">
                                <strong><?= $post->getAuthorName(); ?></strong>
                                <?= $post->getCreatedAt('F j, Y g:i a'); ?>
                                <span>SHARE</span>
                                <ul class="social-links">
                                    <li><a href="<?php the_author_meta('facebook_link'); ?>"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="<?php the_author_meta('twitter_link'); ?>"><i class="fa fa-twitter"></i></a></li>
                                </ul>
                            </div>
                            <p>
                                <?= $post->getExcerpt(); ?> ...
                                <a href="<?= $post->getPermalink(); ?>" class="post-read-more">Read More</a>
                            </p>
                        </div>
                    </div>
                </div>
                <?php
            }
            $nextPosts = get_next_posts_link( 'Older posts' );
            $prevPosts = get_previous_posts_link( 'Newer posts' );
            ?>
            <div class="pagination">
                <?php if(!empty($nextPosts)): ?>
                <div class="nav-previous alignleft"><?= $nextPosts; ?></div>
                <?php endif; if(!empty($prevPosts)): ?>
                <div class="nav-next alignright"><?= $prevPosts; ?></div>
                <?php endif; ?>
            </div>
        </div>
        <?php else: ?>

        <?php endif; ?>
    </div>

</div>

<?php get_footer(); ?>
