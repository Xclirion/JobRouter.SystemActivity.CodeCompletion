<?php
namespace JobRouter\Application\Config;
class Config {
    public const PROPERTY_PASSWORD = 'password';
    public const KEY_DB = 'db';
    public const SUPPORTED_CONSTANTS = [     'CONST_DB_USR' => [     'class' => 'Db',     'property' => 'user',     'source' => 'default' ],     'CONST_DB_PWD' => [     'class' => 'Db',     'property' => 'password',     'source' => 'default' ],     'CONST_DB_SERVER' => [     'class' => 'Db',     'property' => 'server',     'source' => 'default' ],     'CONST_DB_HOST' => [     'class' => 'Db',     'property' => 'host',     'source' => 'default' ],     'CONST_DB_DATABASE' => [     'class' => 'Db',     'property' => 'database',     'source' => 'default' ],     'CONST_DB_PORT' => [     'class' => 'Db',     'property' => 'port',     'source' => 'default' ],     'CONST_DB_EXEC_TIME_LIMIT' => [     'class' => 'Db',     'property' => 'execTimeLimit',     'source' => 'default' ],     'CONST_DB_CHARSET' => [     'class' => 'Db',     'property' => 'charset',     'source' => 'default' ] ];
    /** @var \stdClass|Config */
    protected $config;
    /** @var \stdClass|Config */
    protected $defaults;
    protected static $restrictedContent = [];
    /**
     * Config constructor.
     * @param array $config
     * @throws \Exception
     */
    public function __construct(array $config) {}
    /**
     * @param $name
     * @param $value
     * @throws \Exception
     */
    public function __set($name, $value) {}
    public function __get($name) {}
    public static function setGlobalRestrictions(string $restrictions='') : void {}
}
