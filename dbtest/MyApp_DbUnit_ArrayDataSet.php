<?php
/**
 * Created by PhpStorm.
 * User: ashima
 * Date: 3/2/17
 * Time: 11:30 AM
 */

namespace DbTesting;

use Doctrine\Instantiator\Exception\InvalidArgumentException;

class MyApp_DbUnit_ArrayDataSet extends \PHPUnit_Extensions_Database_DataSet_AbstractDataSet {
	/**
	 * @var array
	 */
	protected $tables = [];

	/**
	 * @param array $data
	 */
	public function __construct(array $data)
	{
		foreach ($data AS $tableName => $rows) {
			$columns = [];
			if (isset($rows[0])) {
				$columns = array_keys($rows[0]);
			}

			$metaData = new \PHPUnit_Extensions_Database_DataSet_DefaultTableMetaData($tableName, $columns);
			$table = new \PHPUnit_Extensions_Database_DataSet_DefaultTable($metaData);

			foreach ($rows AS $row) {
				$table->addRow($row);
			}
			$this->tables[$tableName] = $table;
		}
	}

	protected function createIterator($reverse = false)
	{
		return new \PHPUnit_Extensions_Database_DataSet_DefaultTableIterator($this->tables, $reverse);
	}

	public function getTable($tableName)
	{
		if (!isset($this->tables[$tableName])) {
			throw new InvalidArgumentException("$tableName is not a table in the current database.");
		}

		return $this->tables[$tableName];
	}

}