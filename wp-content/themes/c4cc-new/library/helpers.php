<?php


if(!function_exists('config')) {
	function config() {
		$configContent = file_get_contents(THEMEROOT.'/app/config.yml');
		$configToArray = Symfony\Component\Yaml\Yaml::parse($configContent);
		return new \CCC\Services\ArrayHelper($configToArray);
	}
}

if(!function_exists('ccc_social_share')) {
	function ccc_social_share($url, $title, $texte, $include = ['facebook', 'twitter'], $wrapper = 'socials-btns', $before = [], $after = []) {
		$page_url_encoded       = urlencode($url);
		$page_title_encoded     = urlencode($title);
		$browser_title_encoded  = urlencode($title);
		$browser_texte_encoded  = urlencode($texte);

		$links = [
			'facebook' => 'https://www.facebook.com/communitychange',
			'twitter' => 'https://twitter.com/communitychange',
			'google-plug' => 'http://plus.google.com/share?url='.$page_url_encoded,
			'linkedin' => 'https://www.linkedin.com/shareArticle?mini=true&url='.$page_url_encoded.'&title='.$page_title_encoded.'&summary='.$browser_texte_encoded.'&source='.$page_url_encoded,
		];

		$html = $wrapper ? '<ul class="'.$wrapper.'">' : '';

		if(!empty($before)) {
			foreach($before as $link) {
				$html .= '<li>'.$link.'</li>';
			}
		}

		foreach($include as $social) {
			if(isset($links[$social]))
				$html .= '<li><a class="social-btn" target="_blank" href="'.$links[$social].'"><i class="fa fa-'.$social.'"></i></a></li>';
		}

		if(!empty($after)) {
			foreach($after as $link) {
				$html .= '<li>'.$link.'</li>';
			}
		}

		if($wrapper)
			$html .= '</ul>';

		return $html;
	}
}

if(!function_exists('ccc_social_share_post') && function_exists('ccc_social_share')) {
	function ccc_social_share_post(\CCC\Services\SinglePost $post, $include = ['facebook', 'twitter'], $wrapper = true, $before = [], $after = []) {
		return ccc_social_share(
			$post->getPermalink(),
			$post->getTitle(),
			$post->getExcerpt(),
			$include,
			$wrapper,
			$before,
			$after
		);
	}
}

if(!function_exists('path')) {
	function path($uri) {
		return get_template_directory_uri() . '/' . $uri;
	}
	if(!function_exists('asset')) {
		function asset($uri) {
			return path('assets/' . $uri);
		}
	}
}

if(!function_exists('getPathInfo')) {
	function getPathInfo() {
		return trim(parse_url(add_query_arg(array()), PHP_URL_PATH), THEME_FOLDER);
	}
}

function ccc_get_search_form( $echo = true ) {
	do_action( 'pre_get_search_form' );
	$format = current_theme_supports( 'html5', 'search-form' ) ? 'html5' : 'xhtml';
	$format = apply_filters( 'search_form_format', $format );
	$search_form_template = locate_template( 'searchform.php' );
	if ( '' != $search_form_template ) {
		ob_start();
		require( $search_form_template );
		$form = ob_get_clean();
	} else {
		if ( 'html5' == $format ) {
			$form = '<form role="search" method="get" id="searchform" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
					<input type="search" class="search-field" placeholder="' . esc_attr_x( 'Search &hellip;', 'placeholder' ) . '" value="' . get_search_query() . '" name="s" />
			</form>';
		} else {
			$form = '<form role="search" method="get" id="searchform" class="searchform" action="' . esc_url( home_url( '/' ) ) . '">
					<input type="text" value="' . get_search_query() . '" name="s" id="s" />
			</form>';
		}
	}
	$result = apply_filters( 'get_search_form', $form );
	if ( null === $result )
		$result = $form;

	if ( $echo )
		echo $result;
	else
		return $result;
}

function wp_list_authors_hub($post_type, $limit = 6) {
	global $wpdb;
	$sql = "SELECT p.post_author, u.display_name, p.ID
		FROM wp_users as u
		INNER JOIN wp_usermeta as um ON um.user_id = u.id
		INNER JOIN (
			SELECT MAX(ID) as ID, post_author
			FROM wp_posts
			WHERE post_type = '".$post_type."'
			GROUP BY post_author
		) as p ON p.post_author = u.id
	 	WHERE um.meta_key = 'wp_capabilities'
	 	AND um.meta_value LIKE '%author%'
	    ORDER BY p.post_author
	    DESC LIMIT $limit";
	return $wpdb->get_results($sql);
}


