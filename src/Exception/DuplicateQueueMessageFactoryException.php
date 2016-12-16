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

use Vain\Core\Queue\Message\Factory\QueueMessageFactoryInterface;
use Vain\Core\Queue\Message\Factory\Storage\QueueMessageFactoryStorageInterface;

/**
 * Class DuplicateQueueMessageFactoryException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DuplicateQueueMessageFactoryException extends QueueMessageFactoryStorageException
{
    private $new;

    private $old;

    /**
     * DuplicateConnectionFactoryException constructor.
     *
     * @param QueueMessageFactoryStorageInterface $factoryStorage
     * @param string                              $name
     * @param QueueMessageFactoryInterface        $new
     * @param QueueMessageFactoryInterface        $old
     */
    public function __construct(
        QueueMessageFactoryStorageInterface $factoryStorage,
        string $name,
        QueueMessageFactoryInterface $new,
        QueueMessageFactoryInterface $old
    ) {
        $this->new = $new;
        $this->old = $old;
        parent::__construct(
            $factoryStorage,
            sprintf(
                'Trying to register queue message factory %s by the same alias %s as %s',
                get_class($new),
                $name,
                get_class($old)
            )
        );
    }

    /**
     * @return QueueMessageFactoryInterface
     */
    public function getNew(): QueueMessageFactoryInterface
    {
        return $this->new;
    }

    /**
     * @return QueueMessageFactoryInterface
     */
    public function getOld(): QueueMessageFactoryInterface
    {
        return $this->old;
    }
}
