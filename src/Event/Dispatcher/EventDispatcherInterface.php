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

namespace Vain\Core\Event\Dispatcher;

use Vain\Core\Event\EventInterface;

/**
 * Class EventDispatcherInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface EventDispatcherInterface
{
    /**
     * @param EventInterface $event
     *
     * @return EventDispatcherInterface
     */
    public function dispatch(EventInterface $event) : EventDispatcherInterface;
}