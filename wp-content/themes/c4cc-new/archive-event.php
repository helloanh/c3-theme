<?php 
use CCC\Services\SinglePost;
$post = new SinglePost();
post_view_tracker($post->getId());

$loop = new WP_Query(
    array(
        'post_type' => 'event',
        'posts_per_page' => -1
    )
);
get_header(); ?>

<div id="event-archive" style="margin-top: 80px;">
        <div class="container">
            <h2>Archive: Events</h2>
            <div class="content">
                <?php  if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <div id="post-<?php the_ID(); ?>">
                            <div class="post-header">
                                <h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                                <div class="author"><?php the_author(); ?>
                                    <p><?php the_date('F j, Y'); ?> at <?php the_time('g:i a'); ?></p>
                                </div>

                            </div><!--end post header-->
                            <div class="entry">
                                <?php the_excerpt(); ?>
                                <?php edit_post_link(); ?>
                                <?php wp_link_pages(); ?>
                            </div><!--end entry-->
                        </div><!--end post-->
                    <?php endwhile; /* rewind or continue if all posts have been fetched */ ?>
                    <div class="navigation index">
                        <div class="alignleft"><?php next_posts_link( 'Older Entries' ); ?></div>
                        <div class="alignright"><?php previous_posts_link( 'Newer Entries' ); ?></div>
                    </div><!--end navigation-->
                <?php else : ?>
                <?php endif; ?>

            </div>
        </div>
</div>

<?php get_footer(); ?>

<?php
get_footer(); ?>

