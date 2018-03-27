<?php

namespace CCC\Data;

use CCC\Contracts\CustomPostTypeDataInterface;
use CCC\Services\PostType;
use CCC\Services\SinglePost;
use CCC\Traits\SearchBar;
use CCC\Traits\Post;

class Event implements CustomPostTypeDataInterface
{
	use Post, SearchBar;

	const NAME = 'event';

	public function __construct() {
		$this->search(self::getName());
		$this->includeSearchBar(true);
	}

	public static function register()
	{
		// The CPT
		$cpt = new PostType();
		$cpt->setName(self::NAME);
		$cpt->setLabel('Events');
		$cpt->setMenuIcon('dashicons-location-alt');
		$cpt->setMenuPosition(7);
		$cpt->setQueryVar(false);
		$cpt->setCapabilityType('page');
		$cpt->addSupport([
			'title', 'excerpt', 'thumbnail', 'editor', 'author'
		]);
		$cpt->setTaxonomies(['category', 'post_tag']);
		$cpt->save();
	}

	/*
		 * Show the top 3 most recent events tagged with “ccc50” category
		 * And The subject related to the campaign
		 *
		 * return string
	*/
		public function lastUpdates($categoryName = 'ccc50', $take = 6) {
				$html = '';
				$posts = PostQuery::type()
					->where('category__or', $categoryName)
					->where('posts_per_page', $take)
					->where('meta_query', array (
						'relation' => 'OR',
						array (
							'key' => 'views',
							'compare' => 'NOT EXISTS'
						),
						array (
							'key' => 'views',
							'value' => 0,
							'compare' => '>='
						)
					))
					->orderBy('meta_value')
					->get();
				if(!empty($posts)) {
					foreach($posts as $post) {
						$post = new SinglePost($post);
						$isVideo = 0 == 1 ? 'latest-post-video' : null;
						$html .= '<div class="col-sm-4 col-xs-12">
			                <div class="cover-post cp-not-full '.$isVideo.'" '.$this->getBackgroundImage($post).'>
			                    <div class="cp-container">
			                    	<div class="cpc-metas cp-metas-bg">';
			                        if($categories = $post->getCategory()) {
			                            foreach($categories as $title => $link) {
			                            	$html .= '<a href="'.$link.'">'.$title.'</a>';
			                            }
			                        }
			                        $html .= '</div><h3 class="cpc-title"><a href="'.$post->getMeta('external_event_url').'">'.$post->getTitle().'</a></h3>
			                        <div class="cpc-post-info">
			                            <strong>'.$post->getCreatedAt('F j, Y g:i a').'</strong>
			                        </div>';
									if($isVideo) {
										$html .= '<div style="width:100%;height:150px;background-color:gray"></div>';
									}
									else {
										$html .= '<p class="cpc-excerpt">'.$post->getExcerpt().'</p>';
									}
			                    $html .= '</div>
			                </div>
			            </div>';
					}
				}
				return $html;
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
										
							<h3 class="cpc-title"><a href="'.$post->getMeta('external_event_url').'">'.$post->getTitle().'</a></h3>
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
