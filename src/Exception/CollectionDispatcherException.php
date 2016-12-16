<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-operation
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-operation
 */
declare(strict_types = 1);

namespace Vain\Core\Exception;

use Vain\Core\Exception\AbstractCoreException;
use Vain\Core\Event\Collection\CollectionEventDispatcherInterface;

/**
 * Class CollectionDispatcherException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class CollectionDispatcherException extends AbstractCoreException
{
    private $eventDispatcher;

    /**
     * CollectionDispatcherException constructor.
     *
     * @param CollectionEventDispatcherInterface $eventDispatcher
     * @param string                             $message
     * @param int                                $code
     * @param \Exception|null                    $previous
     */
    public function __construct(
        CollectionEventDispatcherInterface $eventDispatcher,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->eventDispatcher = $eventDispatcher;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return CollectionEventDispatcherInterface
     */
    public function getEventDispatcher() : CollectionEventDispatcherInterface
    {
        return $this->eventDispatcher;
    }
}
