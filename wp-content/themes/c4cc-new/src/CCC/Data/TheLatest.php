<?php

namespace CCC\Data;

use CCC\Contracts\CustomPostTypeDataInterface;
use CCC\Services\PostQuery;
use CCC\Services\PostType;
use CCC\Traits\Post;

class TheLatest implements CustomPostTypeDataInterface
{
	use Post;

	const NAME = 'the latest';

	public static function register()
	{
		$cpt = new PostType();
		$cpt->setName(self::getName());
		$cpt->setMenuIcon('dashicons-star-filled');
		$cpt->addSupport([
			'title', 'thumbnail', 'editor', 'excerpt', 'author'
		]);
		$cpt->save();
	}

	public function __toString() {
		$posts = PostQuery::type(self::getName())
		                  ->take(9)
		                  ->orderBy('menu_order', 'ASC')
		                  ->get();

		return $this->getTheLatestSingleHtml($posts);
	}

	public function getTheLatestSingleHtml($posts)
	{
		$html = '';
		if(!empty($posts)) {
			foreach($posts as $post) {
				$post = new TheLatestSinglePost($post);
				$category = $post->getCategory(null);
				$html .= '<div class="col-md-4 col-sm-6 col-xs-12 cover-post" '.$this->getBackgroundImage($post).'>
					<div class="cp-container">
						<div class="cpc-metas">IN: <a href="'.$category['link'].'">'.$category['name'].'</a></div>
						<h3 class="cpc-title"><a href="'.$post->getMeta('link_to_an_external_post').'">'.$post->getTitle().'</a></h3>
						<p class="cpc-post-info"><span>'.$post->getAuthorName().' - </span> '.$post->getCreatedAt('F j, Y g:i a ').'</p>
						<p class="cpc-excerpt">'.$post->getExcerpt().'</p>
					</div>
				</div>';
			}
		}
		return $html;
	}

	public static function getName() {
		return self::NAME;
	}
}
