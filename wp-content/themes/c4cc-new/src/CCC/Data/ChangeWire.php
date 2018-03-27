<?php

namespace CCC\Data;

use CCC\Contracts\CustomPostTypeDataInterface;
use CCC\Services\ArrayHelper;
use CCC\Services\MetaBox;
use CCC\Services\PostQuery;
use CCC\Services\PostType;
use CCC\Services\SinglePost;
use CCC\Traits\Post;

class ChangeWire implements CustomPostTypeDataInterface
{
	use Post;

	const NAME = 'change wire';

	public static function register()
	{
		$cpt = new PostType();
		$cpt->setName(self::getName());
		$cpt->setLabel('Change Wire');
		$cpt->setMenuIcon('dashicons-clipboard');
		$cpt->setPubliclyQueryable(true);
		$cpt->setRewrite([
			'slug' => 'change-wire', 'with_front' => true
		]);
		$cpt->addSupport([
			'title', 'thumbnail', 'editor', 'excerpt', 'author'
		]);
		$cpt->setTaxonomies(['category', 'post_tag']);
		$cpt->save();

		self::featuredPostAdmin();
	}

	public function TheLatest() {
		$html = '';
		$posts = PostQuery::type(self::getName())
		                  ->take(3)
		                  ->get();
		if(!empty($posts)) {
			foreach($posts as $post) {
				$post = new SinglePost($post);
				$html .= '<div class="short-story story-sm">
                    <a href="'.$post->getPermalink().'"><h3>'.$post->getTitle().'</h3></a>
                    <p><em><a href="'.$post->getAuthorUrl().'">'.$post->getAuthorName().'</a></em></p><p>'.$post->getExcerptShort().' ... </p>
                </div>';
			}
		}
		return $html;
	}

	public function TheLatestAll() {
		$html = '';
		$posts = PostQuery::type(self::getName())
		                  ->get();
		if(!empty($posts)) {
			foreach($posts as $post) {
				$post = new SinglePost($post);
				$html .= '<div class="col-lg-12">
                    <a href="'.$post->getPermalink().'"><h3>'.$post->getTitle().'</h3></a>
                    <p><em><a href="'.$post->getAuthorUrl().'">'.$post->getAuthorName().'</a></em></p><p>'.$post->getExcerptShort().' ... </p>
                </div>';
			}
		}
		return $html;
	}

	/* new headlines() take changewire CPT with category 'headlines' */
	

