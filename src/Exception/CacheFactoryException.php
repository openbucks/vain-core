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

use Vain\Core\Cache\Factory\CacheFactoryInterface;
use Vain\Core\Exception\AbstractCoreException;

/**
 * Class CacheFactoryException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class CacheFactoryException extends AbstractCoreException
{
    private $cacheFactory;

    /**
     * CacheFactoryException constructor.
     *
     * @param CacheFactoryInterface $cacheFactory
     * @param string                $message
     * @param int                   $code
     * @param \Exception|null       $previous
     */
    public function __construct(CacheFactoryInterface $cacheFactory, string $message, int $code = 500, \Exception $previous = null)
    {
        $this->cacheFactory = $cacheFactory;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return CacheFactoryInterface
     */
    public function getCacheFactory(): CacheFactoryInterface
    {
        return $this->cacheFactory;
    }
}