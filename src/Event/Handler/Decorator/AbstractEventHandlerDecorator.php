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

namespace Vain\Core\Event\Handler\Decorator;

use Vain\Core\Event\Config\EventConfigInterface;
use Vain\Core\Event\EventInterface;
use Vain\Core\Event\Handler\EventHandlerInterface;

/**
 * Class AbstractHandlerDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractEventHandlerDecorator implements EventHandlerInterface
{
    private $eventHandler;

    /**
     * AbstractHandlerDecorator constructor.
     *
     * @param EventHandlerInterface $eventHandler
     */
    public function __construct(EventHandlerInterface $eventHandler)
    {
        $this->eventHandler = $eventHandler;
    }

    /**
     * @inheritDoc
     */
    public function handle(EventInterface $event, EventConfigInterface $eventConfig) : EventHandlerInterface
    {
        $this->eventHandler->handle($event, $eventConfig);

        return $this;
    }
}
