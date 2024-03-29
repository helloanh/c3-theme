<?php

namespace CCC\Services;

class ArrayHelper
{
	/**
	 * Parameter storage.
	 *
	 * @var array
	 */
	protected $parameters;

	/**
	 * Constructor.
	 *
	 * @param array $parameters An array of parameters
	 */
	public function __construct($parameters = array())
	{
		$this->parameters = (array) $parameters;
	}

	/**
	 * Returns the parameters.
	 *
	 * @return array An array of parameters
	 */
	public function all()
	{
		return $this->parameters;
	}

	/**
	 * Returns the parameter keys.
	 *
	 * @return array An array of parameter keys
	 */
	public function keys()
	{
		return array_keys($this->parameters);
	}

	/**
	 * Adds parameters.
	 *
	 * @param array $parameters An array of parameters
	 */
	public function add(array $parameters = array())
	{
		$this->parameters = array_replace($this->parameters, $parameters);
	}

	/**
	 * Returns a parameter by name.
	 *
	 * @param string $key     The key
	 * @param mixed  $default The default value if the parameter key does not exist
	 *
	 * @return mixed
	 */
	public function get($key, $default = null)
	{
		return array_key_exists($key, $this->parameters) ? $this->parameters[$key] : $default;
	}

	/**
	 * Sets a parameter by name.
	 *
	 * @param string $key   The key
	 * @param mixed  $value The value
	 */
	public function set($key, $value)
	{
		$this->parameters[$key] = $value;
	}

	/**
	 * Returns true if the parameter is defined.
	 *
	 * @param string $key The key
	 *
	 * @return bool true if the parameter exists, false otherwise
	 */
	public function has($key)
	{
		return array_key_exists($key, $this->parameters);
	}

	/**
	 * Removes a parameter.
	 *
	 * @param string $key The key
	 */
	public function remove($key)
	{
		unset($this->parameters[$key]);
	}

	/**
	 * Returns the number of parameters.
	 *
	 * @return int The number of parameters
	 */
	public function count()
	{
		return count($this->parameters);
	}
}