<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package c4cc
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function c4cc_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'c4cc_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 */
function c4cc_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'c4cc_body_classes' );

/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 */
function c4cc_enhanced_image_navigation( $url, $id ) {
	if ( ! is_attachment() && ! wp_attachment_is_image( $id ) )
		return $url;

	$image = get_post( $id );
	if ( ! empty( $image->post_parent ) && $image->post_parent != $id )
		$url .= '#main';

	return $url;
}
add_filter( 'attachment_link', 'c4cc_enhanced_image_navigation', 10, 2 );

/**
	 * Returns a "Continue Reading" link for excerpts
	 *
	 * @since Twenty Ten 1.0
	 * @return string "Continue Reading" link
	 */
	function c4cc_continue_reading_link() {
		return ' <a href="'. get_permalink() . '" class="more">' . __( 'Read More >>', 'c4cc' ) . '</a>';
	}

	/**
	 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and c4cc_continue_reading_link().
	 *
	 * To override this in a child theme, remove the filter and add your own
	 * function tied to the excerpt_more filter hook.
	 *
	 * @since Twenty Ten 1.0
	 * @return string An ellipsis
	 */
	function c4cc_auto_excerpt_more( $more ) {
		return '   ' . c4cc_continue_reading_link();
	}
	add_filter( 'excerpt_more', 'c4cc_auto_excerpt_more' );

	/**
	 * Adds a pretty "Continue Reading" link to custom post excerpts.
	 *
	 * To override this link in a child theme, remove the filter and add your own
	 * function tied to the get_the_excerpt filter hook.
	 *
	 * @since Twenty Ten 1.0
	 * @return string Excerpt with a pretty "Continue Reading" link
	 */
	function c4cc_custom_excerpt_more( $output ) {
		if ( has_excerpt() && ! is_attachment() ) {
			$output .= c4cc_continue_reading_link();
		}
		return $output;
	}
	add_filter( 'get_the_excerpt', 'c4cc_custom_excerpt_more' );


/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 */
function c4cc_wp_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	// Add the blog name
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $sep $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $sep " . sprintf( __( 'Page %s', 'c4cc' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'c4cc_wp_title', 10, 2 );

class Menu_With_Description extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'><span class="nav-title">';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</span><br /><span class="sub">' . $item->description . '</span>';
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}