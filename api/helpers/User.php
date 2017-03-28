<?php
/**
 * Created by PhpStorm.
 * User: ashima
 * Date: 30/1/17
 * Time: 3:39 PM
 */

namespace MyApp\helpers;

class User {
	const MIN_PASS_LENGTH = 4;

	private $user = array();

	public function __construct(array $user)
	{
		$this->user = $user;
	}

	public function getUser()
	{
		return $this->user;
	}

	public function setPassword($password)
	{
		if (strlen($password) < self::MIN_PASS_LENGTH) {
			return false;
		}

		$this->user['password'] = $this->cryptPassword($password);

		return true;
	}

	private function cryptPassword($password)
	{
		return md5($password);
	}
}