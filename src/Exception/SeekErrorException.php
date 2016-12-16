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
 * Class SeekErrorException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class SeekErrorException extends StreamException
{
    /**
     * TellErrorException constructor.
     *
     * @param StreamInterface $stream
     */
    public function __construct(StreamInterface $stream)
    {
        parent::__construct($stream, 'Unable to seek on the stream');
    }
}