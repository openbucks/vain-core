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

namespace Vain\Core\Event\Handler\Factory\Decorator\Logger;

use Psr\Log\LoggerInterface;
use Vain\Core\Event\Handler\Decorator\Logger\EventHandlerLoggerDecorator;
use Vain\Core\Event\Handler\EventHandlerInterface;
use Vain\Core\Event\Handler\Factory\Decorator\AbstractEventHandlerFactoryDecorator;
use Vain\Core\Event\Handler\Factory\EventHandlerFactoryInterface;

/**
 * Class EventHandlerFactoryLoggerDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class EventHandlerFactoryLoggerDecorator extends AbstractEventHandlerFactoryDecorator
{
    private $logger;

    /**
     * EventHandlerFactoryLoggerDecorator constructor.
     *
     * @param EventHandlerFactoryInterface $handlerFactory
     * @param LoggerInterface              $logger
     */
    public function __construct(
        EventHandlerFactoryInterface $handlerFactory,
        LoggerInterface $logger
    ) {
        $this->logger = $logger;
        parent::__construct($handlerFactory);
    }

    /**
     * @inheritDoc
     */
    public function create(string $name) : EventHandlerInterface
    {
        $this->logger->debug(sprintf('Created event handler %s', $name));

        return new EventHandlerLoggerDecorator(parent::create($name), $this->logger);
    }
}
