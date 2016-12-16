<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-queue
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-queue
 */
declare(strict_types = 1);

namespace Vain\Core\Queue\Event\Storage;

use Vain\Core\Event\EventInterface;

/**
 * Interface EventStorageInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface EventStorageInterface
{
    /**
     * @param EventInterface $event
     *
     * @return bool
     */
    public function trackEvent(EventInterface $event) : bool;
}
