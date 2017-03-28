<?php
/**
 * Created by PhpStorm.
 * User: ashima
 * Date: 27/1/17
 * Time: 2:55 PM
 */

namespace MyApp\controllers;die;

class TestController2 extends Controller{

	protected function routes() {
		$this->app->get('/test/find/:id',[$this,'getArticle'])->name("find");
	}

	public function getArticle(){
		echo "You are in read of".self::class;
	}
}