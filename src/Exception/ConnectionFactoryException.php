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

namespace Vain\Core\Exception;

use Vain\Core\Connection\Factory\ConnectionFactoryInterface;
use Vain\Core\Exception\AbstractCoreException;

/**
 * Class ConnectionFactoryException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ConnectionFactoryException extends AbstractCoreException
{
    private $connectionFactory;

    /**
     * ConnectionFactoryException constructor.
     *
     * @param ConnectionFactoryInterface $connectionFactory
     * @param string                     $message
     * @param int                        $code
     * @param \Exception|null            $previous
     */
    public function __construct(
        ConnectionFactoryInterface $connectionFactory,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->connectionFactory = $connectionFactory;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return ConnectionFactoryInterface
     */
    public function getConnectionFactory(): ConnectionFactoryInterface
    {
        return $this->connectionFactory;
    }
}
