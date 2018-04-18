<?php

namespace NorthernLights\EloquentBootstrap\Provider;

use ArrayIterator;
use StdClass;

/**
 * Class ConfigProvider
 * @package NorthernLights\EloquentBootstrap\Provider
 */
class ConfigProvider extends ArrayIterator implements ConfigProviderInterface
{
    /** @var array */
    protected $config;

    /** @var string */
    protected $alias;

    /** @var array */
    private static $instances = [];

    /**
     * Config constructor.
     *
     * @param string $alias
     * @param array|null $config
     */
    public function __construct(array $config = null, $alias = 'default')
    {
        $this->alias = $alias;

        // Default skeleton
        $this->config = [
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => null,
            'username'  => null,
            'password'  => null,
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => ''
        ];

        if ($config !== null) {
            $this->config = array_merge($this->config, $config);
        }

        self::$instances[$alias] = $this;

        parent::__construct($this->config);
    }

    /**
     * {@inheritdoc}
     */
    public static function getInstance($alias = 'default')
    {
        return isset(self::$instances[$alias]) ? self::$instances[$alias] : null;
    }

    /**
     * {@inheritdoc}
     */
    public function getOption($name)
    {
        return isset($this->config[$name]) ? $this->config[$name] : null;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        return $this->config;
    }

    /**
     * {@inheritdoc}
     */
    public function toObject()
    {
        return (object)$this->config;
    }

    /**
     * {@inheritdoc}
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * {@inheritdoc}
     */
    public function __get($name)
    {
        return isset($this->config[$name]) ? $this->config[$name] : null;
    }

    /**
     * {@inheritdoc}
     */
    public function __set($name, $value)
    {
        $this->readOnlyArrayWarning();
    }

    /**
     * {@inheritdoc}
     */
    public function __isset($name)
    {
        return isset($this->config[$name]);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetSet($offset, $value)
    {
        $this->readOnlyArrayWarning();
    }

    /**
     * {@inheritdoc}
     */
    public function offsetUnset($offset)
    {
        $this->readOnlyArrayWarning();
    }

    /**
     * Triggers warning
     */
    private function readOnlyArrayWarning()
    {
        trigger_error('Operation failure. Read-Only array', E_USER_WARNING);
    }
}
