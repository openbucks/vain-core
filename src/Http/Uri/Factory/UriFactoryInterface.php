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

namespace Vain\Core\Http\Uri\Factory;

use Vain\Core\Http\Uri\VainUriInterface;

/**
 * Interface UriFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface UriFactoryInterface
{
    /**
     * @param string $uri
     *
     * @return VainUriInterface
     */
    public function createUri(string $uri) : VainUriInterface;
}