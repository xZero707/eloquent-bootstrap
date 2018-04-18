<?php

namespace NorthernLights\EloquentBootstrap;

use NorthernLights\EloquentBootstrap\Provider\ConfigProviderInterface;
use NorthernLights\EloquentBootstrap\Provider\ConnectionProviderInterface;

/**
 * Class Connection
 * @package NorthernLights\EloquentBootstrap
 */
class Connection implements ConnectionProviderInterface
{
    /** @var ConfigProviderInterface */
    protected $config;

    /** @var string */
    protected $name;

    /**
     * Connection constructor.
     *
     * @param string $name
     * @param ConfigProviderInterface $config
     */
    public function __construct($name, ConfigProviderInterface $config)
    {
        $this->name   = $name;
        $this->config = $config;
    }

    /**
     * {@inheritdoc}
     */
    public function getDriver()
    {
        return $this->config->getOption('driver');
    }

    /**
     * {@inheritdoc}
     */
    public function getHost()
    {
        return $this->config->getOption('host');
    }

    /**
     * {@inheritdoc}
     */
    public function getUsername()
    {
        return $this->config->getOption('username');
    }

    /**
     * {@inheritdoc}
     */
    public function getPassword()
    {
        return $this->config->getOption('password');
    }

    /**
     * {@inheritdoc}
     */
    public function getDatabase()
    {
        return $this->config->getOption('database');
    }

    /**
     * {@inheritdoc}
     */
    public function getCharset()
    {
        return $this->config->getOption('charset');
    }

    /**
     * {@inheritdoc}
     */
    public function getCollation()
    {
        return $this->config->getOption('collation');
    }

    /**
     * {@inheritdoc}
     */
    public function getPrefix()
    {
        return $this->config->getOption('prefix');
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function getConfig()
    {
        return $this->config;
    }
}
