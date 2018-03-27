<?php
/**
 * Clean up WordPress defaults
 *
 * @package its
 * @since its 1.0.0
 */

if ( ! function_exists( 'its_start_cleanup' ) ) :
	function its_start_cleanup() {

		// Launching operation cleanup.
		add_action( 'init', 'its_cleanup_head' );

		// Remove WP version from RSS.
		add_filter( 'the_generator', 'its_remove_rss_version' );

		// Remove pesky injected css for recent comments widget.
		add_filter( 'wp_head', 'its_remove_wp_widget_recent_comments_style', 1 );

		// Clean up comment styles in the head.
		add_action( 'wp_head', 'its_remove_recent_comments_style', 1 );

		// Remove inline width attribute from figure tag
		add_filter( 'img_caption_shortcode', 'its_remove_figure_inline_style', 10, 3 );

	}

	add_action( 'after_setup_theme', 'its_start_cleanup' );
endif;
/**
 * Clean up head.+
 * ----------------------------------------------------------------------------
 */

if ( ! function_exists( 'its_cleanup_head' ) ) :
	function its_cleanup_head() {

		// EditURI link.
		remove_action( 'wp_head', 'rsd_link' );

		// Category feed links.
		remove_action( 'wp_head', 'feed_links_extra', 3 );

		// Post and comment feed links.
		remove_action( 'wp_head', 'feed_links', 2 );

		// Windows Live Writer.
		remove_action( 'wp_head', 'wlwmanifest_link' );

		// Index link.
		remove_action( 'wp_head', 'index_rel_link' );

		// Previous link.
		remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );

		// Start link.
		remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );

		// Canonical.
		remove_action( 'wp_head', 'rel_canonical', 10, 0 );

		// Shortlink.
		remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

		// Links for adjacent posts.
		remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

		// WP version.
		remove_action( 'wp_head', 'wp_generator' );

		// Emoji detection script.
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );

		// Emoji styles.
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
	}
endif;

// Remove WP version from RSS.
if ( ! function_exists( 'its_remove_rss_version' ) ) :
	function its_remove_rss_version() {
		return '';
	}
endif;

// Remove injected CSS for recent comments widget.
if ( ! function_exists( 'its_remove_wp_widget_recent_comments_style' ) ) :
	function its_remove_wp_widget_recent_comments_style() {
		if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
			remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
		}
	}
endif;

// Remove injected CSS from recent comments widget.
if ( ! function_exists( 'its_remove_recent_comments_style' ) ) :
	function its_remove_recent_comments_style() {
		global $wp_widget_factory;
		if ( isset( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'] ) ) {
			remove_action( 'wp_head',
				array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
		}
	}
endif;

// Remove inline width attribute from figure tag causing images wider than 100% of its conainer
if ( ! function_exists( 'its_remove_figure_inline_style' ) ) :
	function its_remove_figure_inline_style( $output, $attr, $content ) {
		$atts = shortcode_atts( array(
			'id'      => '',
			'align'   => 'alignnone',
			'width'   => '',
			'caption' => '',
			'class'   => '',
		), $attr, 'caption' );

		$atts['width'] = (int) $atts['width'];
		if ( $atts['width'] < 1 || empty( $atts['caption'] ) ) {
			return $content;
		}

		if ( ! empty( $atts['id'] ) ) {
			$atts['id'] = 'id="' . esc_attr( $atts['id'] ) . '" ';
		}

		$class = trim( 'wp-caption ' . $atts['align'] . ' ' . $atts['class'] );

		if ( current_theme_supports( 'html5', 'caption' ) ) {
			return '<figure ' . $atts['id'] . ' class="' . esc_attr( $class ) . '">'
			       . do_shortcode( $content ) . '<figcaption class="wp-caption-text">' . $atts['caption'] . '</figcaption></figure>';
		}

	}
endif;

// social warefare social media icon set up 
if(function_exists('social_warfare')) {
	social_warfare();
}


//special capabilities for Fellows Lv1 and Lv2 roles
add_action( 'admin_init', 'ccc_remove_menu_pages' );
function ccc_remove_menu_pages() {
	global $user_ID;
	$fellowRoles = array( 'fellows_lv1', 'fellows_lv2' );
	foreach ( $fellowRoles as $fellowRole ) {
		if ( current_user_can( $fellowRole ) ) {
			remove_menu_page( 'edit.php' ); // Posts
			remove_menu_page( 'edit.php?post_type=release' ); // Posts
			remove_menu_page( 'edit.php?post_type=resource' ); // Posts
			remove_menu_page( 'edit.php?post_type=event' ); // Posts
			remove_menu_page( 'edit.php?post_type=cca_eventphoto' );
			remove_menu_page( 'edit.php?post_type=cca_honoree' );
			remove_menu_page( 'edit-comments.php' ); // Comments
			remove_menu_page( 'edit.php?post_type=thelatest' );
			remove_menu_page( 'tools.php' );                  //Tools
			remove_menu_page( 'options-general.php' );        //Settings
		}
	}
}

//generate custom permalink for ccc permalink
add_filter( 'post_link', 'ccc_blog_permalink', 10, 3 );
function ccc_blog_permalink( $permalink, $post ) {
	// Get the custom post type for the page
	$category = get_post_type( $post->ID );
	if ( ! empty( $category ) && $category[0] == "changewire" ) {
		$permalink = trailingslashit( home_url( '/change-wire/' . sanitize_title( $post->post_title ) . '/' ) );
	}

	return $permalink;
}

//re-write rule for ccc changewire permalink
add_action( 'generate_rewrite_rules', 'ccc_custom_rewrite_rules' );
function ccc_custom_rewrite_rules( $wp_rewrite ) {
	$new_rules['^change-wire/([^/]+)/?$'] = 'index.php/?name=$matches[1]';
	$wp_rewrite->rules                    = $new_rules + $wp_rewrite->rules;

	return $wp_rewrite;
}

/**
 * Retrieve path of category-videos.php template for 'videos' subcategories
 * Filtered via 'category_template' hook
 *
 * @param string Full path to category template file.
 *
 * @return string Full path to category template file.
 */
function get_category_videos_template( $template ) {
	$category_ID     = intval( get_query_var( 'cat' ) );
	$category        = get_category( $category_ID );
	$parent_ID       = $category->parent;
	$parent_category = get_category( $parent_ID );
	/**
	 * Check wheter the $parent_category object is not a WordPress Error and its slug is 'videos'
	 */
	if ( ! is_wp_error( $parent_category ) AND $parent_category->slug == 'changewire' ) {
		/**
		 * Check if the template file exists
		 *
		 */
		if ( file_exists( TEMPLATEPATH . '/category-' . $parent_category->slug . '.php' ) ) {
			return TEMPLATEPATH . '/category-' . $parent_category->slug . '.php';
		}
	} else {
		return $template;
	}
}

add_filter( 'category_template', 'get_category_videos_template' );

// Add WooCommerce support for wrappers per http://docs.woothemes.com/document/third-party-custom-theme-compatibility/
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
add_action( 'woocommerce_before_main_content', 'its_before_content', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
add_action( 'woocommerce_after_main_content', 'its_after_content', 10 );

