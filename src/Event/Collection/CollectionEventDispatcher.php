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
use Vain\Core\Event\EventInterface;
use Vain\Core\Exception\LevelIntegrityDispatcherException;

/**
 * Class CollectionEventDispatcher
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class CollectionEventDispatcher implements CollectionEventDispatcherInterface
{
    private $events = [];

    private $level = 0;

    private $eventDispatcher;

    /**
     * CollectionEventDispatcher constructor.
     *
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @inheritDoc
     */
    public function start() : CollectionEventDispatcherInterface
    {
        if (0 <= $this->level) {
            $this->level++;

            return $this;
        }

        throw new LevelIntegrityDispatcherException($this, $this->level);
    }

    /**
     * @inheritDoc
     */
    public function flush() : CollectionEventDispatcherInterface
    {
        if (0 < $this->level) {
            $this->level--;

            return $this;
        }

        if (0 > $this->level) {
            throw new LevelIntegrityDispatcherException($this, $this->level);
        }

        while ([] !== $this->events) {
            $this->eventDispatcher->dispatch(array_shift($this->events));
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function dispatch(EventInterface $event) : EventDispatcherInterface
    {
        $this->events[] = $event;

        return $this;
    }
}