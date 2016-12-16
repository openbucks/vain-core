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

namespace Vain\Core\Event\Resolver;

use Vain\Core\Event\EventInterface;
use Vain\Core\Event\Resolver\EventResolverInterface;

/**
 * Class Resolver
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class EventResolver implements EventResolverInterface
{
    /**
     * @inheritDoc
     */
    public function resolveMethod(EventInterface $event) : string
    {
        list ($component, $method) = explode(':', $event->getName());

        return strtolower($method);
    }

    /**
     * @inheritDoc
     */
    public function resolveGroup(EventInterface $event) : string
    {
        list ($component, $method) = explode(':', $event->getName());

        return strtolower($component);
    }

    /**
     * @inheritDoc
     */
    public function createName(string $group, string $name) : string
    {
        return sprintf('%s:%s', strtolower($group), strtolower($name));
    }
}
