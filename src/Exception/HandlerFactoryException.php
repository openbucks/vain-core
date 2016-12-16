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
use Vain\Core\Event\Handler\Factory\EventHandlerFactoryInterface;

/**
 * Class ListenerFactoryException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class HandlerFactoryException extends AbstractCoreException
{
    private $handlerFactory;

    /**
     * ListenerFactoryException constructor.
     *
     * @param EventHandlerFactoryInterface $handlerFactory
     * @param string                       $message
     * @param int                          $code
     * @param \Exception|null              $previous
     */
    public function __construct(
        EventHandlerFactoryInterface $handlerFactory,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->handlerFactory = $handlerFactory;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return EventHandlerFactoryInterface
     */
    public function getHandlerFactory(): EventHandlerFactoryInterface
    {
        return $this->handlerFactory;
    }
}
