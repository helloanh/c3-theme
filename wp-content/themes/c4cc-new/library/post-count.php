<?php
if(!function_exists('post_view_tracker')) {
	function post_view_tracker ($postID) {
		if ( !is_single() ) return;
		if ( empty ( $postID) ) {
			global $post;
			$postID = $post->ID;
		}
		// Process
		if ( !$post_views = get_post_meta( $postID, 'views', true ) ) {
			$post_views = 0;
		}
		update_post_meta( $postID, 'views', ( $post_views + 1 ) );
		do_action( 'postviews_increment_views', ( $post_views + 1 ) );
	}
}

//add_action( 'wp_head', 'post_view_tracker');

//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10);