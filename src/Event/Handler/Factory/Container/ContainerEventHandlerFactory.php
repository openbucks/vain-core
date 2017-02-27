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

namespace Vain\Core\Event\Handler\Factory\Container;

use Psr\Container\ContainerInterface;
use Vain\Core\Event\Handler\Factory\EventHandlerFactoryInterface;
use Vain\Core\Event\Handler\EventHandlerInterface;

/**
 * Class ContainerEventHandlerFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ContainerEventHandlerFactory implements EventHandlerFactoryInterface
{
    private $container;

    /**
     * ContainerEventHandlerFactory constructor.
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @inheritDoc
     */
    public function create(string $name) : EventHandlerInterface
    {
        return $this->container->get($name);
    }
}
