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
use Vain\Core\Http\Cookie\VainCookieInterface;

/**
 * Class CookieException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class CookieException extends AbstractCoreException
{
    private $cookie;

    /**
     * CookieException constructor.
     *
     * @param VainCookieInterface $cookie
     * @param string              $message
     * @param int                 $code
     * @param \Exception          $previous
     */
    public function __construct(VainCookieInterface $cookie, string $message, int $code = 500, \Exception $previous = null)
    {
        $this->cookie = $cookie;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return VainCookieInterface
     */
    public function getCookie() : VainCookieInterface
    {
        return $this->cookie;
    }
}