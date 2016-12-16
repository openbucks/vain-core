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

namespace Vain\Core\Event\Dispatcher;

use Vain\Core\Event\Dispatcher\EventDispatcherInterface;
use Vain\Core\Event\Config\Factory\EventConfigFactoryInterface;
use Vain\Core\Event\EventInterface;
use Vain\Core\Event\Handler\Storage\EventHandlerStorageInterface;
use Vain\Core\Event\Resolver\EventResolverInterface;

/**
 * Class EventDispatcher
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class EventDispatcher implements EventDispatcherInterface
{
    private $config;

    private $configFactory;

    private $resolver;

    private $handlerStorage;

    /**
     * EventDispatcher constructor.
     *
     * @param \ArrayAccess                 $config
     * @param EventConfigFactoryInterface  $configFactory
     * @param EventResolverInterface            $resolver
     * @param EventHandlerStorageInterface $handlerStorage
     */
    public function __construct(
        \ArrayAccess $config,
        EventConfigFactoryInterface $configFactory,
        EventResolverInterface $resolver,
        EventHandlerStorageInterface $handlerStorage
    ) {
        $this->config = $config;
        $this->configFactory = $configFactory;
        $this->resolver = $resolver;
        $this->handlerStorage = $handlerStorage;
    }

    /**
     * @inheritDoc
     */
    public function dispatch(EventInterface $event) : EventDispatcherInterface
    {
        $eventGroup = $this->resolver->resolveGroup($event);
        $eventName = $this->resolver->resolveMethod($event);
        if (false === $this->config->offsetExists($eventGroup)) {
            return $this;
        }
        if (false === array_key_exists($eventName, $this->config->offsetGet($eventGroup))) {
            return $this;
        }

        foreach ($this->config->offsetGet($eventGroup)[$eventName] as $listenerConfig) {
            $eventConfig = $this->configFactory->createConfig($eventName, $listenerConfig);
            $this->handlerStorage->getHandler($eventConfig)->handle($event, $eventConfig);
        }

        return $this;
    }
}
