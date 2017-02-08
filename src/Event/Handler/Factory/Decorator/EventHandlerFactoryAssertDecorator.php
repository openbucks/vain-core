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

namespace Vain\Core\Event\Handler\Factory\Decorator;

use Vain\Core\Container\ContainerInterface;
use Vain\Core\Exception\UnknownHandlerException;
use Vain\Core\Event\Handler\EventHandlerInterface;
use Vain\Core\Event\Handler\Factory\EventHandlerFactoryInterface;

/**
 * Class EventHandlerFactoryAssertDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class EventHandlerFactoryAssertDecorator extends AbstractEventHandlerFactoryDecorator
{
    private $container;

    /**
     * EventHandlerFactoryAssertDecorator constructor.
     *
     * @param EventHandlerFactoryInterface $handlerFactory
     * @param ContainerInterface      $container
     */
    public function __construct(EventHandlerFactoryInterface $handlerFactory, ContainerInterface $container)
    {
        $this->container = $container;
        parent::__construct($handlerFactory);
    }

    /**
     * @inheritDoc
     */
    public function create(string $name) : EventHandlerInterface
    {
        if (false === $this->container->has($name)) {
            throw new UnknownHandlerException($this, $name);
        }

        return parent::create($name);
    }
}
