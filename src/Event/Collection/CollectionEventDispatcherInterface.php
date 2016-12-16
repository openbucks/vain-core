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

namespace Vain\Core\Event\Collection;

use Vain\Core\Event\Dispatcher\EventDispatcherInterface;

/**
 * Class CollectionEventDispatcherInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface CollectionEventDispatcherInterface extends EventDispatcherInterface
{
    /**
     * @return CollectionEventDispatcherInterface
     */
    public function start() : CollectionEventDispatcherInterface;

    /**
     * @return CollectionEventDispatcherInterface
     */
    public function flush() : CollectionEventDispatcherInterface;
}