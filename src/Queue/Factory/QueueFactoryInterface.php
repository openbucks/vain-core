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

namespace Vain\Core\Queue\Factory;

use Vain\Core\Connection\ConnectionInterface;

/**
 * Interface QueueFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface QueueFactoryInterface
{
    /**
     * @return string
     */
    public function getName() : string;

    /**
     * @param array               $configData
     * @param ConnectionInterface $connection
     *
     * @return mixed
     */
    public function createQueue(array $configData, ConnectionInterface $connection);
}
