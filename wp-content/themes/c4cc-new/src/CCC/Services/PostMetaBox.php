<?php

namespace CCC\Services;

class PostMetaBox {

	/**
	 * Post CPF
	 *
	 * @var mixed $metas
	 */
	private $metas;

	/**
	 * PostCPF constructor.
	 *
	 * @param $postId
	 */
	public function __construct($postId) {
		$this->metas = get_post_meta($postId);
	}

	/**
	 * Get a CPF by name, with option to get the attachment url
	 *
	 * @param string $name
	 * @param integer|null $isImage
	 *
	 * @return false|mixed
	 */
	public function get($name, $isImage = null) {
		if($this->has($name)) {
			$value = $this->metas[$name][0];
			return is_null($isImage) ? $value : wp_get_attachment_url($value);
		}
		return false;
	}

	/**
	 * Check if the CPF exist
	 *
	 * @param string $name
	 *
	 * @return bool
	 */
	public function has($name) {
		return is_array($this->metas) && array_key_exists($name, $this->metas) && isset($this->metas[$name][0]);
	}

	/**
	 * Get a filtered list of CPF by prefix
	 *
	 * @param string $prefix
	 *
	 * @return array
	 */
	public function getByPrefix($prefix) {
		$array = [];
		if(is_array($this->metas)) {
			foreach($this->metas as $key => $value) {
				if(preg_match('/^'.$prefix.'(.*)/', $key) && isset($value[0])) {
					$array[$key] = $value[0];
				}
			}
		}
		return $array;
	}
}
