<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-core
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-core
 */
declare(strict_types = 1);

namespace Vain\Core\Event\Handler;

use Vain\Core\Event\Config\EventConfigInterface;
use Vain\Core\Event\EventInterface;

/**
 * Class EventHandlerInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface EventHandlerInterface
{
    /**
     * @param EventInterface       $event
     * @param EventConfigInterface $eventConfig
     *
     * @return EventHandlerInterface
     */
    public function handle(EventInterface $event, EventConfigInterface $eventConfig) : EventHandlerInterface;
}