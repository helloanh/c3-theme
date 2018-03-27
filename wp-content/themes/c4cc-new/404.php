<?php get_header(); ?>

	<div id="error-page" class="container">

		<h1><?php _e( 'Oops! That page can&rsquo;t be found.', 'c4cc' ); ?></h1>

		<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'c4cc' ); ?></p>

		<?php get_search_form(); ?>

	</div>

<?php get_footer(); ?>