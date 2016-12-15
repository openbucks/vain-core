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

use Vain\Core\Event\Handler\EventHandlerInterface;

/**
 * Class MissingMethodHandlerException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class MissingMethodHandlerException extends EventHandlerException
{
    /**
     * MissingMethodException constructor.
     *
     * @param EventHandlerInterface $eventHandler
     * @param string                $method
     */
    public function __construct(EventHandlerInterface $eventHandler, string $method)
    {
        parent::__construct(
            $eventHandler,
            sprintf('Event handler %s does not have method %s', get_class($eventHandler), $method)
        );
    }
}