	public function inTheHeadlinesCategory($categoryName = 'headlines', $take = 4) {
		$html = '';
		$posts = PostQuery::type(self::getName())
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
								$html .= '<p class="cpc-excerpt">'.$post->getExcerptShort().'</p>';
							}
	                    $html .= '</div>
	                </div>
	            </div>';
			}
		}
		return $html;


	}

	public function inTheHeadlines($number = 3) {
		$html = '';
		$posts = PostQuery::type(TheLatest::getName())
		                  ->take($number)
		                  ->orderBy('menu_order', 'AS')
		                  ->get();
		if(!empty($posts)) {
			foreach($posts as $post) {
				$post = new TheLatestSinglePost($post);
				$html .= '<div class="short-story story-md">
                    <div class="story-info">';
						if($category = $post->getCategory('array')) {
							$html .= '<a class="black-link" href="'.$category['link'].'">'.$category['name'].'</a>';
						}
                        $html .='<a class="magenta-link" href="'.$post->getAuthorUrl().'">'.$post->getAuthorName().'</a>
                        <span>'.$post->getCreatedAt('F j, Y g:i a').'</span>
                    </div>
                    <div class="story-content row">
                        <div class="col-md-5">
                            <div class="story-background" '.$this->getBackgroundImage($post).'></div>
                        </div>
                        <div class="col-md-7">
                            <h4><a href="'.$post->getPermalink().'">'.$post->getTitle().'</a></h4>
                            <p>'.$post->getExcerptShort().' ... </p>
                        </div>
                    </div>
                </div>';
			}
		}
		return $html;
	}

	public function mostRead($num = 6) {
		$html = '';
		$posts = PostQuery::type(self::getName())
		                  ->take($num)
		                  ->orderBy('meta_value', 'DESC')
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
		                  ->get();
		if(!empty($posts)) {
			foreach($posts as $key => $post) {
				$post = new SinglePost($post);
				$html .= '<div class="short-story story-xs">
                    <h4>'.($key+1).'</h4>
                    <h5>
                    	<a href="'.$post->getPermalink().'">'.$post->getTitle().'</a>
                    	<a href="'.$post->getAuthorUrl().'"> <span id="most-read-author"><em> by '.$post->getAuthorName().'</em></span></a>  ' .$post->getViews().' Views
                    </h5>

                </div>';
			}
		}
		return $html;
	}

	public function mostReadAll() {
		$html = '';
		$posts = PostQuery::type(self::getName())
						  ->take(30)
		                  ->orderBy('meta_value', 'DESC')
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
		                  ->get();
		if(!empty($posts)) {
			foreach($posts as $key => $post) {
				$post = new SinglePost($post);
				$html .= '<div class="col-lg-12">
                    <h4>'.($key+1).'</h4>
                    <h5>
                    	<a href="'.$post->getPermalink().'">'.$post->getTitle().'</a>
                    	<a href="'.$post->getAuthorUrl().'"> <span id="most-read-author"><em> by '.$post->getAuthorName().'</em></span></a>  ' .$post->getViews().' Views
                    </h5>

                </div>';
			}
		}
		return $html;

	}

	public function featuredPost() {
		$posts = PostQuery::type(self::getName())
		                  ->take(1)
		                  ->where('meta_query', array (
							  array (
								  'key' => 'featured_story',
								  'value' => 1,
								  'compare' => '=',
							  )
						  ))
		                  ->get();
		return isset($posts[0]) ? new SinglePost($posts[0]) : null;
	}

	public function videos($num = 4) {
		$html = '';
		$posts = PostQuery::type(self::getName())
		                  ->take($num)
		                  ->orderBy('meta_value', 'DESC')
		                  ->where('meta_query', array (
							  array (
								  'key' => 'link_to_video',
								  'value' => "^(http:\/\/|https:\/\/)(vimeo\.com|facebook.\com|youtu\.be|www\.youtube\.com)",
								  'compare' => 'REGEXP',
							  )
						  ))
		                  ->get();
		if(!empty($posts)) {
			foreach($posts as $key => $post) {
				$post = new SinglePost($post);
				$imageVideoLink = $post->getMetaEmbedImage('link_to_video');
				$backgroundImage = $imageVideoLink ? $imageVideoLink : $post->getImage();
				$html .= '<div class="video-story video-story'.($key+1).'">
                    <a href="'.$post->getPermalink().'" class="video" style="background-image: url('.$backgroundImage.')">
                        <!-- play icon -->
                    </a>
                    <div class="video-text">
                        <h2><a href="'.$post->getPermalink().'">'.$post->getTitle().'</a></h2>
                        <p>'.$post->getExcerpt().'</p>
                        <div class="more-info">';
                            if($categories = $post->getCategory()) {
                            	foreach($categories as $key => $value) {
                            		$html .= '<span class="video-meta"><a href="'.$value.'">'.$key.'</a></span>';
	                            }
                            }
                            $html .= $post->getCreatedAt('F j, Y g:i a').'
                        </div>
                    </div>
                </div>';
			}
		}
		return $html;
	}

	public function contributors() {
		$html = '';
		$contributors = wp_list_authors_hub('changewire');
		if(!empty($contributors)) {
			foreach($contributors as $key => $contributor) {
				$post = new SinglePost($contributor->ID);
				$post->getAuthorImage();
				$html .= '<div class="contributor-card">
                    <div class="contributor-image">'.$post->getAuthorImage().'</div>
                    <div class="contributor-info">
                        <h5 class="contributor-name"><a href="'.$post->getAuthorUrl().'">'.$post->getAuthorName().'</a></h5>
                        <p><a href="'.$post->getPermalink().'">
                            '.$post->getTitle().'
                        </p></a>
                    </div>
                </div>';
			}
		}
		return $html;
	}

	public function getConfig() {
		return new SinglePost();
	}

	public static function getName() {
		return str_replace(' ', '', self::NAME);
	}

	private static function featuredPostAdmin() {
		add_filter('post_row_actions', function($actions, $post){
			if($post->post_type == self::getName()){
				$post = new SinglePost($post);
				if(isset($_GET['featured']) && is_numeric($_GET['featured']) && $_GET['featured'] > 0) {
					update_post_meta($post->getId(), 'featured_story', 0);
					if($post->getId() == $_GET['featured']) {
						update_post_meta($post->getId(), 'featured_story', 1);
						redirection(0, admin_url('edit.php?post_type=changewire'));
					}
				}
				if($post->getMeta('featured_story') == 1) {
					$actionUrl = '<span class="featured-post">Featured!</span>';
				} else {
					$actionUrl = '<a href="'.admin_url('edit.php?post_type=changewire&featured='.$post->getId()).'">Feature Story</a>';
				}
				$actions['is_featured'] = $actionUrl;
			}
			return $actions;
		}, 10, 2);
	}
}
