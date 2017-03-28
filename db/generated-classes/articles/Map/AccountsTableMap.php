<?php

namespace Map;

use \Accounts;
use \AccountsQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'articles.accounts' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AccountsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'articles.Map.AccountsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'articles';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'articles.accounts';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Accounts';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'articles.Accounts';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 12;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 12;

    /**
     * the column name for the id field
     */
    const COL_ID = 'articles.accounts.id';

    /**
     * the column name for the ccount_number field
     */
    const COL_CCOUNT_NUMBER = 'articles.accounts.ccount_number';

    /**
     * the column name for the balance field
     */
    const COL_BALANCE = 'articles.accounts.balance';

    /**
     * the column name for the firstname field
     */
    const COL_FIRSTNAME = 'articles.accounts.firstname';

    /**
     * the column name for the lastname field
     */
    const COL_LASTNAME = 'articles.accounts.lastname';

    /**
     * the column name for the age field
     */
    const COL_AGE = 'articles.accounts.age';

    /**
     * the column name for the gender field
     */
    const COL_GENDER = 'articles.accounts.gender';

    /**
     * the column name for the address field
     */
    const COL_ADDRESS = 'articles.accounts.address';

    /**
     * the column name for the employer field
     */
    const COL_EMPLOYER = 'articles.accounts.employer';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'articles.accounts.email';

    /**
     * the column name for the city field
     */
    const COL_CITY = 'articles.accounts.city';

    /**
     * the column name for the state field
     */
    const COL_STATE = 'articles.accounts.state';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'CcountNumber', 'Balance', 'Firstname', 'Lastname', 'Age', 'Gender', 'Address', 'Employer', 'Email', 'City', 'State', ),
        self::TYPE_CAMELNAME     => array('id', 'ccountNumber', 'balance', 'firstname', 'lastname', 'age', 'gender', 'address', 'employer', 'email', 'city', 'state', ),
        self::TYPE_COLNAME       => array(AccountsTableMap::COL_ID, AccountsTableMap::COL_CCOUNT_NUMBER, AccountsTableMap::COL_BALANCE, AccountsTableMap::COL_FIRSTNAME, AccountsTableMap::COL_LASTNAME, AccountsTableMap::COL_AGE, AccountsTableMap::COL_GENDER, AccountsTableMap::COL_ADDRESS, AccountsTableMap::COL_EMPLOYER, AccountsTableMap::COL_EMAIL, AccountsTableMap::COL_CITY, AccountsTableMap::COL_STATE, ),
        self::TYPE_FIELDNAME     => array('id', 'ccount_number', 'balance', 'firstname', 'lastname', 'age', 'gender', 'address', 'employer', 'email', 'city', 'state', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'CcountNumber' => 1, 'Balance' => 2, 'Firstname' => 3, 'Lastname' => 4, 'Age' => 5, 'Gender' => 6, 'Address' => 7, 'Employer' => 8, 'Email' => 9, 'City' => 10, 'State' => 11, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'ccountNumber' => 1, 'balance' => 2, 'firstname' => 3, 'lastname' => 4, 'age' => 5, 'gender' => 6, 'address' => 7, 'employer' => 8, 'email' => 9, 'city' => 10, 'state' => 11, ),
        self::TYPE_COLNAME       => array(AccountsTableMap::COL_ID => 0, AccountsTableMap::COL_CCOUNT_NUMBER => 1, AccountsTableMap::COL_BALANCE => 2, AccountsTableMap::COL_FIRSTNAME => 3, AccountsTableMap::COL_LASTNAME => 4, AccountsTableMap::COL_AGE => 5, AccountsTableMap::COL_GENDER => 6, AccountsTableMap::COL_ADDRESS => 7, AccountsTableMap::COL_EMPLOYER => 8, AccountsTableMap::COL_EMAIL => 9, AccountsTableMap::COL_CITY => 10, AccountsTableMap::COL_STATE => 11, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'ccount_number' => 1, 'balance' => 2, 'firstname' => 3, 'lastname' => 4, 'age' => 5, 'gender' => 6, 'address' => 7, 'employer' => 8, 'email' => 9, 'city' => 10, 'state' => 11, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('articles.accounts');
        $this->setPhpName('Accounts');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Accounts');
        $this->setPackage('articles');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('ccount_number', 'CcountNumber', 'VARCHAR', false, 3, null);
        $this->addColumn('balance', 'Balance', 'VARCHAR', false, 5, null);
        $this->addColumn('firstname', 'Firstname', 'VARCHAR', false, 11, null);
        $this->addColumn('lastname', 'Lastname', 'VARCHAR', false, 11, null);
        $this->addColumn('age', 'Age', 'VARCHAR', false, 2, null);
        $this->addColumn('gender', 'Gender', 'VARCHAR', false, 1, null);
        $this->addColumn('address', 'Address', 'VARCHAR', false, 24, null);
        $this->addColumn('employer', 'Employer', 'VARCHAR', false, 12, null);
        $this->addColumn('email', 'Email', 'VARCHAR', false, 32, null);
        $this->addColumn('city', 'City', 'VARCHAR', false, 18, null);
        $this->addColumn('state', 'State', 'VARCHAR', false, 2, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? AccountsTableMap::CLASS_DEFAULT : AccountsTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Accounts object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AccountsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AccountsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AccountsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AccountsTableMap::OM_CLASS;
            /** @var Accounts $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AccountsTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = AccountsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AccountsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Accounts $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AccountsTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(AccountsTableMap::COL_ID);
            $criteria->addSelectColumn(AccountsTableMap::COL_CCOUNT_NUMBER);
            $criteria->addSelectColumn(AccountsTableMap::COL_BALANCE);
            $criteria->addSelectColumn(AccountsTableMap::COL_FIRSTNAME);
            $criteria->addSelectColumn(AccountsTableMap::COL_LASTNAME);
            $criteria->addSelectColumn(AccountsTableMap::COL_AGE);
            $criteria->addSelectColumn(AccountsTableMap::COL_GENDER);
            $criteria->addSelectColumn(AccountsTableMap::COL_ADDRESS);
            $criteria->addSelectColumn(AccountsTableMap::COL_EMPLOYER);
            $criteria->addSelectColumn(AccountsTableMap::COL_EMAIL);
            $criteria->addSelectColumn(AccountsTableMap::COL_CITY);
            $criteria->addSelectColumn(AccountsTableMap::COL_STATE);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.ccount_number');
            $criteria->addSelectColumn($alias . '.balance');
            $criteria->addSelectColumn($alias . '.firstname');
            $criteria->addSelectColumn($alias . '.lastname');
            $criteria->addSelectColumn($alias . '.age');
            $criteria->addSelectColumn($alias . '.gender');
            $criteria->addSelectColumn($alias . '.address');
            $criteria->addSelectColumn($alias . '.employer');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.city');
            $criteria->addSelectColumn($alias . '.state');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(AccountsTableMap::DATABASE_NAME)->getTable(AccountsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AccountsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AccountsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AccountsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Accounts or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Accounts object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AccountsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Accounts) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AccountsTableMap::DATABASE_NAME);
            $criteria->add(AccountsTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AccountsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AccountsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AccountsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the articles.accounts table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AccountsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Accounts or Criteria object.
     *
     * @param mixed               $criteria Criteria or Accounts object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AccountsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Accounts object
        }

        if ($criteria->containsKey(AccountsTableMap::COL_ID) && $criteria->keyContainsValue(AccountsTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AccountsTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AccountsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AccountsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AccountsTableMap::buildTableMap();
