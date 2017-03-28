<?php
/**
 * Created by PhpStorm.
 * User: ashima
 * Date: 19/1/17
 * Time: 3:23 PM
 */

namespace MyApp\request;

use Respect\Validation\Validator as v;

class TestRequest {
	/**
	 * @return array
	 */
	public function rules(){
		return [
			'name'=>v::notEmpty()->alpha()->length(1,20)->setName('name'),
			'url'=>v::notEmpty()->url()->setName('url'),
			'email'=>v::email()->setName('email')
		];
	}

	public static function anotherRules(){
		return [
			'id'=>v::notEmpty()->numeric()->positive()->between(1,20)->setName('id')
		];
	}
}