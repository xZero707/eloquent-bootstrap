<?php

namespace NorthernLights\EloquentBootstrap\Provider;

/**
 * Interface ConnectionProviderInterface
 * @package NorthernLights\EloquentBootstrap\Provider
 */
interface ConnectionProviderInterface
{
    /**
     * Get database driver
     *
     * @return string
     */
    public function getDriver();

    /**
     * Get database host
     *
     * @return string
     */
    public function getHost();

    /**
     * Get database username
     *
     * @return string
     */
    public function getUsername();

    /**
     * Get database password
     *
     * @return string
     */
    public function getPassword();

    /**
     * Get database name
     *
     * @return string
     */
    public function getDatabase();

    /**
     * Get database charset/encoding
     *
     * @return string
     */
    public function getCharset();

    /**
     * Get database collation
     *
     * @return string
     */
    public function getCollation();

    /**
     * Get database prefix
     *
     * @return string
     */
    public function getPrefix();

    /**
     * Get connection name
     *
     * @return string
     */
    public function getName();

    /**
     * Get connection config
     *
     * @return ConfigProviderInterface
     */
    public function getConfig();
}
