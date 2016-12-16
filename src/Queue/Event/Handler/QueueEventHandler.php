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

namespace Vain\Core\Queue\Event\Handler;

use Vain\Core\Application\Context\ApplicationContextInterface;
use Vain\Core\Event\Config\EventConfigInterface;
use Vain\Core\Event\EventInterface;
use Vain\Core\Event\Handler\EventHandlerInterface;
use Vain\Core\Queue\Event\Tracker\EventTrackerInterface;
use Vain\Core\Queue\Message\Factory\QueueMessageFactoryInterface;
use Vain\Core\Queue\QueueInterface;

/**
 * Class QueueEventHandler
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class QueueEventHandler implements EventHandlerInterface
{
    private $queue;

    private $messageFactory;

    private $eventTracker;

    private $context;

    /**
     * FinalQueueHandler constructor.
     *
     * @param QueueInterface               $queue
     * @param QueueMessageFactoryInterface $messageFactory
     * @param EventTrackerInterface        $eventTracker
     * @param ApplicationContextInterface  $context
     */
    public function __construct(
        QueueInterface $queue,
        QueueMessageFactoryInterface $messageFactory,
        EventTrackerInterface $eventTracker,
        ApplicationContextInterface $context
    ) {
        $this->queue = $queue;
        $this->messageFactory = $messageFactory;
        $this->eventTracker = $eventTracker;
        $this->context = $context;
    }

    /**
     * @inheritDoc
     */
    public function handle(EventInterface $event, EventConfigInterface $eventConfig) : EventHandlerInterface
    {
        if (false === $this->eventTracker->trackEvent($event)) {
            return $this;
        }

        $this->queue->enqueue(
            $this->messageFactory->createMessage($this->context->getName(), $this->context->getVersion(), $event)
        );

        return $this;
    }
}
