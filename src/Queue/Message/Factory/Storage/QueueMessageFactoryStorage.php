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

namespace Vain\Core\Queue\Message\Factory\Storage;

use Vain\Core\Exception\DuplicateQueueMessageFactoryException;
use Vain\Core\Exception\UnknownQueueMessageFactoryException;
use Vain\Core\Queue\Message\Factory\QueueMessageFactoryInterface;

/**
 * Class QueueMessageFactoryStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class QueueMessageFactoryStorage implements QueueMessageFactoryStorageInterface
{
    private $factories = [];

    /**
     * QueueMessageFactoryStorage constructor.
     *
     * @param array $factories
     */
    public function __construct(array $factories = [])
    {
        foreach ($factories as $factory) {
            $this->addFactory($factory);
        }
    }

    /**
     * @inheritDoc
     */
    public function addFactory(QueueMessageFactoryInterface $messageFactory) : QueueMessageFactoryStorageInterface
    {
        $name = $messageFactory->getName();
        if (array_key_exists($name, $this->factories)) {
            throw new DuplicateQueueMessageFactoryException($this, $name, $messageFactory, $this->factories[$name]);
        }

        $this->factories[$name] = $messageFactory;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getFactory(string $name) : QueueMessageFactoryInterface
    {
        if (false === array_key_exists($name, $this->factories)) {
            throw new UnknownQueueMessageFactoryException($this, $name);
        }

        return $this->factories[$name];
    }
}
