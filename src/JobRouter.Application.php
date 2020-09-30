<?php
namespace JobRouter\Application;
class Configuration implements \ArrayAccess, \IteratorAggregate {
    private $configuration = [];
    public function __construct(Iterator $iterator) {}
    public function offsetExists($offset) {}
    public function offsetGet($offset) {}
    public function offsetSet($offset, $value) {}
    public function offsetUnset($offset) {}
    public function getIterator() {}
    public function set(Iterator $iterator) {}
}
/**
 * Class Container
 * @package JobRouter\Application
 * Services registered early in central.php
 * @property-read \JobRouter\Application\Service\CacheService $cache
 * @property-read \JobRouter\Application\Service\DatabaseConnectionService $dbfactory
 * @property-read \JobRouter\Application\Service\LoggerService $logger
 * @property-read \JobRouter\Application\Service\RedisService $redis
 * @property-read \JobRouter\Application\Service\SessionService $session
 * @property-read \JobRouter\Application\Service\EnvironmentService $env
 * @property-read \JobRouter\Application\Service\SettingsService $settings
 * Services registered in central.php
 * @property-read \JobRouter\Application\Service\ConfigurationService $configuration
 * @property-read \JobRouter\Application\Service\CredentialService $credential
 * @property-read \JobRouter\Application\Security\CryptoService $crypto
 */
class Container implements \ArrayAccess {
    /**
     * @param string $name
     * @return mixed
     * @throws \Exception
     */
    public function __get($name) {}
    /**
     * @param $name
     * @param $value
     * @throws \JobRouterException
     */
    public function __set($name, $value) {}
    /**
     * Instantiates the container.
     * Objects and parameters can be passed as argument to the constructor.
     * @param array $values The parameters or objects
     */
    public function __construct(array $values=[]) {}
    /**
     * Sets a parameter or an object.
     * Objects must be defined as Closures.
     * Allowing any PHP callable leads to difficult to debug problems
     * as function names (strings) are callable (creating a function with
     * the same name as an existing parameter would break your container).
     * @param string $id    The unique identifier for the parameter or object
     * @param mixed  $value The value of the parameter or a closure to define an object
     * @throws \Exception Prevent override of a frozen service
     */
    public function offsetSet($id, $value) {}
    /**
     * Gets a parameter or an object.
     * @param string $id The unique identifier for the parameter or object
     * @return mixed The value of the parameter or an object
     * @throws \Exception If the identifier is not defined
     */
    public function offsetGet($id) : mixed {}
    /**
     * Checks if a parameter or an object is set.
     * @param string $id The unique identifier for the parameter or object
     * @return bool
     */
    public function offsetExists($id) : bool {}
    /**
     * Unsets a parameter or an object.
     * @param string $id The unique identifier for the parameter or object
     */
    public function offsetUnset($id) {}
    /**
     * Marks a callable as being a factory service.
     * @param callable $callable A service definition to be used as a factory
     * @return callable The passed callable
     * @throws \Exception Service definition has to be a closure or an invokable object
     */
    public function factory($callable) : callable {}
    /**
     * Protects a callable from being interpreted as a service.
     * This is useful when you want to store a callable as a parameter.
     * @param callable $callable A callable to protect from being evaluated
     * @return callable The passed callable
     * @throws \Exception Service definition has to be a closure or an invokable object
     */
    public function protect($callable) : callable {}
    /**
     * Gets a parameter or the closure defining an object.
     * @param string $id The unique identifier for the parameter or object
     * @return mixed The value of the parameter or the closure defining an object
     * @throws \Exception If the identifier is not defined
     */
    public function raw($id) : mixed {}
    /**
     * Extends an object definition.
     * Useful when you want to extend an existing object definition,
     * without necessarily loading that object.
     * @param string   $id       The unique identifier for the object
     * @param callable $callable A service definition to extend the original
     * @return callable The wrapped callable
     * @throws \Exception
     */
    public function extend($id, $callable) : callable {}
    /**
     * Returns all defined value names.
     * @return array An array of value names
     */
    public function keys() : array {}
    /**
     * Registers a service provider.
     * @param  $provider A ServiceProviderInterface instance
     * @param array                    $values   An array of values that customizes the provider
     * @return Container
     */
    public function register($provider, array $values=[]) : Container {}
}
