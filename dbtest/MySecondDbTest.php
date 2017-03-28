<?php
/**
 * Created by PhpStorm.
 * User: ashima
 * Date: 31/1/17
 * Time: 12:25 PM
 */

namespace DbTesting;



class MySecondDbTest extends MyApp_Tests_DatabaseTestCase {

	public function getDataSet()
	{
//		$ouptput = $this->createMySQLXMLDataSet(dirname(__FILE__)."/data/demo.xml");
		$ouptput = new MyApp_DbUnit_ArrayDataSet(['articles'=>[
			['id' => '1','author_id' => '1','title' => 'first article','url' => 'http://firstarticle.com','date' => '2017-02-03'],
			['id' => '2','author_id' => '2','title' => 'second title','url' => 'http://secondarticle.com','date' => '0000-00-00']
		]]);
		return $ouptput;
	}

	public function testFetchAll()
	{
		$expected = $this->getConnection()->createDataSet(['articles']);

		$actual = new \PHPUnit_Extensions_Database_DataSet_QueryDataSet($this->getConnection());

		$actual->addTable('articles',"select * from articles");

		$this->assertDataSetsEqual($expected, $actual,'Fetching all the records');
	}

	public function testGetRowCount(){
		$this->assertEquals(2,$this->getConnection()->getRowCount('articles'),"Counting number of rows");
	}

	public function testInsert()
	{
		$insertOperation = new \PHPUnit_Extensions_Database_Operation_Insert();

		$insertDataSet = new \PHPUnit_Extensions_Database_DataSet_XmlDataSet(dirname(__FILE__) . '/data/InsertOperationTest.xml');

		$rds = new \PHPUnit_Extensions_Database_DataSet_ReplacementDataSet($insertDataSet);

		$rds->addFullReplacement('##NULL##', 'Hi');

		$insertOperation->execute($this->getConnection(), $rds);

		$expectedDataSet = new \PHPUnit_Extensions_Database_DataSet_XmlDataSet(dirname(__FILE__) . '/data/InsertOperationResult.xml');

		$this->assertDataSetsEqual($expectedDataSet, $this->getConnection()->createDataSet(['articles']),"Inserting data to tables");

	}

	public function testUpdate()
	{
		$updateOperation = new \PHPUnit_Extensions_Database_Operation_Update();

//		$dataSet =  new \PHPUnit_Extensions_Database_DataSet_FlatXmlDataSet(dirname(__FILE__) . '/data/UpdateOperationTest.xml');
		$dataSet =  new MyApp_DbUnit_ArrayDataSet([
			'articles' => [
				[
					'id' => 1,
					'author_id' => '1',
					'title' => NULL,
					'url' => '2010-04-24 17:15:23',
					'date' => '2010-04-24'
				],
			],
		]);

		$updateOperation->execute($this->getConnection(),$dataSet);
		$expected = new \PHPUnit_Extensions_Database_DataSet_FlatXmlDataSet(dirname(__FILE__) . '/data/UpdateOperationTest.xml');

		$this->assertDataSetsEqual($expected, $this->getConnection()->createDataSet(['articles']),"update records");

	}

/*	public function testDelete()
	{
		$deleteOperation = new \PHPUnit_Extensions_Database_Operation_Delete();

		$dataSet = new \PHPUnit_Extensions_Database_DataSet_FlatXmlDataSet(dirname(__FILE__) . '/data/DeleteOperationTest.xml');

		$deleteOperation->execute($this->getConnection(), $dataSet);

		$expected = new \PHPUnit_Extensions_Database_DataSet_FlatXmlDataSet(dirname(__FILE__) . '/data/DeleteOperationResult.xml');

		$this->assertDataSetsEqual($expected, $this->getConnection()->createDataSet(),"Deleting records");
	}*/

	public function testAddEntry()
	{
		$insertOperation = new \PHPUnit_Extensions_Database_Operation_Insert();

		$insertDataSet = new \PHPUnit_Extensions_Database_DataSet_XmlDataSet(dirname(__FILE__) . '/data/InsertOperationTest.xml');

		$rds = new \PHPUnit_Extensions_Database_DataSet_ReplacementDataSet($insertDataSet);

		$rds->addFullReplacement('##NULL##', 'Hi');

		$insertOperation->execute($this->getConnection(), $rds);

		$queryTable = $this->getConnection()->createQueryTable(
			'articles', 'SELECT * FROM articles'
		);
		$expectedTable = $this->createXmlDataSet(dirname(__FILE__) . '/data/InsertOperationResult.xml')
			->getTable("articles");
		$this->assertTablesEqual($expectedTable, $queryTable);
	}
}
