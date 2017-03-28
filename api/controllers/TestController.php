<?php
/**
 * Created by PhpStorm.
 * User: ashima
 * Date: 24/1/17
 * Time: 6:03 PM
 */

namespace MyApp\controllers;

use Slim\Slim;

class TestController extends  BaseController{

	public function test(){
		echo "you are in test";
	}
}
