<?php

namespace Mediawiki\Api;

use InvalidArgumentException;

/**
 * @since 0.1
 * Represents a user that can log in to the api
 */
class ApiUser {

	/**
	 * @var string
	 */
	private $password;

	/**
	 * @var string
	 */
	private $username;

	/**
	 * @var string
	 */
	private $domain;

	/**
	 * @param string $username
	 * @param string $password
	 * @param string|null $domain
	 *
	 * @throws \InvalidArgumentException
	 */
	public function __construct( $username, $password, $domain = null ) {
		if( !is_string( $username ) || !is_string( $password ) || !( is_null( $domain ) || is_string( $domain ) ) ) {
			throw new InvalidArgumentException( 'Username, Password and Domain must all be strings' );
		}
		if( empty( $username ) || empty( $password ) ) {
			throw new InvalidArgumentException( 'Username and Password are not allowed to be empty' );
		}
		$this->username = $username;
		$this->password = $password;
		$this->domain   = $domain;
	}

	/**
	 * @since 0.1
	 * @return string
	 */
	public function getUsername() {
		return $this->username;
	}

	/**
	 * @since 0.1
	 * @return string
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * @since 0.1
	 * @return string
	 */
	public function getDomain() {
		return $this->domain;
	}

	/**
	 * @since 0.1
	 * @param mixed $other
	 *
	 * @return bool
	 */
	public function equals( $other ) {
		if( $other instanceof ApiUser && $this->username == $other->getUsername() && $this->password == $other->getPassword() && $this->domain == $other->getDomain() ) {
			return true;
		}
		return false;
	}

} 
