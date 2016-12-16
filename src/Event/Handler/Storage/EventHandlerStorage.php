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

namespace Vain\Core\Event\Handler\Storage;

use Vain\Core\Event\Config\EventConfigInterface;
use Vain\Core\Event\Handler\Factory\EventHandlerFactoryInterface;
use Vain\Core\Event\Handler\EventHandlerInterface;

/**
 * Class EventHandlerStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class EventHandlerStorage implements EventHandlerStorageInterface
{
    private $handlers = [];

    private $handlerFactory;

    /**
     * HandlerStorage constructor.
     *
     * @param EventHandlerFactoryInterface $handlerFactory
     */
    public function __construct(EventHandlerFactoryInterface $handlerFactory)
    {
        $this->handlerFactory = $handlerFactory;
    }

    /**
     * @inheritDoc
     */
    public function getHandler(EventConfigInterface $eventConfig) : EventHandlerInterface
    {
        $alias = $eventConfig->getAlias();
        if (false === array_key_exists($alias, $this->handlers)) {
            $this->handlers[$alias] = $this->handlerFactory->create($alias);
        }

        return $this->handlers[$alias];
    }
}
