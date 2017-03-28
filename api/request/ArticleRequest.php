<?php
/**
 * Created by PhpStorm.
 * User: ashima
 * Date: 16/1/17
 * Time: 3:54 PM
 */

namespace MyApp\request;


use Respect\Validation\Validator as v;

class ArticleRequest {

	public $title;
	public $url;
	public $id;
	public $author_id;

	/**
	 * @return array
	 */
	public function rule(){
		return [
			'title'=>v::alpha()->length(1,100)->setName('title'),
			'url'=>v::url()->setName('url'),
			'author_id'=>v::numeric()->setName('author_id'),
//			'date'=>v::date('Y-m-d')->setName('date')
		];
	}

	public function loadFromAPI($post){
		$this->title = isset($post['title'])?$post['title']:'';
		$this->url = isset($post['url'])?$post['url']:'';
		$this->id = isset($post['id'])?$post['id']:'';
		$this->author_id = isset($post['author_id'])?$post['author_id']:'';
	}
}