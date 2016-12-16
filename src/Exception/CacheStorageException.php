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
use Vain\Core\Exception\AbstractCoreException;

/**
 * Class CacheStorageException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class CacheStorageException extends AbstractCoreException
{
    private $cacheStorage;

    /**
     * CacheStorageException constructor.
     *
     * @param CacheStorageInterface $cacheStorage
     * @param string                $message
     * @param int                   $code
     * @param \Exception|null       $previous
     */
    public function __construct(CacheStorageInterface $cacheStorage, string $message, int $code = 500, \Exception $previous = null)
    {
        $this->cacheStorage = $cacheStorage;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return CacheStorageInterface
     */
    public function getCacheStorage(): CacheStorageInterface
    {
        return $this->cacheStorage;
    }
}