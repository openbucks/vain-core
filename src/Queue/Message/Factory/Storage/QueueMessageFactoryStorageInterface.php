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

namespace Vain\Core\Queue\Message\Factory\Storage;

use Vain\Core\Queue\Message\Factory\QueueMessageFactoryInterface;

/**
 * Interface QueueMessageFactoryStorageInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface QueueMessageFactoryStorageInterface
{
    /**
     * @param QueueMessageFactoryInterface $messageFactory
     *
     * @return QueueMessageFactoryStorageInterface
     */
    public function addFactory(QueueMessageFactoryInterface $messageFactory) : QueueMessageFactoryStorageInterface;

    /**
     * @param string $name
     *
     * @return QueueMessageFactoryInterface
     */
    public function getFactory(string $name) : QueueMessageFactoryInterface;
}
