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

namespace Vain\Core\Http\Stream\Factory;

use Psr\Http\Message\StreamInterface;

/**
 * Interface StreamFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface StreamFactoryInterface
{
    /**
     * @param string $source
     * @param string $mode
     *
     * @return StreamInterface
     */
    public function createStream(string $source, string $mode) : StreamInterface;
}