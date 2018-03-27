<?php
get_header();
wp_head();

?>
<main role="main" class="default-page">
    <!-- section -->
    <section class="section-default-page container">
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
            <h1 class="entry-title"><?php the_title(); ?></h1>

            <!-- article -->
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php the_content(); ?>
                <br class="clear">

				<?php edit_post_link(); ?>

            </article>
            <!-- /article -->

		<?php endwhile; ?>

		<?php else: ?>

            <!-- article -->
            <article>

                <h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

            </article>
            <!-- /article -->

		<?php endif; ?>

    </section>
    <!-- /section -->

</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
