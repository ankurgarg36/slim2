<?php
/**
 * Created by PhpStorm.
 * User: Ankur Garg
 * Date: 29/3/17
 * Time: 5:16 PM
 */

namespace MyApp\components;

use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;

/**
 * ElasticSearchHelper this class can add document to the existing index and type
 * and also perform the search operation
 * Class ESHelper
 * @package MyApp\components
 */
class ESHelper {

	public $data = [];
	public $index;
	public $type;
	/** @var Client $client **/
	public $client;

	const END_POINT = "http://127.0.0.1:9200";
	const DEFAULT_INDEX = "monolog";
	const DEFAULT_TYPE = "api";

	function __construct() {
		$client = ClientBuilder::create()
			->setHosts([self::END_POINT])
			->build();

		$this->setClient($client);
	}

	private function setClient($client) {
		$this->client = $client;
	}

	/**
	 * @return Client
	 */
	public function getClient() {
		return $this->client;
	}

	public function setIndex($index) {
		$this->index = $index;
		return $this;
	}

	public function setType($type) {
		$this->type = $type;
		return $this;
	}

	public function set($key,$value) {
		$this->data[$key] = $value;
		return $this;
	}

	public function save(){
		$this->client->index([
			'index'=>$this->index,
			'type'=>$this->type,
			'body'=>$this->data
		]);
	}

	/**
	 * Queries es for results.
	 *
	 * @param $conditions
	 * @return mixed
	 */
	public function query($conditions) {
		return $this->getClient()->search($conditions);
	}

}