function wp_list_authors_hub_all($post_type) {
	global $wpdb;
	$sql = "SELECT p.post_author, u.display_name, p.ID
		FROM wp_users as u
		INNER JOIN wp_usermeta as um ON um.user_id = u.id
		INNER JOIN (
			SELECT MAX(ID) as ID, post_author
			FROM wp_posts
			WHERE post_type = '".$post_type."'
			GROUP BY post_author
		) as p ON p.post_author = u.id
	 	WHERE um.meta_key = 'wp_capabilities'
	 	AND um.meta_value LIKE '%author%'
	    ORDER BY p.post_author
	    DESC";
	return $wpdb->get_results($sql);
}


function redirection($time, $url){
	$time = (int)($time);
	echo '<script type="text/javascript">
    gofichier = function(){window.location="'.$url.'"}
    setTimeout(\'gofichier()\',\''.$time.'\');
  </script>';
}

function hex2rgba($color, $opacity = false) {

	$default = 'rgb(0,0,0)';

	//Return default if no color provided
	if(empty($color))
		return $default;

	//Sanitize $color if "#" is provided
	if ($color[0] == '#' ) {
		$color = substr( $color, 1 );
	}

	//Check if color has 6 or 3 characters and get values
	if (strlen($color) == 6) {
		$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
	} elseif ( strlen( $color ) == 3 ) {
		$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
	} else {
		return $default;
	}

	//Convert hexadec to rgb
	$rgb =  array_map('hexdec', $hex);

	//Check if opacity is set(rgba or rgb)
	if($opacity){
		if(abs($opacity) > 1)
			$opacity = 1.0;
		$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
	} else {
		$output = 'rgb('.implode(",",$rgb).')';
	}

	//Return rgb(a) color string
	return $output;
}

function ccc_get_categories_filter() {
	return [
		'community-organizing' => 'Community organizing',
		'health-care' => 'Health care',
		'housing' => 'Housing',
		'immigration' => 'Immigration',
		'politics' => 'Politics',
		'retirement-security' => 'Retirement security',
		'self-care' => 'Self-care',
		null => 'See all'
	];
}

function cc_get_all_cpt() {
	// Get post types
	$post_types = get_post_types(array('public' => true, 'exclude_from_search' => false), 'objects');
	$searchable_types = array();
	// Add available post types
	if( $post_types ) {
		foreach( $post_types as $type) {
			$searchable_types[] = $type->name;
		}
	}
	return $searchable_types;
}

function ccc_login_custom_style() { 
	?>
    <style type="text/css">
    	body.login {

    		background-image: url(https://communitychange.org/wp-content/uploads/2018/01/ccc-outside-v2.jpg);
    		background-repeat: no-repeat;
    		background-attachment: fixed;
    		background-position: center;
    		background-size: cover;
    	}
        #login h1 a, .login h1 a {
        background-image: url(https://communitychange.org/wp-content/uploads/2018/01/c3-white-logo.png);
        background-repeat: no-repeat;
        background-size: 309px 77px;
		height:77px;
		width:309px;
        }
        body.login div#login p#nav a,
        body.login div#login p#backtoblog a {
        	color: #ffffff !important;
        }

        body.login div#login .button.button-large, 
        body.login div#login .button-group.button-large.button {
    	    padding: 0 25px 2px;
    	    border: 0px;
    	    box-shadow: 0 1px 0 #F4a216 !important;
    	    text-shadow: inherit !important;
    	    border-radius: 1px;
    	    background: #F4A216;
        }

        body.login div#login .button-primary {
        	background: #F4A216 !important;
        	border-color: ##F4A216 !important;

        	color: #fff;
        	box-shadow: inherit;
        	text-shadow: inherit;
        }


    </style>
<?php }

function ccc_login_logo_url() {
    return home_url();
}

function ccc_login_logo_url_title() {
    return 'Building a movement led by everyday people.';
}
