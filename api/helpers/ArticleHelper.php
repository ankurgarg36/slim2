<?php
/**
 * Created by PhpStorm.
 * User: ashima
 * Date: 30/1/17
 * Time: 6:49 PM
 */

namespace MyApp\helpers;

use Base\ArticlesQuery;
use MyApp\request\ArticleRequest;

class ArticleHelper {

	const KEY_ALL_ARTICLES = "find_all_articles";
	private static $object = null;

	private function __construct(){

	}

	public static function getInstance() {
		// Check if instance is already exists
		if(self::$object == null) {
			self::$object = new ArticleHelper();
		}
		return self::$object;
	}

	private function __clone() {
		// Stopping Clonning of Object
	}

	private function __wakeup() {
		// Stopping unserialize of object
	}

	/**
	 * @return \Articles[]|\Propel\Runtime\Collection\ObjectCollection
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function findArticles() {
		$articles = \ArticlesQuery::create()
//			->setQueryKey(self::KEY_ALL_ARTICLES)
//			->joinWithAuthor()
			->join('Author')
//			->useAuthorQuery(null,Criteria::INNER_JOIN)
//			->select(['author_name'])
//			->endUse()
			->select(['Id','Author.AuthorName','Title','Url','Date'])
//			->filterByAuthorId([4,5])
			->orderByDate("DESC")
			->find()
		;
		return $articles;
	}

	/**
	 * @param $id
	 *
	 * @return \Articles[]|\Propel\Runtime\Collection\ObjectCollection
	 */
	public function findArticle($id){

		if(empty($id)){
			return null;
		}
		$article = \ArticlesQuery::create()
			->filterByPrimaryKey($id)
			->findOne();

		if(!$article){
			return null;
		}
		return $article;
	}
	/**
	 * @param ArticleRequest $request
	 *
	 * @return int
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function saveArticle(ArticleRequest $request){
		$article = new \Articles();
		$article->setTitle($request->title);
		$article->setAuthorId($request->author_id);
		$article->setUrl($request->url);
		$article->setDate(date('Y-m-d'));
		if (!$article->validate()) {
			$errors =PitchVisionUtils::getActiveRecordErrors($article->getValidationFailures());
			pre($errors);
		}

		$numberOfRecordsUpdated = $article->save();
		if (!$numberOfRecordsUpdated) {
			pre('article not created');
		}
		return $numberOfRecordsUpdated;
	}

	/**
	 * @param \MyApp\request\ArticleRequest $articleRequest
	 *
	 * @return int|null
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function updateArticle(ArticleRequest $articleRequest) {
		if (!$articleRequest->id) {
			return null;
		}

		$article = \ArticlesQuery::create()->findOneById($articleRequest->id);
		$article->setTitle($articleRequest->title);
		$article->setAuthorId($articleRequest->author_id);
		$article->setUrl($articleRequest->url);
		$article->setDate(date('Y-m-d'));

		if (!$article->validate()) {
			$errors =PitchVisionUtils::getActiveRecordErrors($article->getValidationFailures());
			pre($errors);
		}

		$numberOfRecordsUpdated = $article->save();
		if (!$numberOfRecordsUpdated) {
			pre('article not updated because you have not make any changes in the values');
		}
		return $numberOfRecordsUpdated;
	}

	/**
	 * @param $id
	 *
	 * @return bool|null
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function deleteArticle($id) {
		if (empty($id) || !is_numeric($id)) {
			return null;
		}

		$article = ArticlesQuery::create()->findOneById($id);
		$article->delete();

		return true;

	}

	/**
	 * @param \MyApp\request\ArticleRequest $articleRequest
	 *
	 * @return int|null
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function updateArticleAlternate(ArticleRequest $articleRequest) {

		$updateArticle = \ArticlesQuery::create()
			->filterByPrimaryKey($articleRequest->id)
			->update(['Title'=>$articleRequest->title,'Url'=>$articleRequest->url,'Date'=>date('Y-m-d')])
		;
		if ($updateArticle>0) {
			return $updateArticle;
		}

		return null;
	}

	/**
	 * @return \Author[]|\Propel\Runtime\Collection\ObjectCollection
	 */
	public function getAuthors() {
		$authorHelper = AuthorHelper::getInstance();

		return $authorHelper->findAuthors();
	}
}