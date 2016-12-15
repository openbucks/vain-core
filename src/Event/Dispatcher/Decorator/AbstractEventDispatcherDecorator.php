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

namespace Vain\Core\Event\Dispatcher\Decorator;

use Vain\Core\Event\Dispatcher\EventDispatcherInterface;
use Vain\Core\Event\EventInterface;

/**
 * Class AbstractEventDispatcherDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractEventDispatcherDecorator implements EventDispatcherInterface
{
    private $eventDispatcher;

    /**
     * AbstractEventDispatcherDecorator constructor.
     *
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @inheritDoc
     */
    public function dispatch(EventInterface $event) : EventDispatcherInterface
    {
        $this->eventDispatcher->dispatch($event);

        return $this;
    }
}
