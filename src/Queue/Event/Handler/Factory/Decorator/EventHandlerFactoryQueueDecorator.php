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

namespace Vain\Core\Queue\Event\Handler\Factory\Decorator;

use Vain\Core\Event\Handler\EventHandlerInterface;
use Vain\Core\Event\Handler\Factory\Decorator\AbstractEventHandlerFactoryDecorator;
use Vain\Core\Event\Handler\Factory\EventHandlerFactoryInterface;
use Vain\Core\Queue\Event\Handler\Decorator\Queue\EventHandlerQueueDecorator;

/**
 * Class EventHandlerFactoryQueueDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class EventHandlerFactoryQueueDecorator extends AbstractEventHandlerFactoryDecorator
{
    private $queueHandler;

    /**
     * EventHandlerFactoryQueueDecorator constructor.
     *
     * @param EventHandlerFactoryInterface $handlerFactory
     * @param EventHandlerInterface        $queueHandler
     */
    public function __construct(EventHandlerFactoryInterface $handlerFactory, EventHandlerInterface $queueHandler)
    {
        $this->queueHandler = $queueHandler;
        parent::__construct($handlerFactory);
    }

    /**
     * @inheritDoc
     */
    public function create(string $name) : EventHandlerInterface
    {
        return new EventHandlerQueueDecorator(parent::create($name), $this->queueHandler);
    }
}
