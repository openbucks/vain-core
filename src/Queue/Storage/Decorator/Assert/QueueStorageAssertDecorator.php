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

namespace Vain\Core\Queue\Storage\Decorator\Assert;

use Vain\Core\Exception\NoConnectionException;
use Vain\Core\Exception\NoQueuesSectionException;
use Vain\Core\Exception\NoQueueTypeException;
use Vain\Core\Exception\UnknownQueueException;
use Vain\Core\Queue\QueueInterface;
use Vain\Core\Queue\Storage\Decorator\AbstractQueueStorageDecorator;
use Vain\Core\Queue\Storage\QueueStorageInterface;

/**
 * Class QueueStorageAssertDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class QueueStorageAssertDecorator extends AbstractQueueStorageDecorator
{
    private $config;

    /**
     * QueueStorageAssertDecorator constructor.
     *
     * @param QueueStorageInterface $queueStorage
     * @param \ArrayAccess          $config
     */
    public function __construct(QueueStorageInterface $queueStorage, \ArrayAccess $config)
    {
        $this->config = $config;
        parent::__construct($queueStorage);
    }

    /**
     * @inheritDoc
     */
    public function getQueue(string $queueName) : QueueInterface
    {
        if (false === $this->config->offsetExists('queues')) {
            throw new NoQueuesSectionException($this);
        }

        if (false === array_key_exists($queueName, $this->config['queues'])) {
            throw new UnknownQueueException($this, $queueName);
        }

        if (false === array_key_exists('connection', $this->config['queues'][$queueName])) {
            throw new NoConnectionException($this, $queueName);
        }

        if (false === array_key_exists('driver', $this->config['queues'][$queueName])) {
            throw new NoQueueTypeException($this, $queueName);
        }

        return parent::getQueue($queueName);
    }
}
