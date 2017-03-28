<?php

/**
 * Created by PhpStorm.
 * User: ashima
 * Date: 27/1/17
 * Time: 6:14 PM
 */
class HelloTest extends PHPUnit_Framework_TestCase {

	public function testTrueIsTrue()
	{
		$foo = false;
		$this->assertFalse($foo);
	}
}
