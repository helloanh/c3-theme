<?php

namespace CCC\Contracts;

/**
 * Interface CustomPostTypeDataInterface
 * Contract for DATA/CPT Class
 * @package CCC\Contracts
 */
interface CustomPostTypeDataInterface {
	/**
	 * Creating the CPF & TAXONOMY
	 */
	public static function register();

	/**
	 * Get the CPT NAME
	 *
	 * @return string
	 */
	public static function getName();

	public function hasSearchBar();

	public function includeSearchBar($searchBar);
}