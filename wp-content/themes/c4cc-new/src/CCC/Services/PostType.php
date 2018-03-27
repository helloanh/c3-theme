<?php

namespace CCC\Services;

use CCC\Exceptions\PostTypeException;
use CCC\Traits\WordPress;

class PostType
{
    use WordPress;

    /**
     * general name for the post type, usually plural.
     * The same and overridden by $post_type_object->label.
     * Default is Posts/Pages
     *
     * @var string $name
     */
    private $name;
    private $label;

    /**
     * name for one object of this post type.
     * Default is Post/Page
     *
     * @var string $single
     */
    private $single;

    /**
     * (optional) The string to use to build the read, edit, and delete capabilities.
     * May be passed as an array to allow for alternative plurals when using this argument as a base to construct the capabilities,
     * e.g. array('story', 'stories') the first array element will be used for the singular capabilities and the second array element
     * for the plural capabilities, this is instead of the auto generated version if no array is given which would be "storys".
     * The 'capability_type' parameter is used as a base to construct capabilities unless they are explicitly set with the 'capabilities' parameter.
     * It seems that `map_meta_cap` needs to be set to false or null
     *
     * @var string $type
     */
    private $capabilityType;

    /**
     * (optional) Whether to generate a default UI for managing this post type in the admin.
     *
     * Default: value of public argument
     *      'false' - do not display a user-interface for this post type
     *      'true' - display a user-interface (admin panel) for this post type
     *
     * Note: _built-in post types, such as post and page, are intentionally set to false.
     *
     * @var boolean $showUi
     */
    private $showUi;

    /**
     * (optional) Where to show the post type in the admin menu. show_ui must be true.
     *
     * Default: value of show_ui argument
     *      'false' - do not display in the admin menu
     *      'true' - display as a top level menu
     *      'some string' - If an existing top level page such as 'tools.php' or 'edit.php?post_type=page',
     *                      the post type will be placed as a sub menu of that.
     *
     * Note: When using 'some string' to show as a submenu of a menu page created by a plugin,
     * this item will become the first submenu item, and replace the location of the top-level link.
     * If this isn't desired, the plugin that creates the menu page needs to set the add_action priority for admin_menu to 9 or lower.
     *
     * Note: As this one inherits its value from show_ui, which inherits its value from public,
     * it seems to be the most reliable property to determine, if a post type is meant to be publicly useable.
     * At least this works for _builtin post types and only gives back post and page.
     *
     * @var boolean $showInMenu
     */
    private $showInMenu;

    /**
     * (optional) Whether the post type is hierarchical (e.g. page).
     * Allows Parent to be specified. The 'supports' parameter should contain 'page-attributes' to show the parent select box on the editor page.
     * Default: false
     *
     * Note: this parameter was intended for Pages.
     * Be careful when choosing it for your custom post type - if you are planning to have very many entries (say - over 2-3 thousand),
     * you will run into load time issues.
     * With this parameter set to true WordPress will fetch all IDs of that particular post type on each administration page load for your post type.
     * Servers with limited memory resources may also be challenged by this parameter being set to true.
     *
     * @var boolean $hierarchical
     */
    private $hierarchical;

    /**
     *  (optional) The position in the menu order the post type should appear. show_in_menu must be true.
     * Default: null - defaults to below Comments
     *  5 - below Posts
     *  10 - below Media
     *  15 - below Links
     *  20 - below Pages
     *  25 - below comments
     *  60 - below first separator
     *  65 - below Plugins
     *  70 - below Users
     *  75 - below Tools
     *  80 - below Settings
     *  100 - below second separator
     *
     * @var integer $menuPosition
     */
    private $menuPosition;

    /**
     * (optional) The url to the icon to be used for this menu or the name of the icon from the iconfont
     *
     * @var string $menuIcon
     */
    private $menuIcon;

    /**
     * CPT description
     *
     * @var string $description
     */
    private $description;

