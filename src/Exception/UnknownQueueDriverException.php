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
 * Class UnknownQueueDriverException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnknownQueueDriverException extends QueueStorageException
{
    /**
     * UnknownDatabaseDriverException constructor.
     *
     * @param QueueStorageInterface $queueStorage
     * @param string                $queueDriver
     */
    public function __construct(QueueStorageInterface $queueStorage, string $queueDriver)
    {
        parent::__construct($queueStorage, sprintf('Unknown queue driver %s', $queueDriver));
    }
}
