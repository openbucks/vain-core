<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-http
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-http
 */
declare(strict_types = 1);

namespace Vain\Core\Exception;

use Vain\Core\Exception\AbstractCoreException;
use Vain\Core\Http\Cookie\Storage\CookieStorageInterface;

/**
 * Class CookieStorageException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class CookieStorageException extends AbstractCoreException
{
    private $cookieStorage;

    /**
     * CookieStorageException constructor.
     *
     * @param CookieStorageInterface $cookieStorage
     * @param string                 $message
     * @param int                    $code
     * @param \Exception             $previous
     */
    public function __construct(
        CookieStorageInterface $cookieStorage,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->cookieStorage = $cookieStorage;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return CookieStorageInterface
     */
    public function getCookieStorage() : CookieStorageInterface
    {
        return $this->cookieStorage;
    }
}