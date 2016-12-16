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

namespace Vain\Core\Event\Handler\Decorator\Logger;

use Psr\Log\LoggerInterface;
use Vain\Core\Event\Config\EventConfigInterface;
use Vain\Core\Event\EventInterface;
use Vain\Core\Event\Handler\Decorator\AbstractEventHandlerDecorator;
use Vain\Core\Event\Handler\EventHandlerInterface;

/**
 * Class EventHandlerLoggerDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class EventHandlerLoggerDecorator extends AbstractEventHandlerDecorator
{
    private $logger;

    /**
     * EventHandlerLoggerDecorator constructor.
     *
     * @param EventHandlerInterface $eventHandler
     * @param LoggerInterface       $logger
     */
    public function __construct(EventHandlerInterface $eventHandler, LoggerInterface $logger)
    {
        $this->logger = $logger;
        parent::__construct($eventHandler);
    }

    /**
     * @inheritDoc
     */
    public function handle(EventInterface $event, EventConfigInterface $eventConfig) : EventHandlerInterface
    {
        $this->logger->debug(
            sprintf('Preparing to handle event %s with handler %s', $event->getName(), $eventConfig->getAlias())
        );
        parent::handle($event, $eventConfig);
        $this->logger->debug(
            sprintf('Successfully handled event %s with handler %s', $event->getName(), $eventConfig->getAlias())
        );

        return $this;
    }
}
