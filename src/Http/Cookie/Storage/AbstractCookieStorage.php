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

use Vain\Core\Http\Cookie\Factory\CookieFactoryInterface;
use Vain\Core\Http\Cookie\VainCookieInterface;

/**
 * Class AbstractCookieStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class AbstractCookieStorage implements CookieStorageInterface
{
    private $factory;

    private $cookies;

    /**
     * AbstractCookieStorage constructor.
     *
     * @param CookieFactoryInterface $cookieFactory
     * @param array                  $cookies
     */
    public function __construct(CookieFactoryInterface $cookieFactory, array $cookies = [])
    {
        $this->factory = $cookieFactory;
        $this->cookies = $cookies;
    }

    /**
     * @inheritDoc
     */
    public function addCookie(VainCookieInterface $cookie) : CookieStorageInterface
    {
        $this->cookies[$cookie->getName()] = $cookie;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function createCookie(
        string $name,
        string $value,
        \DateTimeInterface $expiresAt = null,
        string $path = '/',
        string $domain = null,
        bool $secure = false,
        bool $httpOnly = false
    ) : CookieStorageInterface
    {
        return $this->addCookie(
            $this->factory->createCookie($name, $value, $expiresAt, $path, $domain, $secure, $httpOnly)
        );
    }

    /**
     * @inheritDoc
     */
    public function removeCookie(string $name) : CookieStorageInterface
    {
        if (false === $this->hasCookie($name)) {
            return $this;
        }
        unset($this->cookies[$name]);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getCookie(string $name) : VainCookieInterface
    {
        if (false === $this->hasCookie($name)) {
            return null;
        }

        return $this->cookies[$name];
    }

    /**
     * @inheritDoc
     */
    public function hasCookie(string $name) : bool
    {
        return array_key_exists($name, $this->cookies);
    }

    /**
     * @inheritDoc
     */
    public function resetCookies() : CookieStorageInterface
    {
        $this->cookies = [];

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getCookies() : array
    {
        return $this->cookies;
    }
}