    /**
     * (optional) Controls how the type is visible to authors (show_in_nav_menus, show_ui) and readers (exclude_from_search, publicly_queryable).
     *
     * Default: false
     *      'true' - Implies exclude_from_search: false, publicly_queryable: true, show_in_nav_menus: true, and show_ui:true.
     *              The built-in types attachment, page, and post are similar to this.
     *      'false' - Implies exclude_from_search: true, publicly_queryable: false, show_in_nav_menus: false, and show_ui: false.
     *              The built-in types nav_menu_item and revision are similar to this.
     *              Best used if you'll provide your own editing and viewing interfaces (or none at all).
     *
     * If no value is specified for exclude_from_search, publicly_queryable, show_in_nav_menus, or show_ui, they inherit their values from public.
     *
     * @var boolean $public
     */
    private $public;

    /**
     * (optional) Whether post_type is available for selection in navigation menus.
     * Default: value of public argument
     *
     * @var boolean $showInNavMenu
     */
    private $showInNavMenu;

    /**
     * (optional) Whether to make this post type available in the WordPress admin bar.
     * Default: value of the show_in_menu argument
     *
     * @var boolean $showInAdminBar
     */
    private $showInAdminBar;

    /**
     * Add the ability to export the content & parameters
     *
     * @var boolean $canExport
     */
    private $canExport;

    /**
     * Add the ability to be archived
     *
     * @var boolean $hasArchive
     */
    private $hasArchive;

    /**
     * (importance) Whether to exclude posts with this post type from front end search results.
     *
     * Default: value of the opposite of public argument
     *      'true' - site/?s=search-term will not include posts of this post type.
     *      'false' - site/?s=search-term will include posts of this post type.
     *
     * Note: If you want to show the posts's list that are associated to taxonomy's terms,
     * you must set exclude_from_search to false (ie : for call site_domaine/?taxonomy_slug=term_slug or site_domaine/taxonomy_slug/term_slug).
     * If you set to true, on the taxonomy page (ex: taxonomy.php) WordPress will not find your posts and/or pagination will make 404 error...
     *
     * @var boolean $excludeFromSearch
     */
    private $excludeFromSearch;

	/**
	 * (optional) Sets the query_var key for this post type.
	 * Default: true - set to $post_type
	 *
	 * 'false' - Disables query_var key use. A post type cannot be loaded at /?{query_var}={single_post_slug}
	 * 'string' - /?{query_var_string}={single_post_slug} will work as intended.
	 *
	 * Note: The query_var parameter has no effect if the ‘publicly_queryable’ parameter is set to false.
	 *      query_var adds the custom post type’s query var to the built-in query_vars array so that WordPress
	 *      will recognize it. WordPress removes any query var not included in that array.
	 *
	 * @var boolean|string $queryVar
	 */
    private $queryVar;

    /**
     * (optional) Whether queries can be performed on the front end as part of parse_request().
     * Default: value of public argument
     *
     * Note: The queries affected include the following (also initiated when rewrites are handled)
     *      ?post_type={post_type_key}
     *      ?{post_type_key}={single_post_slug}
     *      ?{post_type_query_var}={single_post_slug}
     *
     * Note: If query_var is empty, null, or a boolean FALSE, WordPress will still attempt to interpret it (4.2.2) and previews/views of your custom post will return 404s.
     *
     * @var boolean $publiclyQueryable
     */
    private $publiclyQueryable;

