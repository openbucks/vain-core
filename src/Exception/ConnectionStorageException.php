<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-database
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-database
 */
declare(strict_types = 1);

namespace Vain\Core\Exception;

use Vain\Core\Exception\AbstractCoreException;
use Vain\Core\Connection\Storage\ConnectionStorageInterface;

/**
 * Class ConnectionStorageException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ConnectionStorageException extends AbstractCoreException
{
    private $connectionStorage;

    /**
     * ConnectionStorageException constructor.
     *
     * @param ConnectionStorageInterface $connectionStorage
     * @param string                     $message
     * @param int                        $code
     * @param \Exception|null            $previous
     */
    public function __construct(
        ConnectionStorageInterface $connectionStorage,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->connectionStorage = $connectionStorage;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return ConnectionStorageInterface
     */
    public function getConnectionStorage(): ConnectionStorageInterface
    {
        return $this->connectionStorage;
    }
}
