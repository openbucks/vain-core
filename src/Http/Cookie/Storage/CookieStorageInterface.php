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

namespace Vain\Core\Http\Cookie\Storage;

use Vain\Core\Http\Cookie\VainCookieInterface;

/**
 * Interface CookieStorageInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface CookieStorageInterface
{
    /**
     * @param VainCookieInterface $cookie
     *
     * @return CookieStorageInterface
     */
    public function addCookie(VainCookieInterface $cookie) : CookieStorageInterface;

    /**
     * @param string             $name
     * @param string             $value
     * @param \DateTimeInterface $expiresAt
     * @param string             $path
     * @param string             $domain
     * @param bool               $secure
     * @param bool               $httpOnly
     *
     * @return CookieStorageInterface
     */
    public function createCookie(
        string $name,
        string $value,
        \DateTimeInterface $expiresAt = null,
        string $path = '/',
        string $domain = null,
        bool $secure = false,
        bool $httpOnly = false
    ) : CookieStorageInterface;

    /**
     * @param string $name
     *
     * @return CookieStorageInterface
     */
    public function removeCookie(string $name) : CookieStorageInterface;

    /**
     * @param string $name
     *
     * @return VainCookieInterface
     */
    public function getCookie(string $name) : VainCookieInterface;

    /**
     * @param string $name
     *
     * @return bool
     */
    public function hasCookie(string $name) : bool;

    /**
     * @return CookieStorageInterface
     */
    public function resetCookies() : CookieStorageInterface;

    /**
     * @return VainCookieInterface[]
     */
    public function getCookies() : array;
}