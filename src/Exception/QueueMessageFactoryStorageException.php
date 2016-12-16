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
use Vain\Core\Queue\Message\Factory\Storage\QueueMessageFactoryStorageInterface;

/**
 * Class QueueMessageFactoryStorageException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class QueueMessageFactoryStorageException extends AbstractCoreException
{
    private $factoryStorage;

    /**
     * QueueStorageException constructor.
     *
     * @param QueueMessageFactoryStorageInterface $factoryStorage
     * @param string                $message
     * @param int                   $code
     * @param \Exception|null       $previous
     */
    public function __construct(
        QueueMessageFactoryStorageInterface $factoryStorage,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->factoryStorage = $factoryStorage;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return QueueMessageFactoryStorageInterface
     */
    public function getFactoryStorage(): QueueMessageFactoryStorageInterface
    {
        return $this->factoryStorage;
    }
}
