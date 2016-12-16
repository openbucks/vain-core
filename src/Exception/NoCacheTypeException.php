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
 * Class NoCacheTypeException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class NoCacheTypeException extends CacheStorageException
{
    /**
     * UnknownConnectionTypeException constructor.
     *
     * @param CacheStorageInterface $cacheStorage
     * @param string                $cacheName
     */
    public function __construct(CacheStorageInterface $cacheStorage, string $cacheName)
    {
        parent::__construct($cacheStorage, sprintf('Cache %s does not container driver information', $cacheName));
    }
}