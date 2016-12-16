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

namespace Vain\Core\Exception;

use Vain\Core\Event\Handler\Factory\EventHandlerFactoryInterface;

/**
 * Class UnknownHandlerException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnknownHandlerException extends HandlerFactoryException
{
    /**
     * UnknownListenerException constructor.
     *
     * @param EventHandlerFactoryInterface $handlerFactory
     * @param string                       $name
     */
    public function __construct(EventHandlerFactoryInterface $handlerFactory, $name)
    {
        parent::__construct($handlerFactory, sprintf('No handler is registered by name %s', $name));
    }
}
