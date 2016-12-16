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

use Psr\Http\Message\StreamInterface;

/**
 * Class ResourceUnavailableException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ResourceUnavailableException extends StreamException
{
    /**
     * ResourceUnavailableException constructor.
     *
     * @param StreamInterface $stream
     */
    public function __construct(StreamInterface $stream)
    {
        parent::__construct($stream, 'Stream resource unavailable');
    }
}