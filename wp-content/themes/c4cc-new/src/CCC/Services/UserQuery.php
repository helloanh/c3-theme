<?php

namespace CCC\Services;

use CCC\Contracts\DataQueryInterface;
use CCC\Exceptions\PostException;

class UserQuery implements DataQueryInterface {

	/**
	 * @var UserQuery $instance
	 */
	private static $instance;

	/**
	 * @var string $role
	 */
	private static $role;

	/**
	 * @var array $users
	 */
	public $users;

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
	private $allowedFields = array();

	/**
	 * Add post type to the query
	 *
	 * @param string $role
	 *
	 * @return UserQuery
	 */
	public static function role($role) {
		if(!self::$instance) {
			self::$instance = new UserQuery();
		}
		self::$role = $role;
		return self::$instance->where('role', $role);
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
		/*if(!in_array($field, $this->allowedFields)) {
			throw new PostException($field . ' field is not allowed');
		}*/
		$this->args[$field] = $value;
		return $this;
	}

	/**
	 * Add an offset to the post query
	 *
	 * @param int $offset
	 *
	 * @return UserQuery
	 */
	public function offset($offset = 0) {
		return $this->where('offset', $offset);
	}

	/**
	 * Add how many posy to show per page
	 *
	 * @param int $perPage
	 *
	 * @return UserQuery
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
		$this->users = get_users($this->args);
		return $this->users;
	}

	/**
	 * Get the posts count
	 *
	 * @return integer
	 */
	public function count() {
		return count_users();
	}
}
