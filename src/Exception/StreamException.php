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
use Vain\Core\Exception\AbstractCoreException;

/**
 * Class StreamException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class StreamException extends AbstractCoreException
{
    private $stream;

    /**
     * StreamException constructor.
     *
     * @param StreamInterface $stream
     * @param string          $message
     * @param int             $code
     * @param \Exception|null $previous
     */
    public function __construct(StreamInterface $stream, string $message, int $code = 500, \Exception $previous = null)
    {
        $this->stream = $stream;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return StreamInterface
     */
    public function getStream() : StreamInterface
    {
        return $this->stream;
    }
}