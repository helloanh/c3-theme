<?php

namespace CCC\Services;

use CCC\Exceptions\TaxonomyException;

class Taxonomy
{
	/**
	 * (required) The name of the taxonomy. Name should only contain lowercase letters and the underscore character,
	 * and not be more than 32 characters long (database structure restriction).
	 *
	 * Default: none
	 *
	 * @var string $taxonomy
	 */
	private $taxonomy;

	/**
	 * (required) Name of the object type for the taxonomy object.
	 * Object-types can be built-in Post Type or any Custom Post Type that may be registered.
	 *
	 * Default: none
	 *
	 * Built-in Post Types: post, page, attachment, revision, nav_menu_item, custom_css, customize_changeset
	 * Custom Post Types:
	 *      {custom_post_type} - Custom Post Type names must be all in lower-case and without any spaces.
	 *      null - Setting explicitly to null registers the taxonomy but doesn't associate it with any objects,
	 *             so it won't be directly available within the Admin UI. You will need to manually register
	 *             it using the 'taxonomy' parameter (passed through $args) when registering a custom post_type
	 *             (see register_post_type()), or using register_taxonomy_for_object_type().
	 *
	 * @var string $taxonomy
	 */
	private $objectType;

	/**
	 * @var array $arguments
	 */
	private $arguments;

	/**
	 * The singular name of the taxonomy
	 *
	 * @var string $single
	 */
	private $single;

	/**
	 * The plural name of the taxonomy
	 *
	 * @var string $plural
	 */
	private $plural;

	/**
	 * Taxonomy constructor.
	 *
	 * @param $taxonomy
	 */
	public function __construct($taxonomy) {
		$this->taxonomy = $taxonomy;
	}

	/**
	 * Register the taxonomy
	 *
	 * @param int $priority
	 * @param int $acceptedArgs
	 */
	public function save($priority = 0, $acceptedArgs = 1)
	{
		add_action('init', function() {
			$this->buildLabels();
			$name = strtolower(str_replace(' ', '_', $this->taxonomy));
			register_taxonomy($name, $this->objectType, $this->arguments);
			$this->arguments = [];
		}, $priority, $acceptedArgs);
	}

	/**
	 * @param string $taxonomy
	 */
	public function setTaxonomy( string $taxonomy ) {
		$this->taxonomy = $taxonomy;
	}

	/**
	 * @param string|array $objectType
	 */
	public function setObjectType( $objectType ) {
		$this->objectType = $objectType;
	}

	/**
	 * (optional) Whether a taxonomy is intended for use publicly either via the admin interface or by front-end users.
	 * The default settings of `$publicly_queryable`, `$show_ui`, and `$show_in_nav_menus` are inherited from `$public`.
	 *
	 * Default: true
	 *
	 * @var boolean $public
	 */
	public function setPublic( bool $public ) {
		$this->arguments['public'] = $public;
	}

	/**
	 * (optional) Whether the taxonomy is publicly queryable.
	 *
	 * Default: $public
	 *
	 * @var boolean $publiclyQueryable
	 */
	public function setPubliclyQueryable( bool $publiclyQueryable ) {
		$this->arguments['publicly_queryable'] = $publiclyQueryable;
	}

	/**
	 * (optional) Whether to generate a default UI for managing this taxonomy.
	 *
	 * Default: if not set, defaults to value of $public argument.
	 * As of 3.5, setting this to false for attachment taxonomies will hide the UI.
	 *
	 * @var boolean $showUi
	 */
	public function setShowUi( bool $showUi ) {
		$this->arguments['show_ui'] = $showUi;
	}

	/**
	 * (optional) Where to show the taxonomy in the admin menu. show_ui must be true.
	 *
	 * Default: value of $showUi argument
	 * 'false' - do not display in the admin menu
	 * 'true' - show as a submenu of associated object types
	 *
	 * @var boolean $showInMenu
	 */
	public function setShowInMenu( bool $showInMenu ) {
		$this->arguments['show_in_menu'] = $showInMenu;
	}

	/**
	 * (optional) true makes this taxonomy available for selection in navigation menus.
	 *
	 * Default: if not set, defaults to value of public argument
	 *
	 * @var boolean $showInNavMenus
	 */
	public function setShowInNavMenus( bool $showInNavMenus ) {
		$this->arguments['show_in_nav_menus'] = $showInNavMenus;
	}

	/**
	 * (optional) Whether to include the taxonomy in the REST API.
	 *
	 * Default: false
	 *
	 * @var boolean $showInRest
	 */
	public function setShowInRest( bool $showInRest ) {
		$this->arguments['show_in_rest'] = $showInRest;
	}

	/**
	 * (optional) To change the base url of REST API route.
	 *
	 * Default: $taxonomy
	 *
	 * @var string $restBase
	 */
	public function setRestBase( string $restBase ) {
		$this->arguments['rest_base'] = $restBase;
	}

