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

use Vain\Core\Event\Handler\Factory\EventHandlerFactoryInterface;
use Vain\Core\Event\Handler\EventHandlerInterface;

/**
 * Class AbstractEventHandlerFactoryDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractEventHandlerFactoryDecorator implements EventHandlerFactoryInterface
{
    private $handlerFactory;

    /**
     * AbstractHandlerFactoryDecorator constructor.
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
    public function create(string $name) : EventHandlerInterface
    {
        return $this->handlerFactory->create($name);
    }
}
