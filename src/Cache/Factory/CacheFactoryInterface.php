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

namespace Vain\Core\Cache\Factory;

use Vain\Core\Cache\CacheInterface;
use Vain\Core\Connection\ConnectionInterface;

/**
 * Interface CacheFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface CacheFactoryInterface
{
    /**
     * @return string
     */
    public function getName() : string;

    /**
     * @param array               $configData
     * @param ConnectionInterface $connection
     *
     * @return CacheInterface
     */
    public function createCache(array $configData, ConnectionInterface $connection) : CacheInterface;
}