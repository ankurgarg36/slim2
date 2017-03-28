<?php
/**
 * Created by PhpStorm.
 * User: ashima
 * Date: 30/1/17
 * Time: 12:36 PM
 */

namespace MyApp\test;

use MyApp\helpers\URL;

class URLTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @param  $originalString
	 * @param $expectedResult
	 * @dataProvider providerTestSluggifyReturnsSluggifiedString
	 */
	public function testSluggifyReturnsSluggifiedString($originalString,$expectedResult)
	{
		$url = new URL();
		$result = $url->sluggify($originalString);

		$this->assertEquals($expectedResult, $result);
	}

	public function providerTestSluggifyReturnsSluggifiedString()
	{
		return array(
			array('This string will be sluggified', 'this-string-will-be-sluggified'),
			array('THIS STRING WILL BE SLUGGIFIED', 'this-string-will-be-sluggified'),
			array('This1 string2 will3 be 44 sluggified10', 'this1-string2-will3-be-44-sluggified10'),
			array('This! @string#$ %$will ()be "sluggified', 'this-string-will-be-sluggified'),
			array("Tänk efter nu – förr'n vi föser dig bort", 'tank-efter-nu-forrn-vi-foser-dig-bort'),
			array('', ''),
		);
	}
}
