<?php

namespace CCC\Data;

use CCC\Services\ArrayHelper;
use CCC\Services\SinglePost;
use \WP_Post;

class TheLatestSinglePost extends SinglePost {

	/**
	 * @var ArrayHelper $originalPost
	 */
	private $originalPost;
	/**
	 * @var \WP_Post|null $originalPost
	 */
	private $linkedPost;
	private $externalLink;

	public function __construct(WP_Post $originalPost) {
		parent::__construct($originalPost);
		$this->originalPost = $this->getPost();
		$this->externalLink = $this->getMeta('link_to_an_external_post');
		if(!$this->isExternal()) {
			$linkedPost = get_post($this->getMeta('select_attachement_post_type'));
			if($linkedPost instanceof WP_Post) {
				$this->linkedPost = new SinglePost($linkedPost);
			}
		}
	}

	public function isExternal() {
		return filter_var($this->externalLink, FILTER_VALIDATE_URL);
	}

	public function isLinked() {
		return $this->linkedPost instanceof SinglePost;
	}

	/**
	 * @return mixed
	 */
	public function getTitle() {
		$title = parent::getTitle();
		if(empty($title) && $this->isLinked()) {
			$title = $this->linkedPost->getTitle();
		}
		return $title;
	}

	/**
	 * @return mixed
	 */
	public function getExcerpt() {
		$excerpt = parent::getExcerpt();
		if(empty($excerpt)) {
			$excerpt = substr(strip_tags($this->getContent()), 0, 100);
		}
		return $excerpt;
	}

	/**
	 * @return mixed
	 */
	public function getExternalLink() {
		return $this->externalLink;
	}

	/**
	 * @return mixed
	 */
	public function getCategory($result = 'name') {
		$category = $this->getMeta('category');
		if(!$category) {
			$category = parent::getCategory();
		}
		$categoryName = get_cat_name($category);
		if($result == 'name') {
			return $categoryName;
		}
		return [
			'name' => $categoryName,
			'link' => get_category_link($category)
		];
	}
}
