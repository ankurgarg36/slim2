<?php
/**
 * Created by PhpStorm.
 * User: ashima
 * Date: 31/1/17
 * Time: 12:25 PM
 */

namespace DbTesting;



class MyFirstDbTest extends MyApp_Tests_DatabaseTestCase {

	public function getDataSet()
	{
		$ouptput = $this->createMySQLXMLDataSet(dirname(__FILE__)."/data/articles.xml");
		return $ouptput;
	}

	public function testFetchAll()
	{
		$expected = $this->getConnection()->createDataSet();

		$actual = new \PHPUnit_Extensions_Database_DataSet_QueryDataSet($this->getConnection());

		$actual->addTable('articles',"select * from articles");

		$this->assertDataSetsEqual($expected, $actual,'Fetching all the records');
	}

	public function testGetRowCount(){
		$this->assertEquals(17,$this->getConnection()->getRowCount('articles'),"Counting number of rows");
	}

	public function testInsert()
	{
		$insertOperation = new \PHPUnit_Extensions_Database_Operation_Insert();

		$insertDataSet = new \PHPUnit_Extensions_Database_DataSet_XmlDataSet(dirname(__FILE__) . '/data/InsertOperationTest.xml');

		$insertOperation->execute($this->getConnection(), $insertDataSet);

		$expectedDataSet = new \PHPUnit_Extensions_Database_DataSet_FlatXmlDataSet(dirname(__FILE__) . '/data/InsertOperationResult.xml');

		$this->assertDataSetsEqual($expectedDataSet, $this->getConnection()->createDataSet(['articles']),"Inserting data to tables");

	}

	public function testUpdate()
	{
		$updateOperation = new \PHPUnit_Extensions_Database_Operation_Update();

		$dataSet =  new \PHPUnit_Extensions_Database_DataSet_FlatXmlDataSet(dirname(__FILE__) . '/data/UpdateOperationTest.xml');

		$updateOperation->execute($this->getConnection(),$dataSet);

		$expected = new \PHPUnit_Extensions_Database_DataSet_FlatXmlDataSet(dirname(__FILE__) . '/data/UpdateOperationTest.xml');

		$this->assertDataSetsEqual($expected, $this->getConnection()->createDataSet(),"update records");

	}

	public function testDelete()
	{
		$deleteOperation = new \PHPUnit_Extensions_Database_Operation_Delete();

		$dataSet = new \PHPUnit_Extensions_Database_DataSet_FlatXmlDataSet(dirname(__FILE__) . '/data/DeleteOperationTest.xml');

		$deleteOperation->execute($this->getConnection(), $dataSet);

		$expected = new \PHPUnit_Extensions_Database_DataSet_FlatXmlDataSet(dirname(__FILE__) . '/data/DeleteOperationResult.xml');

		$this->assertDataSetsEqual($expected, $this->getConnection()->createDataSet(),"Deleting records");
	}

/*	public function testFilteredGuestbook()
	{
		$tableNames = ['articles'];
		$dataSet = $this->getConnection()->createDataSet($tableNames);
		print_r($dataSet);
	}*/

/*	public function testFetchByISBN()
	{
		$this->markTestIncomplete( 'Not written yet.' );
	}*/
}
