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
declare(strict_types = 1);

namespace Vain\Core\Event\Operation;

use Vain\Core\Event\Dispatcher\EventDispatcherInterface;
use Vain\Core\Event\EventInterface;
use Vain\Core\Operation\AbstractOperation;
use Vain\Core\Result\ResultInterface;
use Vain\Core\Result\SuccessfulResult;

/**
 * Class EventOperation
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class EventOperation extends AbstractOperation
{
    private $eventDispatcher;

    private $event;

    /**
     * EventOperation constructor.
     *
     * @param EventDispatcherInterface $eventDispatcher
     * @param EventInterface           $event
     */
    public function __construct(EventDispatcherInterface $eventDispatcher, EventInterface $event)
    {
        $this->eventDispatcher = $eventDispatcher;
        $this->event = $event;
    }

    /**
     * @return EventDispatcherInterface
     */
    public function getEventDispatcher(): EventDispatcherInterface
    {
        return $this->eventDispatcher;
    }

    /**
     * @return EventInterface
     */
    public function getEvent(): EventInterface
    {
        return $this->event;
    }

    /**
     * @inheritDoc
     */
    public function execute() : ResultInterface
    {
        $this->eventDispatcher->dispatch($this->event);

        return new SuccessfulResult();
    }
}
