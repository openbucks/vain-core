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

namespace Vain\Core\Queue\Storage;

use Vain\Core\Connection\Storage\ConnectionStorageInterface;
use Vain\Core\Exception\DuplicateQueueFactoryException;
use Vain\Core\Exception\UnknownQueueDriverException;
use Vain\Core\Queue\Factory\QueueFactoryInterface;
use Vain\Core\Queue\QueueInterface;

/**
 * Class QueueStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class QueueStorage implements QueueStorageInterface
{
    private $connectionStorage;

    private $config;

    /**
     * @var QueueFactoryInterface[]
     */
    private $factories = [];

    private $queues = [];

    /**
     * QueueStorage constructor.
     *
     * @param ConnectionStorageInterface $connectionStorage
     * @param \ArrayAccess               $config
     */
    public function __construct(ConnectionStorageInterface $connectionStorage, \ArrayAccess $config)
    {
        $this->connectionStorage = $connectionStorage;
        $this->config = $config;
    }

    /**
     * @inheritDoc
     */
    public function addFactory(QueueFactoryInterface $queueFactory) : QueueStorageInterface
    {
        $name = $queueFactory->getName();
        if (array_key_exists($name, $this->factories)) {
            throw new DuplicateQueueFactoryException($this, $name, $queueFactory, $this->factories[$name]);
        }
        $this->factories[$name] = $queueFactory;

        return $this;
    }

    /**
     * @param string $queueName
     *
     * @return mixed
     *
     * @throws UnknownQueueDriverException
     */
    protected function createQueue(string $queueName)
    {
        $queueConfig = $this->config['queues'][$queueName];
        $connectionName = $queueConfig['connection'];
        $driver = $queueConfig['driver'];

        if (false === array_key_exists($driver, $this->factories)) {
            throw new UnknownQueueDriverException($this, $driver);
        }

        return $this->factories[$driver]->createQueue(
            $queueConfig,
            $this->connectionStorage->getConnection($connectionName)
        );
    }

    /**
     * @inheritDoc
     */
    public function getQueue(string $queueName) : QueueInterface
    {
        if (false === array_key_exists($queueName, $this->queues)) {
            $this->queues[$queueName] = $this->createQueue($queueName);
        }

        return $this->queues[$queueName];
    }
}