	/**
	 * (optional) REST API Controller class name.
	 *
	 * Default: WP_REST_Terms_Controller
	 *
	 * @var string $restControllerClass
	 */
	public function setRestControllerClass( string $restControllerClass ) {
		$this->arguments['rest_controller_class'] = $restControllerClass;
	}

	/**
	 * (optional) Whether to allow the Tag Cloud widget to use this taxonomy.
	 *
	 * Default: if not set, defaults to value of show_ui argument
	 *
	 * @var boolean $showTagcloud
	 */
	public function setShowTagcloud( bool $showTagcloud ) {
		$this->arguments['show_tagcloud'] = $showTagcloud;
	}

	/**
	 * (optional) Whether to show the taxonomy in the quick/bulk edit panel. (Available since 4.2)
	 *
	 * Default: if not set, defaults to value of show_ui argument
	 *
	 * @var boolean $showInQuickEdit
	 */
	public function setShowInQuickEdit( bool $showInQuickEdit ) {
		$this->arguments['show_in_quick_edit'] = $showInQuickEdit;
	}

	/**
	 * (optional) Provide a callback function name for the meta box display. (Available since 3.8)
	 *
	 * Default: null
	 *
	 * Note: Defaults to the categories meta box (post_categories_meta_box() in meta-boxes.php)
	 * for hierarchical taxonomies and the tags meta box (post_tags_meta_box()) for non-hierarchical taxonomies.
	 * No meta box is shown if set to false.
	 *
	 * @var callback $metaBoxCb
	 */
	public function setMetaBoxCb( callable $metaBoxCb ) {
		$this->arguments['meta_box_cb'] = $metaBoxCb;
	}

	/**
	 * (optional) Whether to allow automatic creation of taxonomy columns on associated post-types table. (Available since 3.5)
	 *
	 * Default: false
	 *
	 * @var boolean $showAdminColumn
	 */
	public function setShowAdminColumn( bool $showAdminColumn ) {
		$this->showAdminColumn = $showAdminColumn;
	}

	/**
	 * (optional) Include a description of the taxonomy.
	 *
	 * Default: ""
	 *
	 * @var string $description
	 */
	public function setDescription( string $description ) {
		$this->arguments['description'] = $description;
	}

	/**
	 * (optional) Is this taxonomy hierarchical (have descendants) like categories or not hierarchical like tags.
	 *
	 * Default: false
	 *
	 * Note: Hierarchical taxonomies will have a list with checkboxes to select an existing category in the taxonomy
	 * admin box on the post edit page (like default post categories). Non-hierarchical taxonomies will just have an empty
	 * text field to type-in taxonomy terms to associate with the post (like default post tags).
	 *
	 * @var boolean $hierarchical
	 */
	public function setHierarchical( bool $hierarchical ) {
		$this->arguments['hierarchical'] = $hierarchical;
	}

	/**
	 * (optional) A function name that will be called
	 * when the count of an associated $object_type, such as post, is updated. Works much like a hook.
	 *
	 * Default: None - but see Note, below.
	 *
	 * Note: While the default is '', when actually performing the count update in wp_update_term_count_now(),
	 *      if the taxonomy is only attached to post types (as opposed to other WordPress objects, like user),
	 *      the built-in _update_post_term_count() function will be used to count only published posts associated
	 *      with that term, otherwise _update_generic_term_count() will be used instead, that does no such checking.
	 *
	 * This is significant in the case of attachments. Because an attachment is a type of post,
	 * the default _update_post_term_count() will be used. However, this may be undesirable, because this will only count
	 * attachments that are actually attached to another post (like when you insert an image into a post). This means that
	 * attachments that you simply upload to WordPress using the Media Library, but do not actually attach to another post
	 * will not be counted. If your intention behind associating a taxonomy with attachments was to leverage the Media
	 * Library as a sort of Document Management solution, you are probably more interested in the counts of unattached
	 * Media items, than in those attached to posts. In this case, you should force the use of _update_generic_term_count()
	 * by setting '_update_generic_term_count' as the value for update_count_callback.
	 *
	 * Another important consideration is that _update_post_term_count() only counts published posts.
	 * If you are using custom statuses, or using custom post types where being published is not necessarily
	 * a consideration for being counted in the term count, then you will need to provide your own callback
	 * that doesn't include the post_status portion of the where clause.
	 *
	 * @var string $updateCountCallback
	 */
	public function setUpdateCountCallback( string $updateCountCallback ) {
		$this->arguments['update_count_callback'] = $updateCountCallback;
	}

