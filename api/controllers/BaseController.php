<?php
/**
 * Created by PhpStorm.
 * User: ashima
 * Date: 23/1/17
 * Time: 2:43 PM
 */

namespace MyApp\controllers;

use DavidePastore\Slim\Validation\Validation;
use Slim\Slim;

abstract class BaseController {
	protected $app;

	function __construct(Slim $app) {
		$this->app = $app;
	}

	public function validate($rules){
		return function() use($rules) {
			echo "This is validation mw <br>";
			$data = ($this->app->request->isPost()) ? $this->app->request->post() : $this->app->router->getCurrentRoute()->getParams();
			$validator = new Validation($rules);
			if ($validator->_validate($data)) {
				throw new \Exception($this->getFirstError($validator->getErrors()));
			}
		};
	}

	public function checkAccess($permissions){
		 return function() use($permissions){
			 echo "This is another mw with parms. :".$permissions."<br>";
		 };
	}

	public function authAccess($auth){
		 return function() use($auth){
			 echo "This is another mw with parms. :".$auth."<br>";
		 };
	}

	/**
	 * @param $errors
	 *
	 * @return null
	 */
	public function getFirstError($errors){

		if(!is_array($errors) && count($errors)==0){
			return null;
		}
		reset($errors);
		$keys = array_keys($errors);
		$attrName = $keys[0];
		if(!isset($attrName) || !isset($errors[$attrName])){
			return null;
		}
		$firstError = $errors[$attrName];
		if(count($firstError)==0){
			return null;
		}

		return $firstError[0];

	}
}