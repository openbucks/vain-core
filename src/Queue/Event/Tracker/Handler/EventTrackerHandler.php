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

namespace Vain\Core\Queue\Event\Tracker\Handler;

use Vain\Core\Event\Handler\AbstractEventHandler;
use Vain\Core\Event\Resolver\EventResolverInterface;
use Vain\Core\Http\Event\Handler\RequestEventHandlerInterface;
use Vain\Core\Http\Event\RequestEventInterface;
use Vain\Core\Queue\Event\Tracker\EventTrackerInterface;

/**
 * Class EventTrackerHandler
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class EventTrackerHandler extends AbstractEventHandler implements RequestEventHandlerInterface
{
    private $eventTracker;

    /**
     * EventTrackerHandler constructor.
     *
     * @param EventResolverInterface     $resolver
     * @param EventTrackerInterface $eventTracker
     */
    public function __construct(EventResolverInterface $resolver, EventTrackerInterface $eventTracker)
    {
        $this->eventTracker = $eventTracker;
        parent::__construct($resolver);
    }

    /**
     * @inheritDoc
     */
    public function request(RequestEventInterface $event) : RequestEventHandlerInterface
    {
        $this->eventTracker->resetEvents();

        return $this;
    }
}
