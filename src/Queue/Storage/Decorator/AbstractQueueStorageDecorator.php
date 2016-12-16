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

namespace Vain\Core\Queue\Storage\Decorator;

use Vain\Core\Queue\Factory\QueueFactoryInterface;
use Vain\Core\Queue\QueueInterface;
use Vain\Core\Queue\Storage\QueueStorageInterface;

/**
 * Class AbstractQueueStorageDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractQueueStorageDecorator implements QueueStorageInterface
{
    private $queueStorage;

    /**
     * AbstractQueueStorageDecorator constructor.
     *
     * @param QueueStorageInterface $queueStorage
     */
    public function __construct(QueueStorageInterface $queueStorage)
    {
        $this->queueStorage = $queueStorage;
    }

    /**
     * @inheritDoc
     */
    public function addFactory(QueueFactoryInterface $queueFactory) : QueueStorageInterface
    {
        $this->queueStorage->addFactory($queueFactory);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getQueue(string $queueName) : QueueInterface
    {
        return $this->queueStorage->getQueue($queueName);
    }
}
