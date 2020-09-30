<?php
namespace JobRouter\Application\Config\Entries;
/**
 * @property-read string $user
 * @property-read string $password
 * @property-read int $server
 * @property-read string $host
 * @property-read string $database
 * @property-read int $port
 * @property-read string $charset
 * @property-read float $execTimeLimit
 */
class Db extends \JobRouter\Application\Config\Entries\Generic {
    protected $config;
    public function __construct(array $config, JobRouter\Application\Config\Entries\Db $default) {}
    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value) {}
    public function __get($name) {}
    public function __isset($name) {}
}
class Generic {
    protected $config;
    public function __construct(array $config) {}
    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value) {}
    public function __get($name) {}
    public function __isset($name) {}
}