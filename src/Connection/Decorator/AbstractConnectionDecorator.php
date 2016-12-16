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

namespace Vain\Core\Connection\Decorator;

use Vain\Core\Connection\ConnectionInterface;

/**
 * Class AbstractConnectionDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractConnectionDecorator implements ConnectionInterface
{
    private $connection;

    /**
     * AbstractConnectionDecorator constructor.
     *
     * @param ConnectionInterface $connection
     */
    public function __construct(ConnectionInterface $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return ConnectionInterface
     */
    public function getConnection(): ConnectionInterface
    {
        return $this->connection;
    }

    /**
     * @inheritDoc
     */
    public function getName() : string
    {
        return $this->connection->getName();
    }

    /**
     * @inheritDoc
     */
    public function establish()
    {
        return $this->connection->establish();
    }
}
