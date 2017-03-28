<?php
/**
 * Created by PhpStorm.
 * User: ashima
 * Date: 31/1/17
 * Time: 12:53 PM
 */

namespace MyApp\test;

use GuzzleHttp\Client;

class ArticleControllerTest extends \PHPUnit_Framework_TestCase {

	/** @var  Client */
	protected $client;

	protected function setUp()
	{
		$this->client = new Client([
			'base_uri' => 'http://app2.ankur.misport.com'
		]);
	}

	public function testGetAllArticles(){
		$response = $this->client->get('/article/find/4');
		$this->assertEquals(200, $response->getStatusCode());

		$data = json_decode($response->getBody(), true);
		$this->assertNotEmpty($response->getBody(),"Not empty");

		$this->assertArrayHasKey('Id', $data);
		$this->assertArrayHasKey('Title', $data);
		$this->assertArrayHasKey('Url', $data);
	}
/*	public function testSaveArticle(){
		$response = $this->client->post('/article/create',[
			'form_params'=>[
			'title'=>'Article created from PHP Unit',
			'url'=>'http://www.goggle.com',
			'date'=>'2017-03-17',
			'author_id'=>'5'
				]
		]);

		print_r($response->getStatusCode());
	}*/
}
