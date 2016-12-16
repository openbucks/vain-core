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

namespace Vain\Core\Connection\Proxy;

use Vain\Core\Connection\ConnectionInterface;

/**
 * Class ConnectionProxy
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ConnectionProxy implements ConnectionInterface
{
    private $connection;

    private $instance = null;

    /**
     * AbstractConnection constructor.
     *
     * @param ConnectionInterface $connection
     */
    public function __construct(ConnectionInterface $connection)
    {
        $this->connection = $connection;
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
        if (null === $this->instance) {
            $this->instance = $this->connection->establish();
        }

        return $this->instance;
    }
}
