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

use Psr\Http\Message\MessageInterface;
use Vain\Core\Exception\AbstractCoreException;
use Vain\Core\Http\Message\VainMessageInterface;

/**
 * Class MessageException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class MessageException extends AbstractCoreException
{
    private $httpMessage;

    /**
     * MessageException constructor.
     *
     * @param VainMessageInterface $httpMessage
     * @param string               $message
     * @param int                  $code
     * @param \Exception           $previous
     */
    public function __construct(
        VainMessageInterface $httpMessage,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->httpMessage = $httpMessage;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return MessageInterface
     */
    public function getHttpMessage() : MessageInterface
    {
        return $this->httpMessage;
    }
}