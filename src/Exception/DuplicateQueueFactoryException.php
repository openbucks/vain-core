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

use Vain\Core\Queue\Factory\QueueFactoryInterface;
use Vain\Core\Queue\Storage\QueueStorageInterface;

/**
 * Class DuplicateQueueFactoryException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DuplicateQueueFactoryException extends QueueStorageException
{
    private $new;

    private $old;

    /**
     * DuplicateConnectionFactoryException constructor.
     *
     * @param QueueStorageInterface $queueStorage
     * @param string                $name
     * @param QueueFactoryInterface $new
     * @param QueueFactoryInterface $old
     */
    public function __construct(
        QueueStorageInterface $queueStorage,
        string $name,
        QueueFactoryInterface $new,
        QueueFactoryInterface $old
    ) {
        $this->new = $new;
        $this->old = $old;
        parent::__construct(
            $queueStorage,
            sprintf(
                'Trying to register queue factory %s by the same alias %s as %s',
                get_class($new),
                $name,
                get_class($old)
            )
        );
    }

    /**
     * @return QueueFactoryInterface
     */
    public function getNew(): QueueFactoryInterface
    {
        return $this->new;
    }

    /**
     * @return QueueFactoryInterface
     */
    public function getOld(): QueueFactoryInterface
    {
        return $this->old;
    }
}
