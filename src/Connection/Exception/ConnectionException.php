<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-connection
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-connection
 */
declare(strict_types = 1);

namespace Vain\Core\Connection\Exception;

use Vain\Core\Connection\ConnectionInterface;
use Vain\Core\Exception\AbstractCoreException;

/**
 * Class ConnectionException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ConnectionException extends AbstractCoreException
{
    private $connection;

    /**
     * ConnectionException constructor.
     *
     * @param ConnectionInterface $connection
     * @param string              $message
     * @param int                 $code
     * @param \Exception|null     $previous
     */
    public function __construct(
        ConnectionInterface $connection,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->connection = $connection;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return ConnectionInterface
     */
    public function getConnection(): ConnectionInterface
    {
        return $this->connection;
    }
}
