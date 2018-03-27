<?php

use CCC\Data\ChangeWire;
use \CCC\Data\TheLatest;
use \CCC\Data\Campaign;
use \CCC\Data\Resource;
use \CCC\Data\Event;
use \CCC\Data\Taxonomies;
use CCC\Services\Paginate;

include "library/cleanup.php";
include "library/enqueue-scripts.php";
include "library/nav-walker.php";
include "library/post-count.php";
include "library/helpers.php";
include "library/ccc-legacy.php";
include "vendor/autoload.php";

define('THEMEROOT', dirname(__FILE__));
define('THEME_FOLDER', '/c3-dev');

add_theme_support( 'post-thumbnails' );

add_action( 'login_enqueue_scripts', 'ccc_login_custom_style' );
add_filter( 'login_headerurl', 'ccc_login_logo_url' );
add_filter( 'login_headertitle', 'ccc_login_logo_url_title' );


add_action('after_setup_theme', function() {

	$currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
	Paginate::setBaseUrl(get_site_url())
	        ->currentPage($currentPage)
	        ->setPerPage(9);

	TheLatest::register();
	Campaign::register();
	Resource::register();
	ChangeWire::register();
	Event::register();

	$sharedCptTax = [Resource::NAME, Campaign::NAME, ChangeWire::NAME, Event::NAME];
	Taxonomies::resourceType($sharedCptTax);
	Taxonomies::yearPublished($sharedCptTax);
	Taxonomies::campaignProjectType($sharedCptTax);

});

/* Disable WordPress Admin Bar for all users but admins. */
show_admin_bar(false);

function getCategoryName($baseurl) {
	$url = $baseurl;
	$lastSegment = basename(parse_url($url, PHP_URL_PATH));
	return $lastSegment;
}

function getCategorylink($categoryID) {
	// Get the ID of a given category
	$category_id = get_cat_ID( $categoryID );
	// Get the URL of this category
	$category_link = get_category_link( $category_id );
	return $category_link;
}
flush_rewrite_rules();