	/**
	 * (optional) Triggers the handling of rewrites for this post type. To prevent rewrites, set to false.
	 * Default: true and use $post_type as slug
	 *
	 * $args array
	 * 'slug' => string Customize the permalink structure slug. Defaults to the $post_type value. Should be translatable.
	 * 'with_front' => bool Should the permalink structure be prepended with the front base. (example: if your permalink structure is /blog/, then your links will be: false->/news/, true->/blog/news/). Defaults to true
	 * 'feeds' => bool Should a feed permalink structure be built for this post type. Defaults to has_archive value.
	 * 'pages' => bool Should the permalink structure provide for pagination. Defaults to true
	 * 'ep_mask' => const As of 3.4 Assign an endpoint mask for this post type. For more info see Rewrite API/add_rewrite_endpoint, and Make WordPress Plugins summary of endpoints.
	 * If not specified, then it inherits from permalink_epmask(if permalink_epmask is set), otherwise defaults to EP_PERMALINK.
	 *
	 * Note: If registering a post type inside of a plugin, call flush_rewrite_rules()
	 *      in your activation and deactivation hook (see Flushing Rewrite on Activation below).
	 *      If flush_rewrite_rules() is not used, then you will have to manually go to Settings > Permalinks
	 *      and refresh your permalink structure before your custom post type will show the correct structure.
	 *
	 * @var boolean|array $rewrite
	 */
    private $rewrite;

    /**
     * (optional) An alias for calling add_post_type_support() directly. As of 3.5,
     * boolean false can be passed as value instead of an array to prevent default (title and editor) behavior.
     *
     * Default: title and editor
     * 'title'
     * 'editor' (content)
     * 'author'
     * 'thumbnail' (featured image, current theme must also support post-thumbnails)
     * 'excerpt'
     * 'trackbacks'
     * 'custom-fields'
     * 'comments' (also will see comment count balloon on edit screen)
     * 'revisions' (will store revisions)
     * 'page-attributes' (menu order, hierarchical must be true to show Parent option)
     * 'post-formats' add post formats, see Post Formats
     *
     * Note: When you use custom post type that use thumbnails remember to check that the theme also supports thumbnails or use add_theme_support function.
     *
     * @var array|boolean $supports
     */
    private $supports;

    /**
     * @var array $allowedFeatures
     */
    private $allowedFeatures;

	/**
	 * @var array $taxonomies
	 */
	private $taxonomies;

	/**
	 * Initialize CPT variables
	 */
    public function __construct()
    {
	    $this->flush();
        $this->allowedFeatures = [
            'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks',
            'custom-fields', 'comments', 'revisions', 'page-attributes', 'post-formats'
        ];
    }

	/**
	 * Create the CPT
	 *
	 * @param int $priority
	 * @param int $acceptedArgs
	 */
    public function save($priority = 0, $acceptedArgs = 1)
    {
	    add_action('init', function() {
            $labels = $this->buildLabels();
            $args = $this->buildArgs($labels);
            register_post_type($this->name, $args);
        }, $priority, $acceptedArgs);
    }

    /**
     * Build an Array or string of arguments for registering a post type
     * @param $labels
     * @return array
     */
    private function buildArgs($labels)
    {
        return [
            'label'             => $this->name,
            'description'       => $this->description,
            'labels' 			=> $labels,
            // Features this CPT supports in Post Editor
            'supports' 			=> $this->supports,
            // You can associate this CPT with a taxonomy or custom taxonomy.
            'taxonomies'        => $this->taxonomies,
            /**
             * A hierarchical CPT is like Pages and can have
             * Parent and child items. A non-hierarchical CPT
             * is like Posts.
             */
            'hierarchical' 		    => $this->hierarchical,
            'public'                => $this->public,
            'show_ui' 			    => $this->showUi,
            'show_in_menu'		    => $this->showInMenu,
            'show_in_nav_menus'     => $this->showInNavMenu,
            'show_in_admin_bar'     => $this->showInAdminBar,
            'can_export'            => $this->canExport,
            'has_archive'           => $this->hasArchive,
            'menu_positions' 	    => $this->menuPosition,
            'exclude_from_search'   => $this->excludeFromSearch,
            'publicly_queryable'    => $this->publiclyQueryable,
            'menu_icon'			    => $this->menuIcon,
            'capability_type' 	    => $this->capabilityType,
	        'rewrite'               => $this->rewrite,
	        'query_var'             => $this->queryVar
        ];
    }

