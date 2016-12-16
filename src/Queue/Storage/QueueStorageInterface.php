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
declare(strict_types=1);

namespace Vain\Core\Queue\Storage;

use Vain\Core\Queue\Factory\QueueFactoryInterface;
use Vain\Core\Queue\QueueInterface;

/**
 * Interface QueueStorageInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface QueueStorageInterface
{
    /**
     * @param QueueFactoryInterface $queueFactory
     *
     * @return QueueStorageInterface
     */
    public function addFactory(QueueFactoryInterface $queueFactory) : QueueStorageInterface;

    /**
     * @param string $queueName
     *
     * @return QueueInterface
     */
    public function getQueue(string $queueName) : QueueInterface;
}
