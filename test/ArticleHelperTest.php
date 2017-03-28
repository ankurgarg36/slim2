<?php
/**
 * Created by PhpStorm.
 * User: ashima
 * Date: 30/1/17
 * Time: 6:58 PM
 */

namespace MyApp\test;

use MyApp\helpers\ArticleHelper;

class ArticleHelperTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @param $id
	 * @dataProvider providerTestFindArticle
	 */
	public function testFindArticle($id){
		$helper = ArticleHelper::getInstance();
		$result =  $helper->findArticle($id);

		$this->assertTrue(($result)?true:false);
	}

	public function providerTestFindArticle(){
		return [
//			[true],
			[12],
//			[null],
//			[false]
		];
	}
}
