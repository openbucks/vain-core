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

namespace Vain\Core\Http\Cookie;

/**
 * Interface VainCookieInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface VainCookieInterface
{
    /**
     * @param string $name
     *
     * @return VainCookieInterface
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $value
     *
     * @return VainCookieInterface
     */
    public function setValue($value);

    /**
     * @return string
     */
    public function getValue();

    /**
     * @param \DateTimeInterface $expiryDate
     *
     * @return VainCookieInterface
     */
    public function setExpiryDate(\DateTimeInterface $expiryDate);

    /**
     * @return \DateTimeInterface
     */
    public function getExpiryDate();

    /**
     * @param string $path
     *
     * @return VainCookieInterface
     */
    public function setPath($path);

    /**
     * @return string
     */
    public function getPath();

    /**
     * @param string $domain
     *
     * @return VainCookieInterface
     */
    public function setDomain($domain);

    /**
     * @return string
     */
    public function getDomain();

    /**
     * @param bool $secure
     *
     * @return VainCookieInterface
     */
    public function setSecure($secure);

    /**
     * @return bool
     */
    public function isSecure();

    /**
     * @param bool $httpOnly
     *
     * @return VainCookieInterface
     */
    public function setHttpOnly($httpOnly);

    /**
     * @return bool
     */
    public function isHttpOnly();

    /**
     * @return VainCookieInterface
     */
    public function send();
}