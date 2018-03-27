<?php

namespace CCC\Data;

use CCC\Contracts\CustomPostTypeDataInterface;
use CCC\Services\PostQuery;
use CCC\Services\PostType;
use CCC\Services\SinglePost;
use CCC\Traits\Post;
use CCC\Traits\SearchBar;

class Campaign implements CustomPostTypeDataInterface
{
	use Post, SearchBar;

	const NAME = 'campaign';

	public function __construct() {
		$this->search(self::getName());
		$this->includeSearchBar(true);
	}

	/**
	 * Register the Campaign CPT
	 */
	public static function register()
	{
		$cpt = new PostType();
		$cpt->setName(self::getName());
		$cpt->setLabel('Campaigns');
		$cpt->setMenuIcon('dashicons-megaphone');
		$cpt->setMenuPosition(6);
		$cpt->setQueryVar(false);
		$cpt->setCapabilityType('page');
		$cpt->addSupport([
			'title', 'thumbnail', 'editor', 'excerpt', 'author'
		]);
		$cpt->setTaxonomies(['category', 'post_tag']);
		$cpt->save();
	}

	/**
	 * Show the top 3 posts with the immigration category
	 *
	 * @return string
	 */
	public function lastUpdates($categoryName = 'all', $take = 3) {
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
	                        $html .= '</div><h3 class="cpc-title"><a href="'.$post->getPermalink().'">'.$post->getTitle().'</a></h3>
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

	/**
	 * Show the top 5 most recent resources
	 * And The subject related to the campaign
	 *
	 * return string
	 */
	public function relatedResources($postId, $taxonomy = '', $take = 5) {
		$html = '';

		$query = PostQuery::type(Resource::getName())
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
		                  ));

		$objTerms = get_the_terms($postId, $taxonomy);
		if(!empty($objTerms)) {
			$terms = array_map(function($term) {
				return $term->term_id;
			}, $objTerms);
		} else {
			$terms = [];
		}

		$query->where('tax_query', [[
			'taxonomy' => $taxonomy,
			'field' => 'term_id',
			'terms' => $terms
		]]);

		$posts = $query->orderBy('meta_value')->get();

		if(!empty($posts)) {
			foreach ( $posts as $post ) {
				$post = new SinglePost( $post );
				$html .= '<li><a href="'.$post->getPermalink().'">'.$post->getTitle().'</a> <a href="'.$post->getAuthorUrl().'" class="resource-author-link">'.$post->getAuthorName().'</a></li>';
			}
		}

		return $html;
	}

	/**
	 * Show the top 3 most recent resources tagged with “immigration”
	 * And The subject related to the campaign
	 *
	 * return string
	 */
	public function topCampaigns($notId, $titleLike, $categoryName = 'all', $take = 3) {
		$html = '';
		$args = [
			'post_title_like' => $titleLike,
			'post_type' => self::getName(),
			'posts_per_page' => $take,
			'category__or'  => $categoryName,
			'orderby' => 'meta_value',
			'post__not_in' => [$notId],
			//'caller_get_posts' => 1,
			'ignore_sticky_posts' => 1,
			'meta_query' => array (
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
			)
		];

		$query = new \WP_Query($args);
		$posts = $query->get_posts();

		if(!empty($posts)) {
			foreach ( $posts as $post ) {
				$post = new SinglePost( $post );
				$html .= '<div class="col-md-4 col-sm-6 col-xs-12">
	                <div class="cover-post" '.$this->getBackgroundImage($post).'>
	                    <div class="cp-container" '.$this->getBackgroundColor($post, 0.9).'>
	                        <h3 class="cpc-title"><a href="'.$post->getPermalink().'">'.$post->getTitle().'</a></h3>
	                        <div class="cpc-post-info">'.ccc_social_share_post($post, ["facebook", "twitter"], "social-links").'</div>
	                        <p class="cpc-excerpt">'.$post->getMeta('campaign_short_description').'</p>
	                    </div>
	                </div>
	            </div>';
			}
		}

		return $html;
	}

	/**
	 * Get the CPT Name
	 *
	 * @return string
	 */
	public static function getName() {
		return self::NAME;
	}

	/**
	 * Show all Campaigns
	 *
	 * @return string
	 */
	public function __toString() {
		$html = '';
		$posts = $this->search(self::getName());
		if(!empty($posts)) {
			foreach($posts as $post) {
				$post = new SinglePost($post);
				$html .= '<div class="col-md-4 col-sm-6 col-xs-12">
					<div class="cover-post cp-not-full" '.$this->getBackgroundImage($post).'>
						<div class="cp-container"'.$this->getBackgroundColor($post, 1).'>
							<h3 class="cpc-title"><a href="'.$post->getPermalink().'">'.$post->getTitle().'</a></h3>
							<p class="cpc-excerpt">'.$post->getMeta('campaign_short_description').'</p>
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
}
