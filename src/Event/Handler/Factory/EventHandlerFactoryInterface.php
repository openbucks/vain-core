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

namespace Vain\Core\Event\Handler\Factory;

use Vain\Core\Event\Handler\EventHandlerInterface;

/**
 * Interface EventHandlerFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface EventHandlerFactoryInterface
{
    /**
     * @param string $name
     *
     * @return EventHandlerInterface
     */
    public function create(string $name) : EventHandlerInterface;
}