	/**
	 * (optional) False to disable the query_var, set as string to use custom query_var
	 * instead of default which is $taxonomy, the taxonomy's "name".
	 *
	 * Default: $taxonomy
	 *
	 * Note: The query_var is used for direct queries through WP_Query like new WP_Query(array('people'=>$person_name))
	 * and URL queries like /?people=$person_name. Setting query_var to false will disable these methods, but you can still
	 * fetch posts with an explicit WP_Query taxonomy query like WP_Query(array('taxonomy'=>'people', 'term'=>$person_name)).
	 *
	 * @var boolean|string $queryVar
	 */
	public function setQueryVar( $queryVar ) {
		$this->arguments['query_var'] = $queryVar;
	}

	/**
	 * (optional) Set to false to prevent automatic URL rewriting a.k.a. "pretty permalinks".
	 * Pass an $args array to override default URL settings for permalinks as outlined below:
	 *
	 * Default: true
	 *
	 * 'slug' - Used as pretty permalink text (i.e. /tag/) - defaults to $taxonomy (taxonomy's name slug)
	 * 'with_front' - allowing permalinks to be prepended with front base - defaults to true
	 * 'hierarchical' - true or false allow hierarchical urls (implemented in Version 3.1) - defaults to false
	 * 'ep_mask' - (Required for pretty permalinks) Assign an endpoint mask for this taxonomy - defaults to EP_NONE. If you do not specify the EP_MASK, pretty permalinks will not work. For more info see this Make WordPress Plugins summary of endpoints.
	 *
	 * Note: You may need to flush the rewrite rules after changing this. You can do it manually by going to the Permalink
	 * Settings page and re-saving the rules -- you don't need to change them -- or by calling $wp_rewrite->flush_rules().
	 * You should only flush the rules once after the taxonomy has been created, not every time the plugin/theme loads.
	 *
	 * @var boolean|array $rewrite
	 */
	public function setRewrite( $rewrite ) {
		$this->arguments['rewrite'] = $rewrite;
	}

	/**
	 * (optional) An array of the capabilities for this taxonomy.
	 *
	 * Default: None
	 *
	 * 'manage_terms' - 'manage_categories'
	 * 'edit_terms' - 'manage_categories'
	 * 'delete_terms' - 'manage_categories'
	 * 'assign_terms' - 'edit_posts'
	 *
	 * @var array $capabilities
	 */
	public function setCapabilities( array $capabilities ) {
		$this->arguments['capabilities'] = $capabilities;
	}

	/**
	 * (optional) Whether this taxonomy should remember the order in which terms are added to objects.
	 *
	 * Default: None
	 *
	 * @var boolean $sort
	 */
	public function setSort( bool $sort ) {
		$this->arguments['sort'] = $sort;
	}

	/**
	 * (not for general use) Whether this taxonomy is a native or "built-in" taxonomy. Note: this Codex entry is for
	 * documentation - core developers recommend you don't use this when registering your own taxonomy
	 *
	 * Default: false
	 *
	 * @var boolean $builtin
	 */
	public function setBuiltin( bool $builtin ) {
		$this->arguments['builtin'] = $builtin;
	}

	/**
	 * @param string $single
	 */
	public function setSingle( string $single ) {
		$this->single = $single;
	}

	/**
	 * @param string $plural
	 */
	public function setPlural( string $plural ) {
		$this->plural = $plural;
	}

	private function buildLabels()
	{
		if(!$this->taxonomy)
			throw new TaxonomyException('Please set the Taxonomy name');

		if(!$this->single)
			$this->single = $this->taxonomy;

		if(!$this->plural)
			$this->plural = $this->taxonomy;

		$this->arguments['labels'] = [
			'name'      		         => _x( $this->taxonomy, 'taxonomy general name' ),
			'singular_name'		         => _x( $this->single, 'taxonomy singular name' ),
			'menu_name'			         => __( ucfirst($this->taxonomy) ),
			'all_items'			         => __( 'All ' . ucfirst($this->plural) ),
			'edit_item'                  => __( 'Edit ' . $this->single ),
			'view_item'                  => __( 'View ' . $this->single ),
			'update_item'                => __( 'Update ' . $this->single ),
			'add_new_item'               => __( 'Add New  ' . $this->single ),
			'new_item_name'              => __( 'Add ' . $this->single ),
			'parent_item'                => __( 'Parent ' . $this->single ),
			'parent_item_colon'	         => __( 'Parent ' . $this->single ),
			'search_items'               => __( 'Search ' . $this->plural ),
			'popular_items'              => __( 'Popular ' . $this->plural ),
			'separate_items_with_commas' => __( 'Separate '.$this->plural.' with commas' ),
			'add_or_remove_items'        => __( 'Add or remove tags' . $this->plural ),
			'choose_from_most_used'      => __( 'Choose from the most used ' . $this->plural ),
			'not_found'                  => __( 'No ' . $this->single . ' found' )
		];
	}
}