    /**
     * Build an array of labels for this post type. If not set, post
     * labels are inherited for non-hierarchical types and page
     * labels for hierarchical ones. See get_post_type_labels() for a full
     * list of supported labels.
     * @return array
     * @throws PostTypeException if the CPT's name not provided
     */
    private function buildLabels()
    {
        if(!$this->name)
            throw new PostTypeException('Please set the CPT name');

        if(!$this->single)
            $this->single = $this->name;

        return [
            'name'      		 => ucfirst($this->label),
            'singular_name'		 => ucfirst($this->single),
            'menu_name'			 => ucfirst($this->label),
            'all_items'			 => 'All ' . ucfirst($this->label),
            'name_admin_bar'	 => $this->single,
            'parent_item_colon'	 => 'Parent' . $this->label,
            'view_item'          => 'View ' . $this->single,
            'add_new_item'       => 'Add New  ' . strtoupper($this->single),
            'add_item'           => 'Add ' . $this->single,
            'edit_item'          => 'Edit ' . $this->single,
            'update_item'        => 'Update ' . $this->single,
            'search_items'       => 'Search ' . $this->single,
            'attributes'         => ucfirst($this->label) . ' Attributes',
            'not_found'          => 'No ' . $this->single . ' found',
            'not_found_in_trash' => 'No ' . $this->single . ' found in Trash'
        ];
    }

	/**
	 * Add features to the CPT
	 * @param array|string $features
	 */
	public function addSupport($features)
	{
		if(!empty($features)) {
			if(is_array($features)) {
				foreach($features as $feature)
					$this->addSupport($feature);
			}
			else {
				if(in_array($features, $this->allowedFeatures))
					$this->supports[] = $features;
			}
		}
	}

    /**
     * Remove support of certain features for a given CPT
     * @param string $name CPT Name
     * @param string $feature Support feature
     * @throws PostTypeException When the CPT/Feature not found
     */
    public function removeSupport($name, $feature)
    {
        if(!post_type_exists($name))
            throw new PostTypeException("No CPT ($name) found");

        if(!in_array($feature, $this->allowedFeatures))
            throw new PostTypeException("The feature need to be one of thoses (".implode(', ', $this->allowedFeatures).")");

        remove_post_type_support($name, $feature);
    }

	/**
	 * Add admin columns
	 *
	 * Adds columns to the admin edit screen. Function is used with add_action
	 *
	 * @param array $columns Columns to be added to the admin edit screen.
	 * @return array
	 */
	function addAdminColumns( $columns )
	{
		// If no user columns have been specified, add taxonomies
		if ( ! isset( $this->columns ) ) {

			$new_columns = array();

			// determine which column to add custom taxonomies after
			if ( is_array( $this->taxonomies ) && in_array( 'post_tag', $this->taxonomies ) || $this->name === 'post' ) {
				$after = 'tags';
			} elseif( is_array( $this->taxonomies ) && in_array( 'category', $this->taxonomies ) || $this->name === 'post' ) {
				$after = 'categories';
			} elseif( post_type_supports( $this->name, 'author' ) ) {
				$after = 'author';
			} else {
				$after = 'title';
			}

			// foreach exisiting columns
			foreach( $columns as $key => $title ) {

				// add exisiting column to the new column array
				$new_columns[$key] = $title;

				// we want to add taxonomy columns after a specific column
				if( $key === $after ) {

					// If there are taxonomies registered to the post type.
					if ( is_array( $this->taxonomies ) ) {

						// Create a column for each taxonomy.
						foreach( $this->taxonomies as $tax ) {

							// WordPress adds Categories and Tags automatically, ignore these
							if( $tax !== 'category' && $tax !== 'post_tag' ) {
								// Get the taxonomy object for labels.
								$taxonomy_object = get_taxonomy( $tax );

								// Column key is the slug, value is friendly name.
								$new_columns[ $tax ] = sprintf( '%s', $taxonomy_object->labels->name );
							}
						}
					}
				}
			}

			// overide with new columns
			$columns = $new_columns;

		} else {

			// Use user submitted columns, these are defined using the object columns() method.
			$columns = $this->columns;
		}

		return $columns;
	}

