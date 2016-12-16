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
 * Class NoQueuesSectionException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class NoQueuesSectionException extends QueueStorageException
{
    /**
     * NoQueuesSectionException constructor.
     *
     * @param QueueStorageInterface $queueStorage
     */
    public function __construct(QueueStorageInterface $queueStorage)
    {
        parent::__construct($queueStorage, 'Config does not contain queues section');
    }
}
