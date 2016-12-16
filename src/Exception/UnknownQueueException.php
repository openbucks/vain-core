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

use Vain\Core\Queue\Storage\QueueStorageInterface;

/**
 * Class UnknownQueueException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnknownQueueException extends QueueStorageException
{
    /**
     * UnknownDatabaseException constructor.
     *
     * @param QueueStorageInterface $queueStorage
     * @param string                $queueName
     */
    public function __construct(QueueStorageInterface $queueStorage, string $queueName)
    {
        parent::__construct($queueStorage, sprintf('No config for queue %s', $queueName));
    }
}
