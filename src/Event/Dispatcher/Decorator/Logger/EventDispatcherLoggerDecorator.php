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

namespace Vain\Core\Event\Dispatcher\Decorator\Logger;

use Psr\Log\LoggerInterface;
use Vain\Core\Event\Dispatcher\Decorator\AbstractEventDispatcherDecorator;
use Vain\Core\Event\Dispatcher\EventDispatcherInterface;
use Vain\Core\Event\EventInterface;

/**
 * Class EventDispatcherLoggerDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class EventDispatcherLoggerDecorator extends AbstractEventDispatcherDecorator
{

    private $logger;

    /**
     * EventDispatcherLoggerDecorator constructor.
     *
     * @param EventDispatcherInterface $eventDispatcher
     * @param LoggerInterface          $logger
     */
    public function __construct(
        EventDispatcherInterface $eventDispatcher,
        LoggerInterface $logger
    ) {
        $this->logger = $logger;
        parent::__construct($eventDispatcher);
    }

    /**
     * @inheritDoc
     */
    public function dispatch(EventInterface $event) : EventDispatcherInterface
    {
        $this->logger->debug(sprintf('Preparing to dispatch event %s', $event->getName()));
        parent::dispatch($event);
        $this->logger->debug(sprintf('Successfully dispatched event %s', $event->getName()));

        return $this;
    }
}
