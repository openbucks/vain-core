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

namespace Vain\Core\Event\Resolver;

use Vain\Core\Event\EventInterface;

/**
 * Class EventResolverInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface EventResolverInterface
{
    /**
     * @param EventInterface $event
     *
     * @return string
     */
    public function resolveMethod(EventInterface $event) : string;

    /**
     * @param EventInterface $event
     *
     * @return string
     */
    public function resolveGroup(EventInterface $event) : string;

    /**
     * @param string $group
     * @param string $name
     *
     * @return string
     */
    public function createName(string $group, string $name) : string;
}