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
use Vain\Core\Exception\AbstractCoreException;

/**
 * Class EventHandlerException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class EventHandlerException extends AbstractCoreException
{
    private $eventHandler;

    /**
     * ListenerException constructor.
     *
     * @param EventHandlerInterface $eventHandler
     * @param string                $message
     * @param int                   $code
     * @param \Exception|null       $previous
     */
    public function __construct(
        EventHandlerInterface $eventHandler,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->eventHandler = $eventHandler;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return EventHandlerInterface
     */
    public function getEventHandler() : EventHandlerInterface
    {
        return $this->eventHandler;
    }
}
