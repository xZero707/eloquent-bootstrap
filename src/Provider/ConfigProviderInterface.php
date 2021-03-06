<?php

namespace NorthernLights\EloquentBootstrap\Provider;

use StdClass;

/**
 * Interface ConfigProviderInterface
 * @package NorthernLights\EloquentBootstrap\Provider
 */
interface ConfigProviderInterface
{
    /**
     * Get instance (alias)
     *
     * @param string $alias
     *
     * @return ConfigProviderInterface|null
     */
    public static function getInstance($alias = 'default');

    /**
     * Get config option value
     *
     * @param string|int $name
     *
     * @return mixed
     */
    public function getOption($name);

    /**
     * Get configuration as is
     *
     * @return array
     */
    public function toArray();

    /**
     * Get configuration as is
     *
     * @return StdClass
     */
    public function toObject();

    /**
     * Get alias
     *
     * @return string
     */
    public function getAlias();
}
