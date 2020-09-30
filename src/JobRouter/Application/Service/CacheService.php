<?php


namespace JobRouter\Application\Service;


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
