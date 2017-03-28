<?php
/**
 * Created by PhpStorm.
 * User: ashima
 * Date: 30/1/17
 * Time: 6:49 PM
 */

namespace MyApp\helpers;

use MyApp\request\AuthorRequest;

class AuthorHelper {

	const KEY_ALL_ARTICLES = "find_all_articles";
	private static $object = null;

	private function __construct(){

	}

	public static function getInstance() {
		// Check if instance is already exists
		if(self::$object == null) {
			self::$object = new AuthorHelper();
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
	 * @return \Author[]|\Propel\Runtime\Collection\ObjectCollection
	 */
	public function findAuthors() {
/*		$articles = \AuthorQuery::create()
			->join('Articles')
			->withColumn('count(Articles.AuthorId)', 'totalNoOfArticles')
			->withColumn('SUM(Articles.AuthorId)', 'sumOfArticles')
			->groupBy('Articles.AuthorId')
			->orderById("DESC")
			->find()
		;*/

/*		$articles = \AuthorQuery::create()
			->joinWith('Articles')
			->withColumn('count(Articles.AuthorId)', 'totalArticles')
			->select(['AuthorName','totalArticles'])
			->groupBy('Articles.AuthorId')
			->orderById("DESC")
			->find()
		;*/
/*		$articles = \AuthorQuery::create()
			->joinWith('Articles')
			->withColumn('count(Articles.AuthorId)', 'totalArticles')
			->groupBy('Articles.AuthorId')
			->orderById("DESC")
			->find()
		;*/
/*		$articles = \AuthorQuery::create()
			->joinWith('Articles')
			->useArticlesQuery()
				->filterByTitle('Nature vs World')
			->endUse()
			->orderById("DESC")
			->find()
		;*/
/*		$articles = \AuthorQuery::create()
			->useArticlesQuery()
				->filterByTitle('Nature vs World')
			->endUse()
			->orderById("DESC")
			->find()
		;	*/
		$articles = \AuthorQuery::create()
			->useArticlesQuery()
				->where('Articles.Title=?','Nature vs World')
			->endUse()
			->orderById("DESC")
			->find()
		;
		$authors = \AuthorQuery::create()->find();
		return $authors;
	}

	public function customQueries() {
		$articles = \AuthorQuery::create()
			->joinWith('Articles')
			->find()
		;
		$articles = \AuthorQuery::create()
			->joinWithArticles()
			->find()
		;

		$articles = \AuthorQuery::create()
			->joinWith('Articles')
			->withColumn('count(Articles.AuthorId)', 'totalArticles')
			->select(['AuthorName','totalArticles'])
			->groupBy('Articles.AuthorId')
			->orderById("DESC")
			->find()
		;
	}

	/**
	 * @param $id
	 *
	 * @return \Author|null
	 */
	public function findAuthor($id){

		if(empty($id)){
			return null;
		}
		$author = \AuthorQuery::create()
			->filterByPrimaryKey($id)
			->findOne()
		;
		pre($author, 0);
		pre($author->myNewResult());

		if(!$author){
			return null;
		}
		return $author;
	}

	/**
	 * @param \MyApp\request\AuthorRequest $request
	 *
	 * @return int
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function saveAuthor(AuthorRequest $request){
		$author = new \Author();
		$author->setAuthorName($request->author_name);

		if (!$author->validate()) {
			$errors =PitchVisionUtils::getActiveRecordErrors($author->getValidationFailures());
			pre($errors);
		}

		$numberOfRecordsUpdated = $author->save();
		if (!$numberOfRecordsUpdated) {
			pre('article not created');
		}
		return $numberOfRecordsUpdated;
	}

	/**
	 * @param \MyApp\request\AuthorRequest $request
	 *
	 * @return int|null
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function updateAuthor(AuthorRequest $request) {
		if (!$request->id) {
			return null;
		}

		$author = $this->findAuthor($request->id);
		$author->setAuthorName($request->author_name);

		if (!$author->validate()) {
			$errors =PitchVisionUtils::getActiveRecordErrors($author->getValidationFailures());
			pre($errors);
		}

		$numberOfRecordsUpdated = $author->save();
		if (!$numberOfRecordsUpdated) {
			pre('author not updated because you have not make any changes in the values');
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

		$article = $this->findAuthor($id);
		$article->delete();

		return true;
	}
}