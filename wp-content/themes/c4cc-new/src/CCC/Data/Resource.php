<?php

namespace CCC\Data;

use CCC\Contracts\CustomPostTypeDataInterface;
use CCC\Services\PostType;
use CCC\Services\SinglePost;
use CCC\Traits\SearchBar;
use CCC\Traits\Post;

class Resource implements CustomPostTypeDataInterface
{
	use Post, SearchBar;

	const NAME = 'resource';

	public function __construct() {
		$this->includeSearchBar(true);
	}

	public static function register()
	{
		// The CPT
		$cpt = new PostType();
		$cpt->setName(self::NAME);
		$cpt->setLabel('Resources');
		$cpt->setMenuIcon('dashicons-book');
		$cpt->setMenuPosition(4);
		$cpt->setQueryVar(false);
		$cpt->setCapabilityType('page');
		$cpt->addSupport([
			'title', 'excerpt', 'thumbnail', 'editor', 'author'
		]);
		$cpt->setTaxonomies(['category', 'post_tag']);
		$cpt->save();
	}

	public function __toString() {
		$html = '';
		$posts = $this->search(self::getName());
		if(!empty($posts)) {
			foreach($posts as $post) {
				$post = new SinglePost($post);
				$html .= '<div class="col-md-4 col-sm-6 col-xs-12">
					<div class="cover-post cp-not-full" '.$this->getBackgroundImage($post).'>
						<div class="cp-container"'.$this->getBackgroundColor($post, 0.6).'>
							<h3 class="cpc-title"><a href="'.$post->getPermalink().'">'.$post->getTitle().'</a></h3>
							<p class="cpc-excerpt">'.$post->getExcerpt().'</p>
						</div>
					</div>
				</div>';
			}
		}
		else {
			$html = '<div class="no-search-result">No entry found!</div>';
		}
		return $html;
	}

	public static function getName() {
		return self::NAME;
	}
}
