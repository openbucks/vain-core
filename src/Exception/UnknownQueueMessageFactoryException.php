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

namespace Vain\Core\Exception;

use Vain\Core\Queue\Message\Factory\Storage\QueueMessageFactoryStorageInterface;

/**
 * Class UnknownQueueMessageFactoryException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnknownQueueMessageFactoryException extends QueueMessageFactoryStorageException
{
    /**
     * UnknownDatabaseDriverException constructor.
     *
     * @param QueueMessageFactoryStorageInterface $factoryStorage
     * @param string                              $name
     */
    public function __construct(QueueMessageFactoryStorageInterface $factoryStorage, string $name)
    {
        parent::__construct($factoryStorage, sprintf('Unknown queue message factory %s', $name));
    }
}
