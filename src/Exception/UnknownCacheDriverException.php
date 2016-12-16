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
 * Class UnknownCacheDriverException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnknownCacheDriverException extends CacheStorageException
{
    /**
     * UnknownCacheDriverException constructor.
     *
     * @param CacheStorageInterface $cacheStorage
     * @param string                $cacheDriver
     */
    public function __construct(CacheStorageInterface $cacheStorage, string $cacheDriver)
    {
        parent::__construct($cacheStorage, sprintf('Unknown cache driver %s', $cacheDriver));
    }
}