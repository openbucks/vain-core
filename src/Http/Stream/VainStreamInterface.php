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

namespace Vain\Core\Http\Stream;

use Psr\Http\Message\StreamInterface as HttpStreamInterface;

/**
 * Interface VainStreamInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface VainStreamInterface extends HttpStreamInterface
{
    /**
     * @return resource
     */
    public function getResource() : resource;
}