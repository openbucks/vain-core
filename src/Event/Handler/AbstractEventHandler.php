<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-core
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-core
 */
declare(strict_types = 1);

namespace Vain\Core\Event\Handler;

use Vain\Core\Event\Config\EventConfigInterface;
use Vain\Core\Event\EventInterface;
use Vain\Core\Event\Resolver\EventResolverInterface;
use Vain\Core\Exception\MissingMethodHandlerException;

/**
 * Class AbstractEventHandler
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractEventHandler implements EventHandlerInterface
{
    private $eventResolver;

    /**
     * AbstractEventHandler constructor.
     *
     * @param EventResolverInterface $resolver
     */
    public function __construct(EventResolverInterface $resolver)
    {
        $this->eventResolver = $resolver;
    }

    /**
     * @inheritDoc
     */
    public function handle(EventInterface $event, EventConfigInterface $eventConfig) : EventHandlerInterface
    {
        $method = $this->eventResolver->resolveMethod($event);

        if (false === method_exists($this, $method)) {
            throw new MissingMethodHandlerException($this, $method);
        }

        return call_user_func([$this, $method], $event);
    }
}