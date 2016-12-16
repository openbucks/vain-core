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

namespace Vain\Core\Exception;

use Vain\Core\Cache\CacheInterface;
use Vain\Core\Exception\AbstractCoreException;

/**
 * Class CacheException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class CacheException extends AbstractCoreException
{
    private $cache;

    /**
     * CacheException constructor.
     *
     * @param CacheInterface $cache
     * @param string         $message
     * @param int            $code
     * @param \Exception     $previous
     */
    public function __construct(CacheInterface $cache, string $message, int $code = 500, \Exception $previous = null)
    {
        $this->cache = $cache;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return CacheInterface
     */
    public function getCache() : CacheInterface
    {
        return $this->cache;
    }
}