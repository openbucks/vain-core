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
 * Class NoQueueTypeException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class NoQueueTypeException extends QueueStorageException
{
    /**
     * UnknownConnectionTypeException constructor.
     *
     * @param QueueStorageInterface $queueStorage
     * @param string                $queueName
     */
    public function __construct(QueueStorageInterface $queueStorage, string $queueName)
    {
        parent::__construct($queueStorage, sprintf('Queue %s does not container driver information', $queueName));
    }
}
