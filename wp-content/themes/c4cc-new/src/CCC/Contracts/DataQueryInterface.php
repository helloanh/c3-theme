<?php

namespace CCC\Contracts;

/**
 * Interface DataQueryInterface
 * Contract for DATA Query Class
 * @package CCC\Contracts
 */
interface DataQueryInterface {

	/**
	 * @param int $offset
	 *
	 * @return DataQueryInterface
	 */
	public function offset($offset = 0);

	/**
	 * @param int $perPage
	 *
	 * @return DataQueryInterface
	 */
	public function take($perPage = 9);

	/**
	 * @return \stdClass
	 */
	public function count();

	/**
	 * @return DataQueryInterface
	 */
	public function get();
}
