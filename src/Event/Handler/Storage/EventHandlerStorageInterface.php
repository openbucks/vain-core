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

namespace Vain\Core\Event\Handler\Storage;

use Vain\Core\Event\Config\EventConfigInterface;
use Vain\Core\Event\Handler\EventHandlerInterface;

/**
 * Interface ListenerStorageInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface EventHandlerStorageInterface
{
    /**
     * @param EventConfigInterface $eventConfig
     *
     * @return EventHandlerInterface
     */
    public function getHandler(EventConfigInterface $eventConfig) : EventHandlerInterface;
}
