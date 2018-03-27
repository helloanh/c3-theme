<?php
/**
 * Enqueue all styles and scripts
 *
 * Learn more about enqueue_script: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_script}
 * Learn more about enqueue_style: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_style }
 *
 * @package its
 * @since its 1.0.0
 */

if ( ! function_exists( 'its_scripts' ) ) :
    function its_scripts() {

        $assetsPath = get_template_directory_uri() . '/assets/';

        // Enqueue the main Stylesheet.
        wp_enqueue_style( 'font-awesome', $assetsPath . 'components/fontawesome/css/font-awesome.min.css', array(), '4.5.0', 'all' );
        wp_enqueue_style( 'bootstrap', $assetsPath . 'components/bootstrap/dist/css/bootstrap.min.css', array(), '3.3.7', 'all' );
        wp_enqueue_style( 'main-stylesheet', $assetsPath . 'dist/style.css', array(), '1.0.0', 'all' );

        
        if(is_front_page()) {
            //wp_enqueue_style( 'main-stylesheet', $assetsPath . 'stylesheets/home.css', array(), '1.0.0', 'all' );
        }

        // Deregister the jquery version bundled with WordPress.
        wp_deregister_script( 'jquery' );

        // CDN hosted jQuery placed in the header, as some plugins require that jQuery is loaded in the header.
        wp_enqueue_script( 'jquery', $assetsPath . 'components/jquery/dist/jquery.min.js', array(), '2.2.4', false );
        wp_enqueue_script( 'bootstrap', $assetsPath . 'components/bootstrap/dist/js/bootstrap.min.js', array('jquery'), '3.3.7', false );
        wp_enqueue_script( 'app-script', $assetsPath . 'dist/app.js', array('jquery'), '1.0.0', false );

        if(is_admin()) {
	        wp_enqueue_script( 'admin-script', asset('dist/admin.js'), ["jquery"]);
        }

        // Add the comment-reply library on pages where it is necessary
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }

    }

    add_action( 'wp_enqueue_scripts', 'its_scripts' );
endif;


/**
 * Enqueue all styles and scripts for admin
 */

if ( ! function_exists( 'its_admin_scripts' ) ) :
    function its_admin_scripts() {

        $assetsPath = get_template_directory_uri() . '/assets/';

	    // Enqueue the main Stylesheet.
	    wp_enqueue_style( 'admin-style', $assetsPath . 'dist/admin.css' );
        wp_enqueue_script( 'admin-script', asset('dist/admin.js'), ["jquery"]);
    }

	if(is_admin()) {
		add_action( 'admin_enqueue_scripts', 'its_admin_scripts' );
	}
endif;