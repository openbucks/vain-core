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

use Vain\Core\Cache\Factory\CacheFactoryInterface;

/**
 * Interface CacheStorageInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface CacheStorageInterface
{
    /**
     * @param CacheFactoryInterface $databaseFactory
     *
     * @return CacheStorageInterface
     */
    public function addFactory(CacheFactoryInterface $databaseFactory) : CacheStorageInterface;

    /**
     * @param string $connectionName
     *
     * @return mixed
     */
    public function getCache(string $connectionName);
}