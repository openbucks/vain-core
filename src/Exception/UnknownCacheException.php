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

namespace Vain\Core\Exception;

use Vain\Core\Cache\Storage\CacheStorageInterface;

/**
 * Class UnknownCacheException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnknownCacheException extends CacheStorageException
{
    /**
     * UnknownCacheException constructor.
     *
     * @param CacheStorageInterface $cacheStorage
     * @param string                $cacheName
     */
    public function __construct(CacheStorageInterface $cacheStorage, string $cacheName)
    {
        parent::__construct($cacheStorage, sprintf('No config for cache %s', $cacheName));
    }
}