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

namespace Vain\Core\Http\Uri;

use Psr\Http\Message\UriInterface as HttpUriInterface;

/**
 * Interface VainUriInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface VainUriInterface extends HttpUriInterface
{
    const STANDARD_PORTS = ['http' => 80, 'https' => 443];

    /**
     * @return bool
     */
    public function isStandardPort() : bool;

    /**
     * @return string
     */
    public function getUser() : string;

    /**
     * @return string
     */
    public function getPassword() : string;
}