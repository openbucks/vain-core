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

namespace Vain\Core\Exception;

use Vain\Core\Exception\AbstractCoreException;
use Vain\Core\Event\Config\Factory\EventConfigFactoryInterface;

/**
 * Class EventConfigFactoryException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class EventConfigFactoryException extends AbstractCoreException
{
    private $configFactory;

    /**
     * EventConfigFactoryException constructor.
     *
     * @param EventConfigFactoryInterface $eventConfigFactory
     * @param string                      $message
     * @param int                         $code
     * @param \Exception|null             $previous
     */
    public function __construct(
        EventConfigFactoryInterface $eventConfigFactory,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->configFactory = $eventConfigFactory;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return EventConfigFactoryInterface
     */
    public function getConfigFactory(): EventConfigFactoryInterface
    {
        return $this->configFactory;
    }
}
