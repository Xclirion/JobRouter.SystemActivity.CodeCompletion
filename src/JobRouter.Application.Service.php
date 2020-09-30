<?php
namespace JobRouter\Application\Service;
use JobRouter\Common\Database\ConnectionInterface;
class RedisService {
    private $host;
    private $port;
    private $dbIndex;
    private $authPassword;
    private $redisInstance;
    public function __construct(string $host, int $port, int $dbIndex, $authPassword) {}
    public function getInstance() {}
    private function createRedisInstance() {}
    private function ensureRedisIsLoaded() {}
    private function ensureRedisIsConfigured() {}
}
interface ServiceAwareInterface {
    public function setServices( \JobRouter\Application\Container $services);
}
class DatabaseConnectionService {
    public const DEFAULT_CONNECTION_NAME = '##jobdb##';
    public const JOBDATA_CONNECTION_NAME = '##jobdatadb##';
    public const DEFAULT_CONNECTION_DISPLAY_NAME = 'JobRouter';
    public const JOBDATA_CONNECTION_DISPLAY_NAME = 'JobData';
    protected $decryptFunction;
    protected $connectionMaker;
    protected $fieldTypeConverter;
    /**
     * DatabaseConnectionService constructor.
     * @param \JobRouter\Common\Database\ConnectionInterface $jobDB MDB2 connection
     * @param \JobRouter\Common\Database\ConnectionInterface $connection Doctrine connection
     * @param array $jobDataDbCredentials
     * @param \JobRouter\Application\Container $serviceContainer
     * @param callable $decryptFunction function for password decryption. TODO remove, when all database connections have their encryption key (JobData etc.)
     * @param callable $connectionMaker
     * @param callable $doctrineConnectionMaker
     * @param callable $fieldTypeConverter
     */
    public function __construct( \JobRouter\Common\Database\ConnectionInterface $jobDB, \JobRouter\Common\Database\ConnectionInterface $connection, array $jobDataDbCredentials, \JobRouter\Application\Container $serviceContainer, callable $decryptFunction, callable $connectionMaker, callable $doctrineConnectionMaker, callable $fieldTypeConverter) {}
    /**
     * Get JobRouter DB connection
     * @param string $connectionName
     * @return \JobRouter\Common\Database\ConnectionInterface
     * @throws \JobRouterException
     */
    public function getConnection($connectionName=self::DEFAULT_CONNECTION_NAME) : \JobRouter\Common\Database\ConnectionInterface {}
    /**
     * Get JobRouter DB connection or global connection by name
     * @param string $connectionName
     * @return \JobRouter\Common\Database\ConnectionInterface
     * @deprecated use getConnection instead
     */
    public function getMdb2Connection($connectionName=self::DEFAULT_CONNECTION_NAME) : ConnectionInterface {}
    /**
     * @param mixed $instance
     * @return array
     * @throws \Throwable
     */
    public function getCredentialsArrayFromConnectionInstance($instance) : array {}
    public function convertJrTypeToMdb2Type($jrType) {}
    public function exportConnection($connectionName, \JobRouter\Common\Database\ConnectionInterface $jobDB) {}
    public function hasConnection($connectionName, \JobRouter\Common\Database\ConnectionInterface $jobDB) {}
    public function importConnection($description, \JobRouter\Common\Database\ConnectionInterface $jobDB) {}
    public function isJobDataConnectionConfigured() {}
    public function resolveConnectionName($connectionName) {}
    public function getJobImportConnection(string $connectionName) : \JobRouter\Common\Database\ConnectionInterface {}
    /**
     * @return ConnectionInterface
     * @throws \JobRouterException
     */
    public function getRestrictedConnectionWithFallback() : \JobRouter\Common\Database\ConnectionInterface {}
    /**
     * @return \JobRouter\Common\Database\ConnectionInterface
     * @throws \JobRouterException
     */
    private function getJobDataConnection() : \JobRouter\Common\Database\ConnectionInterface {}
    private function getJobDataMdb2Connection() {}
    /**
     * @param $password
     * @return string
     * @throws \JobRouterException
     */
    private function getDecryptedPassword($password) : string {}
    /**
     * @param $credentials
     * @return ConnectionInterface
     * @throws \JobRouterException
     */
    private function getConnectionInterfaceFromConnectionMaker($credentials) : \JobRouter\Common\Database\ConnectionInterface {}
    /**
     * @param $credentials
     * @return \JobRouter\Common\Database\ConnectionInterface
     * @throws \JobRouterException
     */
    private function getConnectionInterfaceFromDoctrineConnectionMaker($credentials) : \JobRouter\Common\Database\ConnectionInterface {}
    private function getExternalConnection($connectionName) {}
    private function getExternalDoctrineConnection(string $connectionName) {}
    private function resolveCredentials(string $connectionName) {}
}
class LoggerService
{
    public function __construct( string $defaultPath ) {}
    public function getLogger( string $logPath, string $logChannel = 'jobrouter', array $options ) : \Psr\Log\LoggerInterface {}
    public function getDefaultLogger( string $fileName = 'default', string $logChannel = 'jobrouter', array $options ) : \Psr\Log\LoggerInterface {}
}
class SessionService {
    public const USER_KEY = 'current_user';
    public const USERNAME_KEY = 'session_login';
    public const FULLNAME_KEY = 'session_fullname';
    public const SESSION_MODULE_JR_KEY = 'jr';
    public function __construct(&$session, callable $logoutHandler) {}
    /**
     * @return string|null
     */
    public function getCurrentUserName() : string {}
    public function setCurrentUserName($userName) {}
    /**
     * @deprecated don't use Utility Methods in services
     * @param string $path
     * @param bool $skipAssert
     * @return bool|null|string
     * @throws \JobRouterException
     */
    public function getFullUploadPath($path='', $skipAssert=false) : bool {}
    public function get($key, $subKey) {}
    public function set($key, $value, $subKey) {}
    public function has($key) : bool {}
    public function delete($key, $subKey) {}
    public function isSet($key) : bool {}
    public function startSession(&$session) {}
    public function destroySession() {}
    public function getSessionId() {}
    public function logout() {}
}
class EnvironmentService {
    public function __construct(\Closure $getter, \Closure $setter) {}
    public function getOnce(string $key, string $default) : ?string {}
    public function get(string $key, string $default) : ?string {}
    public function set(string $key, string $value) : void {}
}
class SettingsService extends JobRouter\Application\Service\AbstractDataObjectService {
    public const KEY_NAME = 'settingName';
    public const KEY_TYPE = 'settingType';
    public const NAME_INFILTER_FILEEXT = 'infilter_fileext';
    public const NAME_INFILTER_FILEEXT_LIST_TYPE = 'infilter_fileext_list_type';
    public const NAME_PASSPHRASE = 'passphrase';
    public const NAME_JOBROUTER_GUID = 'jobrouter_guid';
    public const NAME_JOBDATA_PASSWORD = 'jobdata_password';
    public const NAME_JOBSYNC_PASSWORD = 'sync_password';
    public const NAME_JOBMAIL_PASSWORD = 'sendmail_password';
    public const NAME_RABBITMQ_HOST_NAME = 'rabbitmq_host_name';
    public const NAME_RABBITMQ_VIRTUAL_HOST = 'rabbitmq_virtual_host';
    public const NAME_RABBITMQ_USERNAME = 'rabbitmq_username';
    public const NAME_RABBITMQ_PASSWORD = 'rabbitmq_password';
    public const TYPE_JR = 'jr';
    public const TYPE_ENCRYPTION_KEYS = 'encryption.keys';
    public const TYPE_JOBMAIL = 'jobmail';
    public const TYPE_RABBITMQ = 'rabbitmq';
    protected $cache;
    public function __construct($cache, \JobDB $jobDB) {}
    public function set($key, $value, $username='System') : bool {}
    public function get($key) {}
    public function deleteFromCache($key) : bool {}
    /**
     * @param $key
     * @return bool
     * @throws \JobRouterException
     * @throws \InvalidArgumentException
     */
    public function has($key) : bool {}
    /**
     * @param $key
     * @return bool
     * @throws \JobRouterException
     * @throws \InvalidArgumentException
     */
    public function delete($key) : bool {}
    public function clearCache() {}
    protected function normalizeKey($key) {}
    protected function setInCache($key, $value) : bool {}
    /**
     * @param $key
     * @param $value
     * @return bool
     * @throws \JobRouterException
     */
    protected function setInDataBase($key, $value) : bool {}
    /**
     * @param $key
     * @throws \JobRouterException
     */
    protected function getFromDataBase($key) {}
    protected function hasInCache($key) : bool {}
    /**
     * @param $key
     * @return bool
     * @throws \JobRouterException
     */
    protected function hasInDataBase($key) : bool {}
    /**
     * @param $key
     * @return bool
     * @throws \JobRouterException
     */
    protected function deleteFromDataBase($key) : bool {}
    /**
     * @param $statement
     * @param $sql
     * @param array $types
     * @throws \JobRouterException
     */
    private function prepareStatement(&$statement, $sql, $types=[ 'text', 'text' ]) {}
    /**
     * @param mixed $statement
     * @param array $parameters
     * @return mixed
     * @throws \JobRouterException
     */
    private function execute($statement, array $parameters) {}
    private function ensureKeyIsValid($key) {}
    private function isEncryptionKey($key) : bool {}
    /**
     * @param bool $isInDataBase
     * @param string[] $types
     * @return mixed
     * @throws \JobRouterException
     */
    private function getSetStatement($isInDataBase, $types) {}
    private function resolveKeyParameters($key) {}
}
class ConfigurationService
{
    public const EXCLUDE_FROM_MESSAGES = [
        'CONST_DB_PWD',
        'CONST_DB_USR',
        'CONST_DB_SERVER',
        'CONST_DB_HOST',
        'CONST_DB_DATABASE',
        'CONST_DB_PORT',
        'CONST_LOGIN_FUNCTIONS',
        'CONST_CHECK_IP',
        'CONST_LOGGER_DEFAULT_PATH',
        'CONST_LOG_LEVEL_FILE',
        'CONST_UNICODE_MODE',
        'CONST_CACHE_DIALOGS',
        'CONST_ACTIVATE_JOBROUTER_REPORT',
        'CONST_PWD',
        'CONST_USE_OLD_PASSWORDS',
        'CONST_GENOSSO_CERTIFICATE_FILE',
        'CONST_ZEND_FRAMEWORK_LIB_PATH'
    ];
    public function __construct( \JobRouter\Application\Configuration $constantsConfiguration, \JobRouter\Application\Config\Config $configuration ) {}
    public function getConstantValue( string $constantName ) {}
    /**
     * @param string $key
     *
     * @return mixed
     */
    public function get( string $key ) {}
    public function getDatabaseConnection( string $connectionName ) : ?\JobRouter\Application\Config\Entries\Db {}
}
class CredentialService {
    public function __construct(\JobRouter\Application\Service\ConfigurationService $configurationService, \JobRouter\Application\Security\CryptoService $cryptoService, JobRouter\Application\Security\SecretService $secretService, JobRouter\Common\Security\Secret $instanceKey) {}
    /**
     * @return string
     * @throws \JobRouterException
     */
    public function getPasswordForDefaultConnection() : string {}
    public function getPasswordForRestrictedConnection() : string {}
}
class CacheService {
    private const USER_SUBCACHE_SETTINGS = 'settings';
    private const USER_SUBCACHE_INBOXES = 'inboxes';
    public const USER_DBOBJECT_CACHE_KEY = 'dbobject';
    public const DURATION_10_MIN = 600;
    public const DURATION_1_DAY = 86400;
    private $redisService;
    private $loggerService;
    private $sessionService;
    private $cacheLogger;
    private $cachePath;
    private $logPath;
    private $namespaceEncoder = [ 'TOGoS_Base32', 'encode' ];
    private static $caches = [     'doctrine' => "ERROR! --- UNKNOWN VALUE TYPE ---",     'jrsettings' => "ERROR! --- UNKNOWN VALUE TYPE ---" ];
    public function __construct( $redisService, $loggerService, $sessionService) {}
    public function getCache($namespace='jobrouter') {}
    public function setCachePath($cachePath) {}
    public function setLogPath($logPath) {}
    public function getCacheWithFixedPath($cachePath, $namespace='jobrouter') {}
    public function getUserSettingsCache($username) {}
    public function getUserInboxCache($username) {}
    public function getUserCache($username) {}
    public function getWrappedCache($cache, $namespace) {}
    public function setNamespaceEncoder(callable $namespaceEncoder) {}
    private function getUserSubNamespace($subNamespace, $username) : string {}
    private function getUserNamespace($username) : string {}
    private function prepareNamespace($namespace) {}
    private function normalizeNamespace(string $namespace) {}
    private function loadLogger(string $namespace) {}
    private function initializeCache(string $namespace, string $path) {}
    /**
     * @param $namespace
     */
    private function createRedisAdapter($namespace) {}
    private function createFileSystemAdapter($path, $namespace) {}
}