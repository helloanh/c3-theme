<?php

namespace CCC\Traits;

use CCC\Services\SinglePost;

trait Post {

	protected $searchBar = false;

	public function hasSearchBar() {
		return $this->searchBar;
	}

	public function includeSearchBar($searchBar) {
		return $this->searchBar = $searchBar;
	}

	public function getTaxonomies($postType) {
		return get_object_taxonomies($postType);
	}

	/**
	 * @param SinglePost $post
	 *
	 * @return string
	 */
	public function getBackgroundImage(SinglePost $post) {
		$style = '';
		if($image = $post->getImage()) {
			$style = ' style="background-image: url('.$image.')"';
		}
		return 'class="background-no-image"' . $style;
	}

	/**
	 * @param SinglePost $post
	 *
	 * @return string
	 */
	public function getBackgroundColor(SinglePost $post, $rgba = false) {
		$color = $post->getMeta('background_color');
		if($color) {
			if($rgba) {
				$color = hex2rgba($color, $rgba);
			}
			return ' style="background-color: '.$color.'"';
		}
		return null;
	}
}