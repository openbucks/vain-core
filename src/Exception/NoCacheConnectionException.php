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
 * Class NoCacheConnectionException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class NoCacheConnectionException extends CacheStorageException
{
    /**
     * NoConnectionException constructor.
     *
     * @param CacheStorageInterface $cacheStorage
     * @param string                $cacheName
     */
    public function __construct(CacheStorageInterface $cacheStorage, $cacheName)
    {
        parent::__construct($cacheStorage, sprintf('Config for cache %s does not contain connection info', $cacheName));
    }
}