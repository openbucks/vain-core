<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-event
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-event
 */

namespace Vain\Core\Queue\Event\Factory;

use Vain\Core\Queue\QueueInterface;
use Vain\Core\Queue\Storage\QueueStorageInterface;

/**
 * Class EventQueueFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class EventQueueFactory
{
    private $queueStorage;

    /**
     * EventQueueFactory constructor.
     *
     * @param QueueStorageInterface $queueStorage
     */
    public function __construct(QueueStorageInterface $queueStorage)
    {
        $this->queueStorage = $queueStorage;
    }

    /**
     * @param \ArrayAccess $config
     *
     * @return QueueInterface
     */
    public function getEventQueue(\ArrayAccess $config) : QueueInterface
    {
        return $this->queueStorage->getQueue($config['event']['queue']);
    }
}
