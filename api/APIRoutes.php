<?php
/**
 * Created by PhpStorm.
 * User: ashima
 * Date: 27/1/17
 * Time: 3:02 PM
 */

namespace MyApp;

use MyApp\controllers\AccountsController;
use MyApp\controllers\ArticleController;
use MyApp\controllers\AuthorController;
use MyApp\controllers\TestController2;

const STATUS1 = "one";
const STATUS2 = "2";

class APIRoutes {

	const GROUP_ARTICLE = "article";
	const GROUP_TEST = "test";
	const GROUP_PRODUCT = "product";
	const GROUP_AUTHOR = "author";
	const GROUP_ACCOUNTS = "accounts";

	/**
	 * @return ArticleController|TestController2|null
	 */
	public static function getControllerInstance(){
		/** @var Slim $app */
		$app = Slim::getInstance();
		$parts = explode("/",$app->request()->getPathInfo());

		if(!isset($parts[1])){
			return null;
		}
		$groupName = $parts[1];

		switch($groupName){
			case self::GROUP_ARTICLE;
			case self::GROUP_PRODUCT;
				$controller= new ArticleController($app);
				$templateDirectory = self::GROUP_ARTICLE;
				break;
			case self::GROUP_TEST;
				$controller = new TestController2($app);
				$templateDirectory = self::GROUP_TEST;
				break;
			case self::GROUP_AUTHOR;
				$controller = new AuthorController($app);
				$templateDirectory = self::GROUP_AUTHOR;
				break;
			case self::GROUP_ACCOUNTS;
				$controller = new AccountsController($app);
				$templateDirectory = self::GROUP_AUTHOR;
				break;
			default;
				$controller = null;
				$templateDirectory = null;
		}

//		self::setViewDirectory($templateDirectory, $controller);

		return $controller;
	}

	private static function setViewDirectory($templateDirectory,$controller) {
		if (empty($templateDirectory) || empty($controller)) {
			return null;
		}
		$app = Slim::getInstance();
		$path = $app->twig->getLoader()->getPaths()[0].DIRECTORY_SEPARATOR.$templateDirectory;
		$app->twig->getLoader()->setPaths($path);
	}
}