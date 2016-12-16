<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-queue
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-queue
 */
declare(strict_types = 1);

namespace Vain\Core\Exception;

use Vain\Core\Queue\Message\QueueMessageInterface;
use Vain\Core\Queue\QueueInterface;

/**
 * Class UnknownQueueMessageException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnknownQueueMessageException extends QueueException
{
    /**
     * UnknownQueueMessageException constructor.
     *
     * @param QueueInterface        $queue
     * @param QueueMessageInterface $queueMessage
     */
    public function __construct(QueueInterface $queue, QueueMessageInterface $queueMessage)
    {
        parent::__construct($queue, sprintf('Message %s is not registered with the queue', $queueMessage->getId()));
    }
}
