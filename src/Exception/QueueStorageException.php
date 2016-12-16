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

use Vain\Core\Exception\AbstractCoreException;
use Vain\Core\Queue\Storage\QueueStorageInterface;

/**
 * Class QueueStorageException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class QueueStorageException extends AbstractCoreException
{
    private $queueStorage;

    /**
     * QueueStorageException constructor.
     *
     * @param QueueStorageInterface $queueStorage
     * @param string                $message
     * @param int                   $code
     * @param \Exception|null       $previous
     */
    public function __construct(
        QueueStorageInterface $queueStorage,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->queueStorage = $queueStorage;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return QueueStorageInterface
     */
    public function getQueueStorage(): QueueStorageInterface
    {
        return $this->queueStorage;
    }
}
