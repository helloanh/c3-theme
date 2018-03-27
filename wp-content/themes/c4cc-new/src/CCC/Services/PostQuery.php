<?php

namespace CCC\Services;

use CCC\Contracts\DataQueryInterface;
use CCC\Exceptions\PostException;
use WP_Post;

class PostQuery implements DataQueryInterface {

	/**
	 * @var PostQuery $instance
	 */
	private static $instance;

	/**
	 * @var string $type
	 */
	private static $type;

	/**
	 * @var array $posts
	 */
	public $posts;

	/**
	 * Post Criteria
	 *
	 * @var array $args
	 */
	private $args = [];

	/**
	 * Allowed post matching criteria
	 *
	 * @var array $allowedFields
	 */
	private $allowedFields = array(
		'category__and', 'category__or', 'orderby', 'order', 'include', 'exclude', 'meta_value',
		'suppress_filters', 'post_status', 'post_type', 'numberposts', 'posts_per_page', 'tax_query',
		'category', 'include', 'cat', 'post__in', 'tag__in', 'post__not_in', 'ignore_sticky_posts', 's',
		'offset', 'taxonomy', 'meta_key', 'meta_query', 'post_title_like', 'category_name'
	);

	/**
	 * Add post type to the query
	 *
	 * @param string $type
	 *
	 * @return PostQuery
	 */
	public static function type($type= null) {
		if(!self::$instance) {
			self::$instance = new PostQuery();
		}
		if($type) {
			self::$type = $type;
			return self::$instance->where('post_type', $type);
		}
		return self::$instance;
	}

	/**
	 * Add a condition to the post query
	 *
	 * @param string $field
	 * @param mixed $value
	 *
	 * @return $this
	 * @throws PostException
	 */
	public function where($field, $value) {
		if(!in_array($field, $this->allowedFields)) {
			throw new PostException($field . ' field is not allowed');
		}
		$this->args[$field] = $value;
		return $this;
	}

	/**
	 * Add an offset to the post query
	 *
	 * @param int $offset
	 *
	 * @return PostQuery
	 */
	public function offset($offset = 0) {
		return $this->where('offset', $offset);
	}

	/**
	 * Add how many posy to show per page
	 *
	 * @param int $perPage
	 *
	 * @return PostQuery
	 */
	public function take($perPage = 9) {
		return $this->where('posts_per_page', $perPage);
	}

	/**
	 * Order the posts
	 *
	 * @param string $orderBy
	 * @param string $order
	 *
	 * @return $this
	 */
	public function orderBy($orderBy = 'date', $order = 'DESC') {
		return $this->where('orderby', $orderBy)
					->where('order', $order);
	}

	/**
	 * Get the list of posts
	 *
	 * @return array
	 */
	public function get() {
		$posts = get_posts($this->args);
		$this->args = [];
		return $posts;
	}

	/**
	 * Get the posts count
	 *
	 * @param string $perm
	 *
	 * @return integer
	 */
	public function count($perm = "") {
		return wp_count_posts(self::$type, $perm);
	}

	public function countSearch() {
		$args = $this->args;
		$args['numberposts'] = -1;
		return count(get_posts($args));
	}

	/**
	 * Get the current single post
	 *
	 * @param string $className
	 *
	 * @return ArrayHelper
	 * @throws PostException
	 */
	public static function current($className = null) {
		$post = get_post();
		return self::populatePost($post, $className);
	}

	/**
	 * Get a single post by pathName
	 *
	 * @param null|string $path
	 * @param string $className
	 *
	 * @return ArrayHelper
	 * @throws PostException
	 */
	public static function first($path, $className = null) {
		$post = get_page_by_path($path);
		return self::populatePost($post, $className);
	}

	/**
	 * Populate post object
	 *
	 * @param WP_Post|null $post
	 * @param string $className
	 *
	 * @return ArrayHelper
	 * @throws PostException
	 */
	public static function populatePost(WP_Post $post, $className) {
		if(!$post) {
			throw new PostException('Page/Post not found');
		}
		$post = new ArrayHelper($post->to_array());
		$post->set('metas', new PostMetaBox($post->get('ID')));

		if($className)
			$post->set('params', config()->get($className));

		return $post;
	}
}
