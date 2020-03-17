<?php

namespace WP_Forge\DataStore;

use WP_Forge\Helpers\Arr;

/**
 * Class DataStore
 *
 * @package WP_Forge\DataStore
 */
class DataStore {

	/**
	 * In-memory data store.
	 *
	 * @var array
	 */
	protected $data = [];

	/**
	 * Delete a value by key.
	 *
	 * @param string $key
	 *
	 * @return $this
	 */
	public function forget( $key ) {
		Arr::forget( $this->data, $key );

		return $this;
	}

	/**
	 * Get a value by key.
	 *
	 * @param string $key
	 * @param null   $default
	 *
	 * @return mixed
	 */
	public function get( $key, $default = null ) {
		return Arr::get( $this->data, $key, $default );
	}

	/**
	 * Check for the existence of a key.
	 *
	 * @param string $key
	 *
	 * @return bool
	 */
	public function has( $key ) {
		return Arr::has( $this->data, $key );
	}

	/**
	 * Push multiple entries into the data store at once.
	 *
	 * @param array $data
	 *
	 * @return $this
	 */
	public function put( array $data ) {
		$this->data = array_merge_recursive( $this->data, $data );

		return $this;
	}

	/**
	 * Reset/overwrite the data store.
	 *
	 * @param array $data
	 *
	 * @return $this
	 */
	public function reset( array $data = [] ) {
		$this->data = $data;

		return $this;
	}

	/**
	 * Set a value.
	 *
	 * @param string $key
	 * @param mixed  $value
	 *
	 * @return $this
	 */
	public function set( $key, $value ) {
		Arr::set( $this->data, $key, $value );

		return $this;
	}

	/**
	 * Return all the data as an array.
	 *
	 * @return array
	 */
	public function toArray() {
		return $this->data;
	}

	/**
	 * Return all the data as JSON.
	 *
	 * @return string|false JSON string on success, false on failure.
	 */
	public function toJson() {
		return json_encode( (object) $this->data, JSON_PRETTY_PRINT );
	}

}
