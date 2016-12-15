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

use Vain\Core\Exception\AbstractCoreException;
use Vain\Core\Event\EventInterface;

/**
 * Class EventException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class EventException extends AbstractCoreException
{
    private $event;

    /**
     * EventException constructor.
     *
     * @param EventInterface $event
     * @param string         $message
     * @param int            $code
     * @param \Exception     $previous
     */
    public function __construct(EventInterface $event, string $message, int $code = 500, \Exception $previous = null)
    {
        $this->event = $event;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return EventInterface
     */
    public function getEvent() : EventInterface
    {
        return $this->event;
    }
}
