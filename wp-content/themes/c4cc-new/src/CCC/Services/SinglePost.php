<?php

namespace CCC\Services;

use Embed\Embed;
use WP_Post;

class SinglePost {

	/**
	 * @var ArrayHelper $post
	 */
	private $post;

	/**
	 * @var PostMetaBox $meta
	 */
	private $meta;

	/**
	 * SinglePost constructor.
	 *
	 * @param WP_Post|integer|null $post
	 */
	public function __construct($post = null) {
		if(is_null($post)) {
			$post = get_post();
		}
		elseif(is_numeric($post)) {
			$post = get_post($post);
		}
		$this->post = new ArrayHelper($post->to_array());
		$this->meta = new PostMetaBox($post->ID);
		//post_view_tracker($post->ID);
	}

	public function getPost() {
		$post = $this->post;
		$post->set('metas', $this->meta);
		return $post;
	}

	public function getMeta($name, $isImage = null) {
		return $this->meta->get($name, $isImage);
	}

	public function getId() {
		return $this->post->get('ID');
	}

	public function getAuthorId() {
		return $this->post->get('post_author');
	}

	public function getAuthorUrl() {
		return get_author_posts_url($this->getAuthorId(), $this->getAuthorSlug());
	}

	/**
	 * @param $name
	 * @param array $dimensions
	 *
	 * @return \Embed\Adapters\Adapter|null
	 */
	public function getMetaEmbed($name, $dimensions = []) {
		$videoLink = $this->getMeta($name);
		try {
			$video = \Embed\Embed::create($videoLink);
			return str_replace(' width="'.$video->getWidth().'" height="'.$video->getHeight().'"', "", $video->getCode());
		}
		catch (\Exception $e) {
			return null;
		}
	}

	/**
	 * @param $name
	 * @param array $dimensions
	 *
	 * @return \Embed\Adapters\Adapter|null
	 */
	public function getMetaEmbedImage($name) {
		$videoLink = $this->getMeta($name);
		try {
			return \Embed\Embed::create($videoLink)->getImage();
		}
		catch (\Exception $e) {
			return null;
		}
	}

	public function getTitle() {
		return $this->post->get('post_title');
	}

	public function getUnderTitle() {
		return $this->meta->get('under_title');
	}

	public function getContent() {
		return $this->post->get('post_content');
	}

	/**
	 * @return mixed
	 */
	public function getAuthorName() {
		return get_the_author_meta('display_name', $this->post->get('post_author'));
	}

	/**
	 * @return mixed
	 */
	public function getAuthorSlug() {
		return get_the_author_meta('display_slug', $this->post->get('post_author'));
	}

	/**
	 * @return mixed
	 */
	public function getAuthorBio() {
		return get_the_author_meta('description', $this->post->get('post_author'));
	}

	/**
	 * @return mixed
	 */
	public function getExcerpt() {
		$excerpt = $this->post->get('post_excerpt');
		if(empty($excerpt)) {
			$content = strip_tags($this->getContent());
			return wp_trim_words($content, 30);
		}
		return $excerpt;
	}

	/**
	 * @return mixed
	 */
	public function getExcerptShort() {
		$excerpt = $this->post->get('post_excerpt');
		if(empty($excerpt)) {
			$content = strip_tags($this->getContent());
			return wp_trim_words($content, 20);
		}
		return $excerpt;
	}

	/**
	 * @return mixed
	 */
	public function getAuthorImage() {
		//return get_the_author_meta('display_name', $this->post->get('post_author'));
		 return get_avatar( get_the_author_meta( 'ID', $this->post->get('post_author') ) );
	}


	/**
	 * @return mixed
	 */
	public function getCategoryIds() {
		return $this->post->get('post_category');
	}

	/**
	 * @return mixed
	 */
	public function getCategory() {
		$categories = [];
		$rawCategory = $this->post->get('post_category');
		if(is_array($rawCategory)) {
			if(count($rawCategory) > 0) {
				foreach($rawCategory as $category) {
					$categories[get_cat_name($category)] = get_category_link($category);
				}
			}
		}
		else {
			$categories[get_cat_name($rawCategory)] = get_category_link($rawCategory);
		}
		return $categories;
	}

	/**
	 * @param bool $style
	 * @param string $default
	 *
	 * @return mixed
	 */


	public function getImage($style = false, $default = 'motif.jpg') {
		$imageUrl = get_the_post_thumbnail_url($this->post->get('ID'));
		if($style && !$imageUrl) {
			$imageUrl = asset('images/' . $default);
		}
		return $imageUrl;
	}


	public function getImageCaption(){
		$imageCaption = $this->post->get('post_excerpt');
		return $imageCaption;
	}

	/**
	 * @param string $format
	 *
	 * @return mixed
	 */
	public function getCreatedAt($format = 'F j, Y g:i a ') {
		$date = new \DateTime($this->post->get('post_date'));
		return $date->format($format);
	}

	public function getViews() {
		if(!$views = $this->getMeta('views')) {
			$views = 0;
		}
	    return $views;
	}

	public function getTags() {
		return get_the_tags();
	}

	public function getArrayTags() {
		$tags = [];
		$wpTags = wp_get_post_tags($this->post->get('ID'));
		foreach($wpTags as $tag) {
			$tags[] = $tag->term_id;
		}
		return $tags;
	}

	public function getPermalink() {
		return get_permalink($this->post->get('ID'));
	}

	public function getRelatedPosts($perPage = 3) {
		$query = PostQuery::type('post')
		                ->where('post_status', 'publish')
		                ->where('post__not_in', [$this->post->get('ID')])
		                //->where('caller_get_posts', 1);
		                ->where('ignore_sticky_posts', 1);

		$tags = $this->getArrayTags();
		if(!empty($tags)) {
			$query->where('tag__in', $tags);
		}

		return $query->take($perPage)
	                 ->get();
	}
}
