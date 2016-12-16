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

namespace Vain\Core\Http\Cookie\Factory;

use Vain\Core\Http\Cookie\VainCookieInterface;

/**
 * Interface CookieFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface CookieFactoryInterface
{
    /**
     * @param string                  $name
     * @param string                  $value
     * @param \DateTimeInterface|null $expiryDate
     * @param string                  $path
     * @param string                  $domain
     * @param bool                    $secure
     * @param bool                    $httpOnly
     *
     * @return VainCookieInterface
     */
    public function createCookie(
        string $name,
        string $value,
        \DateTimeInterface $expiryDate = null,
        string $path = '/',
        string $domain = null,
        bool $secure = false,
        bool $httpOnly = false
    ) : VainCookieInterface;
}