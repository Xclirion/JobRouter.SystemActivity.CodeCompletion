<?php
namespace JobRouter\Common\Database;
interface ConnectionInterface {
    public const DB_MSSQL = 0;
    public const DB_MYSQL = 1;
    public const DB_ORACLE = 2;
    public const DB_ODBC = 3;
    public const DB_DB2 = 4;
    public const DB_SQLSRV = 5;
    public const DB_SQLITE3 = 9;
    public const DATABASE_LABEL = [     0 => 'MS SQL',     1 => 'MySQL / MariaDB',     2 => 'ORACLE',     3 => 'ODBC',     4 => 'DB2',     5 => 'SQLSRV',     9 => 'SQLite3' ];
    public const TYPE_CLOB = 'clob';
    public const TYPE_DECIMAL = 'decimal';
    public const TYPE_DATETIME = 'timestamp';
    public const TYPE_INTEGER = 'integer';
    public const TYPE_TEXT = 'text';
    public const DSN_KEY_PASSWORD = 'password';
    public const SCHEMA_TABLE_SEPARATOR = '##_##';
    public const DB_SERVER_DATE_FORMATS = [     0 => 'Ymd H:i:s',     1 => 'Y-m-d H:i:s',     2 => 'Y-m-d H:i:s',     3 => 'Ymd H:i:s',     4 => 'Y-m-d H:i:s',     5 => 'Ymd H:i:s',     9 => 'Ymd H:i:s' ];
    public function getCharset();
    public function setCharset($charset);
    /**
     * Method establish a connection to the database.
     * @param \JobRouter\Log\LogInfoInterface|null $logInfoInterface
     * @param bool $loggingEnabled
     * @return mixed
     */
    public function connect(\JobRouter\Log\LogInfoInterface $logInfoInterface, $loggingEnabled=true);
    /**
     * Executes an SQL statement, returning a result set as a Statement object.
     * @param string $sql sql query
     * @param \JobRouter\Log\LogInfoInterface $logInfo
     * @param bool $loggingEnabled specifies if the statement should be logged
     * @return mixed
     * @throws \JobRouterException
     */
    public function query($sql, \JobRouter\Log\LogInfoInterface $logInfo, $loggingEnabled=true);
    /**
     * Executes an SQL statement and return the number of affected rows.
     * @param string $sql sql query
     * @param \JobRouter\Log\LogInfoInterface|null $logInfoInterface
     * @param bool $loggingEnabled
     * @return mixed
     */
    public function exec($sql, \JobRouter\Log\LogInfoInterface $logInfoInterface, $loggingEnabled=true);
    /**
     * Methode liefert nächsten Datensatz als indiziertes Array zurück.
     * Wenn keine weiteren Datensätze mehr im Result vorhanden sind, wird null zurückgeliefert.
     * Im Fehlerfall liefert die Methode false zurück.
     * @param mixed $result Result-Objekt, das von query() zurückgeliefert wird
     * @return    mixed        Datensatz als indiziertes Array, null oder false im Fehlerfall
     */
    public function fetchArray($result);
    /**
     * Return a dataset from the result as an associative array.
     * If there are no more datasets, a null will be returned, false will be returned on error.
     * @param mixed $result
     * @return array|false|null
     */
    public function fetchRow($result) : array;
    /**
     * Methode liefert nächsten Datensatz als Objekt zurück.
     * Wenn keine weiteren Datensätze mehr im Result vorhanden sind, wird null zurückgeliefert.
     * Im Fehlerfall liefert die Methode false zurück.
     * @param mixed $result Result-Objekt, das von query() zurückgeliefert wird
     * @param string $className Name der Klasse, in der das Result gespeichert werden soll
     * @return    mixed        Datensatz als Objekt, null oder false im Fehlerfall
     */
    public function fetchObject($result, $className='stdClass');
    /**
     * Methode liefert erste Spalte des Abfrageergebnisses zurück.
     * Im Fehlerfall liefert die Methode false zurück.
     * @param mixed $result Result-Objekt, das von query() zurückgeliefert wird
     * @return    mixed        Array bzw. false im Fehlerfall
     */
    public function fetchCol($result);
    /**
     * Method returns all rows of the query result.
     * If an error occurs, the method returns false.
     * @param mixed $result result object returned by query()
     * @return    mixed array or false in case of error
     */
    public function fetchAll($result);
    /**
     * Returns the first column of the first data set.
     * If an error occurs, the method returns false.
     * @param mixed $result result object returned by query
     * @return    string|false
     */
    public function fetchOne($result) : string;
    /**
     * Konvertiert den übergebenen Wert in ein DBMS-spezifisches Format, das sich für Query-Statements eignet.
     * @param $value string zu konvertierender Wert
     * @param $type string Typ, in den der Wert konvertiert werden soll
     * @return string konvertierter Wert
     * @throws \JobRouterException
     */
    public function quote(string $value, string $type) : string;
    /**
     * Quotet den übergebenen Bezeichner (z. B. Feld- oder Tabellenname), so dass
     * er sicher verwendet werden kann. Das Quoting erfolgt dabei DBMS-spezifisch.
     * @param string $identifier Bezeichner (z. B. Feld- oder Tabellenname), der
     *                                geqoutet werden soll
     * @return    string    gequoteter Bezeichner (z. B. Feld- oder Tabellenname)
     */
    public function quoteIdentifier($identifier) : string;
    /**
     * Methode liefert den aktuellen Zeitpunkt in einem DBMS-spezifischen Format zurück.
     * @param string $type 'timestamp', 'time', oder 'date'
     * @return    string    aktueller Zeitpunkt im gewünschten Format
     */
    public function now($type='timestamp') : string;
    /**
     * @param callable $workload
     * @return mixed
     * @throws \Throwable
     */
    public function withTransaction(callable $workload);
    /**
     * Starts a transaction by suspending auto-commit mode.
     * @param \JobRouter\Log\LogInfoInterface|null $logInfoInterface
     * @param bool $loggingEnabled
     * @return void
     */
    public function beginTransaction(\JobRouter\Log\LogInfoInterface $logInfoInterface, $loggingEnabled=true);
    /**
     * Commits the current transaction.
     * @throws \Throwable If the commit failed due to no active transaction or because the transaction was marked for rollback only.
     */
    public function commit();
    /**
     * Cancels any database changes done during the current transaction.
     * @return void
     * @throws \Throwable If the rollback operation failed.
     */
    public function rollback();
    /**
     * Checks whether a transaction is currently active.
     * @return bool TRUE if a transaction is currently active, FALSE otherwise.
     */
    public function inTransaction() : bool;
    /**
     * Methode liefert den zuletzt aufgetretenen Fehler zurück.
     * @return    string    Fehlermeldung des zuletzt aufgetretenen Fehlers
     */
    public function getErrorMessage() : string;
    /**
     * Methode schließt die Datenbankverbindung.
     * Liefert true, wenn die Verbindung geschlossen wurde. Im Fehlerfall, oder wenn keine
     * Verbindung geöffnet war, liefert die Methode false zurück.
     * @param bool $force Flag, um das Schließen persistenter Verbindungen zu erzwingen
     * @return bool true, wenn die Verbindung geschlossen wurde, false in Fehlerfall
     */
    public function closeConnection($force=true) : bool;
    /**
     * Returns number of rows of the last query
     * @param mixed $result
     * @return int Number of rows
     */
    public function getNumRows($result) : int;
    public function setLimit($limit, $offset);
    /**
     * Prepares a SQL statement for later execution.
     * @param string $query
     * @param array $types
     * @param mixed $resultTypes
     * @param \JobRouter\Log\LogInfoInterface $logInfoInterface
     * @param bool $loggingEnabled
     * @return mixed
     */
    public function prepare($query, array $types, $resultTypes, ?\JobRouter\Log\LogInfoInterface $logInfoInterface = null, $loggingEnabled=true);
    /**
     * Executes a prepared SQL statement.
     * @param mixed $stmt
     * @param array $params
     * @param \JobRouter\Log\LogInfoInterface $logInfoInterface
     * @param bool $loggingEnabled
     * @return mixed
     */
    public function execute($stmt, array $params, ?\JobRouter\Log\LogInfoInterface $logInfoInterface = null, $loggingEnabled=true);
    /**
     * Executes an, optionally parametrized, SQL query.
     * @param string $sql
     * @param array $params
     * @param array $types
     * @param \JobRouter\Log\LogInfoInterface|null $logInfoInterface
     * @return mixed
     * @throws \JobRouterException
     */
    public function preparedSelect(string $sql, array $params, array $types, ?\JobRouter\Log\LogInfoInterface $logInfoInterface = null);
    /**
     * @param string $sql
     * @param array $params
     * @param array|null $types
     * @param \JobRouter\Log\LogInfoInterface|null $logInfoInterface
     * @return mixed
     * @throws \JobRouterException
     */
    public function preparedExecute(string $sql, array $params, array $types, ?\JobRouter\Log\LogInfoInterface $logInfoInterface = null);
    /**
     * Returns the ID of the last inserted row, or the last value from a sequence object,
     * depending on the underlying driver.
     * Note: This method may not return a meaningful or consistent result across different drivers,
     * because the underlying database may not even support the notion of AUTO_INCREMENT/IDENTITY
     * columns or sequences.
     * @param string|null $table Name of the sequence object from which the ID should be returned.
     * @param string|null $field Name of the field linked to the table. (only important for JobDB)
     * @return string A string representation of the last inserted ID.
     */
    public function lastInsertId($table, $field) : string;
    public function free($result);
    /**
     * returns JobRouter database type as integer
     * @return int
     * @throws \JobRouterException
     */
    public function getDbType() : int;
    public function createQueryBuilder();
    /**
     * Indicates if a table already exists or not.
     * @param string $tableName
     * @return boolean true if table exists or false if not
     */
    public function tableExists($tableName) : bool;
}
interface ResultInterface {
    /**
     * Column data indexed by column names
     */
    public const MODE_ASSOC = 2;
    /**
     * This is a special constant which means the user hasn't specified
     * any particular get mode, so the default should be used.
     */
    public const MODE_DEFAULT = 0;
    /**
     * For multi-dimensional results: normally the first level of arrays
     * is the row number, and the second level indexed by column number or name.
     * MODE_FLIPPED switches this order, so the first level of arrays
     * is the column name, and the second level the row number.
     */
    public const MODE_FLIPPED = 4;
    /**
     * Column data as object properties
     */
    public const MODE_OBJECT = 3;
    /**
     * Column data indexed by numbers, ordered from 0 and up
     */
    public const MODE_ORDERED = 1;
    public function fetchAll($fetchmode=self::MODE_DEFAULT, $rekey=false, $force_array=false, $group=false);
    public function fetchCol($colnum=0);
    public function fetchOne($colnum=0, $rownum);
    public function fetchRow($fetchmode=self::MODE_DEFAULT, $rownum);
    public function free();
    public function getColumnNames($flip=false);
    public function nextResult();
    public function numCols();
    public function numRows();
    public function rowCount();
    public function seek($rownum=0);
    public function getMdb2Result();
}
class Result implements \JobRouter\Common\Database\ResultInterface {
    /**
     * Result constructor.
     * @param mixed $result
     */
    public function __construct(MDB2_Result_Common $result) {}
    public function getMdb2Result() {}
    public function fetchAll($fetchmode=self::MODE_DEFAULT, $rekey=false, $force_array=false, $group=false) {}
    public function fetchCol($colnum=0) {}
    public function fetchOne($colnum=0, $rownum) {}
    public function fetchRow($fetchmode=self::MODE_DEFAULT, $rownum) {}
    public function free() {}
    public function getColumnNames($flip=false) {}
    public function nextResult() {}
    public function numCols() {}
    public function numRows() {}
    public function rowCount() {}
    public function seek($rownum=0) {}
}
interface StatementInterface {
    public const TYPE_CLOB = 'clob';
    public const TYPE_DATETIME = 'timestamp';
    public const TYPE_DECIMAL = 'decimal';
    public const TYPE_INTEGER = 'integer';
    public const TYPE_TEXT = 'text';
    public function execute($values, $result_class=true, $result_wrap_class=false);
    public function free();
}
interface SchemaManipulationInterface {
    /**
     * Create a new table.
     * The method createTable() takes three parameters:
     * The table name, an array of field definition and
     * some extra options (optional and RDBMS-specific).
     * $definition = array (
     *     'id' => array (
     *         'type' => 'integer',
     *         'unsigned' => 1,
     *         'notnull' => 1,
     *         'default' => 0,
     *     ),
     *     'name' => array (
     *         'type' => 'text',
     *         'length' => 255
     *     ),
     *     'datetime' => array (
     *         'type' => 'timestamp'
     *     )
     * );
     * In case of an error it gives false back
     * @param string $tableName Name of the table that should be created
     * @param mixed $definition Associative array that contains the definition of each field
     *                          of the new table. The indexes of the array entries are the
     *                          names of the fields of the table and the array entry values are
     *                          associative arrays like those that are meant to be passed with
     *                          the field definitions to get[Type]Declaration() functions:
     *                          array('id' => array('type' => 'integer', 'unsigned' => 1,
     *                              'notnull' => 1, 'default' => 0),
     *                             'name' => array('type' => 'text', 'length' => 12),
     *                              'password' => array('type' => 'text', 'length' => 12)
     *                          )
     * @param mixed $tableOptions An associative array of table options:
     *                            array('comment' => 'Foo', 'temporary' => true|false)
     * @param bool $loggingEnabled
     * @return bool true bzw. false, wenn ein Fehler aufgetreten ist
     */
    public function createTable($tableName, $definition, $tableOptions, $loggingEnabled=true) : bool;
    /**
     * Deletes a table
     * The method dropTable() has one Parameter:
     * In case of an error it gives false back
     * @param    string $tableName Name of the table that should be created
     * @return    bool    true bzw. false, wenn ein Fehler aufgetreten ist
     */
    public function dropTable($tableName) : bool;
    public function getErrorMessage();
}