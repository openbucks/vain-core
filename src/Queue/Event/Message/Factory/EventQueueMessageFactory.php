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

namespace Vain\Core\Queue\Event\Message\Factory;

use Vain\Core\ArrayX\ArrayInterface;
use Vain\Core\Id\Generator\IdGeneratorInterface;
use Vain\Core\Queue\Event\Message\EventQueueMessage;
use Vain\Core\Queue\Message\Factory\AbstractQueueMessageFactory;
use Vain\Core\Queue\Message\QueueMessageInterface;

/**
 * Class EventQueueMessageFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class EventQueueMessageFactory extends AbstractQueueMessageFactory
{
    private $idGenerator;

    /**
     * EventQueueMessageFactory constructor.
     *
     * @param string               $name
     * @param IdGeneratorInterface $idGenerator
     */
    public function __construct(string $name, IdGeneratorInterface $idGenerator)
    {
        $this->idGenerator = $idGenerator;
        parent::__construct($name);
    }

    /**
     * @inheritDoc
     */
    public function createMessage(string $source, string $destination, ArrayInterface $content) : QueueMessageInterface
    {
        return new EventQueueMessage($this->getName(), $this->idGenerator->generate(), $source, $destination, $content);
    }

    /**
     * @inheritDoc
     */
    public function createFromArray(array $serializedMessage) : QueueMessageInterface
    {
        return new EventQueueMessage(
            $this->getName(),
            $serializedMessage['id'],
            $serializedMessage['source'],
            $serializedMessage['destination'],
            $serializedMessage['content']
        );
    }
}
