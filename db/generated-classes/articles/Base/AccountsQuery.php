<?php

namespace Base;

use \Accounts as ChildAccounts;
use \AccountsQuery as ChildAccountsQuery;
use \Exception;
use \PDO;
use Map\AccountsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'articles.accounts' table.
 *
 *
 *
 * @method     ChildAccountsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAccountsQuery orderByCcountNumber($order = Criteria::ASC) Order by the ccount_number column
 * @method     ChildAccountsQuery orderByBalance($order = Criteria::ASC) Order by the balance column
 * @method     ChildAccountsQuery orderByFirstname($order = Criteria::ASC) Order by the firstname column
 * @method     ChildAccountsQuery orderByLastname($order = Criteria::ASC) Order by the lastname column
 * @method     ChildAccountsQuery orderByAge($order = Criteria::ASC) Order by the age column
 * @method     ChildAccountsQuery orderByGender($order = Criteria::ASC) Order by the gender column
 * @method     ChildAccountsQuery orderByAddress($order = Criteria::ASC) Order by the address column
 * @method     ChildAccountsQuery orderByEmployer($order = Criteria::ASC) Order by the employer column
 * @method     ChildAccountsQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildAccountsQuery orderByCity($order = Criteria::ASC) Order by the city column
 * @method     ChildAccountsQuery orderByState($order = Criteria::ASC) Order by the state column
 *
 * @method     ChildAccountsQuery groupById() Group by the id column
 * @method     ChildAccountsQuery groupByCcountNumber() Group by the ccount_number column
 * @method     ChildAccountsQuery groupByBalance() Group by the balance column
 * @method     ChildAccountsQuery groupByFirstname() Group by the firstname column
 * @method     ChildAccountsQuery groupByLastname() Group by the lastname column
 * @method     ChildAccountsQuery groupByAge() Group by the age column
 * @method     ChildAccountsQuery groupByGender() Group by the gender column
 * @method     ChildAccountsQuery groupByAddress() Group by the address column
 * @method     ChildAccountsQuery groupByEmployer() Group by the employer column
 * @method     ChildAccountsQuery groupByEmail() Group by the email column
 * @method     ChildAccountsQuery groupByCity() Group by the city column
 * @method     ChildAccountsQuery groupByState() Group by the state column
 *
 * @method     ChildAccountsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAccountsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAccountsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAccountsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAccountsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAccountsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAccounts findOne(ConnectionInterface $con = null) Return the first ChildAccounts matching the query
 * @method     ChildAccounts findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAccounts matching the query, or a new ChildAccounts object populated from the query conditions when no match is found
 *
 * @method     ChildAccounts findOneById(int $id) Return the first ChildAccounts filtered by the id column
 * @method     ChildAccounts findOneByCcountNumber(string $ccount_number) Return the first ChildAccounts filtered by the ccount_number column
 * @method     ChildAccounts findOneByBalance(string $balance) Return the first ChildAccounts filtered by the balance column
 * @method     ChildAccounts findOneByFirstname(string $firstname) Return the first ChildAccounts filtered by the firstname column
 * @method     ChildAccounts findOneByLastname(string $lastname) Return the first ChildAccounts filtered by the lastname column
 * @method     ChildAccounts findOneByAge(string $age) Return the first ChildAccounts filtered by the age column
 * @method     ChildAccounts findOneByGender(string $gender) Return the first ChildAccounts filtered by the gender column
 * @method     ChildAccounts findOneByAddress(string $address) Return the first ChildAccounts filtered by the address column
 * @method     ChildAccounts findOneByEmployer(string $employer) Return the first ChildAccounts filtered by the employer column
 * @method     ChildAccounts findOneByEmail(string $email) Return the first ChildAccounts filtered by the email column
 * @method     ChildAccounts findOneByCity(string $city) Return the first ChildAccounts filtered by the city column
 * @method     ChildAccounts findOneByState(string $state) Return the first ChildAccounts filtered by the state column *

 * @method     ChildAccounts requirePk($key, ConnectionInterface $con = null) Return the ChildAccounts by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAccounts requireOne(ConnectionInterface $con = null) Return the first ChildAccounts matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAccounts requireOneById(int $id) Return the first ChildAccounts filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAccounts requireOneByCcountNumber(string $ccount_number) Return the first ChildAccounts filtered by the ccount_number column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAccounts requireOneByBalance(string $balance) Return the first ChildAccounts filtered by the balance column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAccounts requireOneByFirstname(string $firstname) Return the first ChildAccounts filtered by the firstname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAccounts requireOneByLastname(string $lastname) Return the first ChildAccounts filtered by the lastname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAccounts requireOneByAge(string $age) Return the first ChildAccounts filtered by the age column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAccounts requireOneByGender(string $gender) Return the first ChildAccounts filtered by the gender column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAccounts requireOneByAddress(string $address) Return the first ChildAccounts filtered by the address column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAccounts requireOneByEmployer(string $employer) Return the first ChildAccounts filtered by the employer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAccounts requireOneByEmail(string $email) Return the first ChildAccounts filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAccounts requireOneByCity(string $city) Return the first ChildAccounts filtered by the city column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAccounts requireOneByState(string $state) Return the first ChildAccounts filtered by the state column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAccounts[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAccounts objects based on current ModelCriteria
 * @method     ChildAccounts[]|ObjectCollection findById(int $id) Return ChildAccounts objects filtered by the id column
 * @method     ChildAccounts[]|ObjectCollection findByCcountNumber(string $ccount_number) Return ChildAccounts objects filtered by the ccount_number column
 * @method     ChildAccounts[]|ObjectCollection findByBalance(string $balance) Return ChildAccounts objects filtered by the balance column
 * @method     ChildAccounts[]|ObjectCollection findByFirstname(string $firstname) Return ChildAccounts objects filtered by the firstname column
 * @method     ChildAccounts[]|ObjectCollection findByLastname(string $lastname) Return ChildAccounts objects filtered by the lastname column
 * @method     ChildAccounts[]|ObjectCollection findByAge(string $age) Return ChildAccounts objects filtered by the age column
 * @method     ChildAccounts[]|ObjectCollection findByGender(string $gender) Return ChildAccounts objects filtered by the gender column
 * @method     ChildAccounts[]|ObjectCollection findByAddress(string $address) Return ChildAccounts objects filtered by the address column
 * @method     ChildAccounts[]|ObjectCollection findByEmployer(string $employer) Return ChildAccounts objects filtered by the employer column
 * @method     ChildAccounts[]|ObjectCollection findByEmail(string $email) Return ChildAccounts objects filtered by the email column
 * @method     ChildAccounts[]|ObjectCollection findByCity(string $city) Return ChildAccounts objects filtered by the city column
 * @method     ChildAccounts[]|ObjectCollection findByState(string $state) Return ChildAccounts objects filtered by the state column
 * @method     ChildAccounts[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AccountsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\AccountsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'articles', $modelName = '\\Accounts', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAccountsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAccountsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAccountsQuery) {
            return $criteria;
        }
        $query = new ChildAccountsQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildAccounts|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AccountsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AccountsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAccounts A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, ccount_number, balance, firstname, lastname, age, gender, address, employer, email, city, state FROM articles.accounts WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildAccounts $obj */
            $obj = new ChildAccounts();
            $obj->hydrate($row);
            AccountsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildAccounts|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildAccountsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AccountsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAccountsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AccountsTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAccountsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AccountsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AccountsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the ccount_number column
     *
     * Example usage:
     * <code>
     * $query->filterByCcountNumber('fooValue');   // WHERE ccount_number = 'fooValue'
     * $query->filterByCcountNumber('%fooValue%', Criteria::LIKE); // WHERE ccount_number LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ccountNumber The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAccountsQuery The current query, for fluid interface
     */
    public function filterByCcountNumber($ccountNumber = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ccountNumber)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountsTableMap::COL_CCOUNT_NUMBER, $ccountNumber, $comparison);
    }

    /**
     * Filter the query on the balance column
     *
     * Example usage:
     * <code>
     * $query->filterByBalance('fooValue');   // WHERE balance = 'fooValue'
     * $query->filterByBalance('%fooValue%', Criteria::LIKE); // WHERE balance LIKE '%fooValue%'
     * </code>
     *
     * @param     string $balance The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAccountsQuery The current query, for fluid interface
     */
    public function filterByBalance($balance = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($balance)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountsTableMap::COL_BALANCE, $balance, $comparison);
    }

    /**
     * Filter the query on the firstname column
     *
     * Example usage:
     * <code>
     * $query->filterByFirstname('fooValue');   // WHERE firstname = 'fooValue'
     * $query->filterByFirstname('%fooValue%', Criteria::LIKE); // WHERE firstname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $firstname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAccountsQuery The current query, for fluid interface
     */
    public function filterByFirstname($firstname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($firstname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountsTableMap::COL_FIRSTNAME, $firstname, $comparison);
    }

    /**
     * Filter the query on the lastname column
     *
     * Example usage:
     * <code>
     * $query->filterByLastname('fooValue');   // WHERE lastname = 'fooValue'
     * $query->filterByLastname('%fooValue%', Criteria::LIKE); // WHERE lastname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lastname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAccountsQuery The current query, for fluid interface
     */
    public function filterByLastname($lastname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountsTableMap::COL_LASTNAME, $lastname, $comparison);
    }

    /**
     * Filter the query on the age column
     *
     * Example usage:
     * <code>
     * $query->filterByAge('fooValue');   // WHERE age = 'fooValue'
     * $query->filterByAge('%fooValue%', Criteria::LIKE); // WHERE age LIKE '%fooValue%'
     * </code>
     *
     * @param     string $age The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAccountsQuery The current query, for fluid interface
     */
    public function filterByAge($age = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($age)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountsTableMap::COL_AGE, $age, $comparison);
    }

    /**
     * Filter the query on the gender column
     *
     * Example usage:
     * <code>
     * $query->filterByGender('fooValue');   // WHERE gender = 'fooValue'
     * $query->filterByGender('%fooValue%', Criteria::LIKE); // WHERE gender LIKE '%fooValue%'
     * </code>
     *
     * @param     string $gender The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAccountsQuery The current query, for fluid interface
     */
    public function filterByGender($gender = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($gender)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountsTableMap::COL_GENDER, $gender, $comparison);
    }

    /**
     * Filter the query on the address column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress('fooValue');   // WHERE address = 'fooValue'
     * $query->filterByAddress('%fooValue%', Criteria::LIKE); // WHERE address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAccountsQuery The current query, for fluid interface
     */
    public function filterByAddress($address = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountsTableMap::COL_ADDRESS, $address, $comparison);
    }

    /**
     * Filter the query on the employer column
     *
     * Example usage:
     * <code>
     * $query->filterByEmployer('fooValue');   // WHERE employer = 'fooValue'
     * $query->filterByEmployer('%fooValue%', Criteria::LIKE); // WHERE employer LIKE '%fooValue%'
     * </code>
     *
     * @param     string $employer The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAccountsQuery The current query, for fluid interface
     */
    public function filterByEmployer($employer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($employer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountsTableMap::COL_EMPLOYER, $employer, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%', Criteria::LIKE); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAccountsQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountsTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the city column
     *
     * Example usage:
     * <code>
     * $query->filterByCity('fooValue');   // WHERE city = 'fooValue'
     * $query->filterByCity('%fooValue%', Criteria::LIKE); // WHERE city LIKE '%fooValue%'
     * </code>
     *
     * @param     string $city The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAccountsQuery The current query, for fluid interface
     */
    public function filterByCity($city = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($city)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountsTableMap::COL_CITY, $city, $comparison);
    }

    /**
     * Filter the query on the state column
     *
     * Example usage:
     * <code>
     * $query->filterByState('fooValue');   // WHERE state = 'fooValue'
     * $query->filterByState('%fooValue%', Criteria::LIKE); // WHERE state LIKE '%fooValue%'
     * </code>
     *
     * @param     string $state The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAccountsQuery The current query, for fluid interface
     */
    public function filterByState($state = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($state)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountsTableMap::COL_STATE, $state, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAccounts $accounts Object to remove from the list of results
     *
     * @return $this|ChildAccountsQuery The current query, for fluid interface
     */
    public function prune($accounts = null)
    {
        if ($accounts) {
            $this->addUsingAlias(AccountsTableMap::COL_ID, $accounts->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the articles.accounts table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AccountsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AccountsTableMap::clearInstancePool();
            AccountsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AccountsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AccountsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AccountsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AccountsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AccountsQuery
