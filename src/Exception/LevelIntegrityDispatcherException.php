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

use Vain\Core\Event\Collection\CollectionEventDispatcherInterface;

/**
 * Class LevelIntegrityDispatcherException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class LevelIntegrityDispatcherException extends CollectionDispatcherException
{
    /**
     * LevelIntegrityDispatcherException constructor.
     *
     * @param CollectionEventDispatcherInterface $eventDispatcher
     * @param int                                $level
     */
    public function __construct(CollectionEventDispatcherInterface $eventDispatcher, int $level)
    {
        parent::__construct($eventDispatcher, sprintf('Level integrity check exception for level %d', $level));
    }
}
