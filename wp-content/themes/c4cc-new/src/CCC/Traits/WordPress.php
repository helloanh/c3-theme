<?php

namespace CCC\Traits;

trait WordPress
{
	function getPage($path) {
		return get_page_by_path($path);
	}

	function getMetaBoxByName($postId, $name, $is_image = false)
	{
		$post_meta_raw = get_post_meta($postId, $name);
		if(is_array($post_meta_raw) && array_key_exists(0, $post_meta_raw))
		{
			$post_meta = $post_meta_raw[0];
			if($is_image) {
				return wp_get_attachment_url($post_meta);
			}
			return $post_meta;
		}
		return null;
	}

	function getMetaBoxes($postId)
	{
		return get_post_meta($postId);
	}

    /**
     * Add Action
     *
     * Helper function to add add_action WordPress filters.
     *
     * @param string $action Name of the action.
     * @param string $function Function to hook that will run on action.
     * @param integer $priority Order in which to execute the function, relation to other functions hooked to this action.
     * @param integer $accepted_args The number of arguments the function accepts.
     */
    protected function addAction( $action, $function, $priority = 10, $accepted_args = 1 )
    {
        // Pass variables into WordPress add_action function
        add_action( $action, $function, $priority, $accepted_args );
    }

    /**
     * Add Filter
     *
     * Create add_filter WordPress filter.
     *
     * @see http://codex.wordpress.org/Function_Reference/add_filter
     *
     * @param  string  $action           Name of the action to hook to, e.g 'init'.
     * @param  string  $function         Function to hook that will run on @action.
     * @param  int     $priority         Order in which to execute the function, relation to other function hooked to this action.
     * @param  int     $accepted_args    The number of arguements the function accepts.
     */
    protected function addFilter( $action, $function, $priority = 10, $accepted_args = 1 )
    {
        // Pass variables into Wordpress add_action function
        add_filter( $action, $function, $priority, $accepted_args );
    }
}
