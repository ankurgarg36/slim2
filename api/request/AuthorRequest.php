<?php
/**
 * Created by PhpStorm.
 * User: ashima
 * Date: 16/1/17
 * Time: 3:54 PM
 */

namespace MyApp\request;


use Respect\Validation\Validator as v;

class AuthorRequest {

	public $author_name;
	public $id;

	/**
	 * @return array
	 */
	public function rule(){
		return [
			'author_name'=>v::alpha()->length(1,100)->setName('author_name'),
		];
	}

	public function loadFromAPI($post){
		$this->author_name = isset($post['author_name'])?$post['author_name']:'';
		$this->id = isset($post['id'])?$post['id']:'';
	}
}