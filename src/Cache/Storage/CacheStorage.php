<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-cache
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-cache
 */
declare(strict_types = 1);

namespace Vain\Core\Cache\Storage;

use Vain\Core\Exception\NoCacheTypeException;
use Vain\Core\Exception\NoCacheConnectionException;
use Vain\Core\Exception\UnknownCacheDriverException;
use Vain\Core\Exception\UnknownCacheException;
use Vain\Core\Cache\Factory\CacheFactoryInterface;
use Vain\Core\Connection\Storage\ConnectionStorageInterface;

/**
 * Class CacheStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class CacheStorage implements CacheStorageInterface
{
    private $config;

    private $caches = [];

    private $connectionStorage;

    /**
     * @var CacheFactoryInterface[]
     */
    private $factories = [];

    /**
     * DatabaseFactory constructor.
     *
     * @param \ArrayAccess               $config
     * @param ConnectionStorageInterface $connectionStorage
     * @param CacheFactoryInterface[] $factories
     */
    public function __construct(
        \ArrayAccess $config,
        ConnectionStorageInterface $connectionStorage,
        array $factories = []
    ) {
        $this->config = $config;
        $this->connectionStorage = $connectionStorage;
        foreach ($factories as $factory) {
            $this->addFactory($factory);
        }
    }

    /**
     * @inheritDoc
     */
    public function addFactory(CacheFactoryInterface $factory) : CacheStorageInterface
    {
        $this->factories[$factory->getName()] = $factory;

        return $this;
    }

    /**
     * @param string $cacheName
     *
     * @return mixed
     *
     * @throws UnknownCacheException
     * @throws NoCacheConnectionException
     * @throws NoCacheTypeException
     * @throws UnknownCacheDriverException
     */
    protected function createDatabase(string $cacheName)
    {
        if (false === array_key_exists($cacheName, $this->config['cache'])) {
            throw new UnknownCacheException($this, $cacheName);
        }
        $cacheConfig = $this->config['cache'][$cacheName];
        if (false === array_key_exists('connection', $cacheConfig)) {
            throw new NoCacheConnectionException($this, $cacheName);
        }
        $connectionName = $cacheConfig['connection'];
        if (false === array_key_exists('driver', $cacheConfig)) {
            throw new NoCacheTypeException($this, $cacheName);
        }
        $driver = $cacheConfig['driver'];
        if (false === array_key_exists($driver, $this->factories)) {
            throw new UnknownCacheDriverException($this, $driver);
        }

        return $this->factories[$driver]->createCache(
            $cacheConfig,
            $this->connectionStorage->getConnection($connectionName)
        );
    }

    /**
     * @inheritDoc
     */
    public function getCache(string $cacheName)
    {
        if (false === array_key_exists($cacheName, $this->caches)) {
            $this->caches[$cacheName] = $this->createDatabase($cacheName);
        }

        return $this->caches[$cacheName];
    }
}