    /**
     * Initialize the parameters
     */
    private function flush()
    {
        $this->name = null;
        $this->single = null;
        $this->capabilityType = 'post';
        $this->showUi = true;
        $this->showInMenu = true;
        $this->hierarchical = false;
        $this->menuPosition = null;
        $this->taxonomies = [];
        $this->menuIcon = null;
        $this->description = '';
        $this->public = true;
        $this->showInNavMenu = true;
        $this->showInAdminBar = true;
        $this->canExport = true;
        $this->hasArchive = true;
        $this->excludeFromSearch = false;
        $this->publiclyQueryable = true;
        $this->supports = ['title'];
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $name = strtolower($name);

        if(!$this->single)
            $this->single = $name;

        $this->name  = $name;
        $this->label = $name;
    }

	/**
	 * @param string $label
	 *
	 * @internal param string $name
	 */
    public function setLabel(string $label)
    {
        $this->label = ucwords($label);
    }

    /**
     * @param string $single
     */
    public function setSingle(string $single)
    {
        $this->single = strtolower($single);
    }

    /**
     * @param string $capabilityType
     */
    public function setCapabilityType(string $capabilityType)
    {
        $this->capabilityType = $capabilityType;
    }

    /**
     * @param boolean $showUi
     */
    public function setShowUi(bool $showUi)
    {
        $this->showUi = $showUi;
    }

    /**
     * @param boolean $showInMenu
     */
    public function setShowInMenu(bool $showInMenu)
    {
        $this->showInMenu = $showInMenu;
    }

    /**
     * @param boolean $hierarchical
     */
    public function setHierarchical(bool $hierarchical)
    {
        $this->hierarchical = $hierarchical;
    }

    /**
     * @param int $menuPosition
     */
    public function setMenuPosition(int $menuPosition)
    {
        $this->menuPosition = $menuPosition;
    }

    /**
     * @param string $menuIcon
     */
    public function setMenuIcon(string $menuIcon)
    {
        $this->menuIcon = $menuIcon;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * @param boolean $public
     */
    public function setPublic(bool $public)
    {
        $this->public = $public;
    }

    /**
     * @param boolean $showInNavMenu
     */
    public function setShowInNavMenu(bool $showInNavMenu)
    {
        $this->showInNavMenu = $showInNavMenu;
    }

    /**
     * @param boolean $showInAdminBar
     */
    public function setShowInAdminBar(bool $showInAdminBar)
    {
        $this->showInAdminBar = $showInAdminBar;
    }

    /**
     * @param boolean $canExport
     */
    public function setCanExport(bool $canExport)
    {
        $this->canExport = $canExport;
    }

    /**
     * @param boolean $hasArchive
     */
    public function setHasArchive(bool $hasArchive)
    {
        $this->hasArchive = $hasArchive;
    }

    /**
     * @param boolean $excludeFromSearch
     */
    public function setExcludeFromSearch(bool $excludeFromSearch)
    {
        $this->excludeFromSearch = $excludeFromSearch;
    }

    /**
     * @param boolean $publiclyQueryable
     */
    public function setPubliclyQueryable(bool $publiclyQueryable)
    {
        $this->publiclyQueryable = $publiclyQueryable;
    }

	/**
	 * @param boolean|string $queryVar
	 */
	public function setQueryVar($queryVar)
    {
        $this->queryVar = $queryVar;
    }

    /**
     * @param boolean|array $rewrite
     */
    public function setRewrite($rewrite)
    {
        $this->rewrite = $rewrite;
    }

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param array $taxonomies
	 */
	public function setTaxonomies( array $taxonomies ) {
		$this->taxonomies = $taxonomies;
	}

	/**
	 * @param $taxonomyName
	 *
	 * @return Taxonomy
	 */
	public function addTaxonomy($taxonomyName) {
		return new Taxonomy($taxonomyName);
	}
}
