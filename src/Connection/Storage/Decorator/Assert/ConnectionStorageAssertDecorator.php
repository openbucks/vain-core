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

namespace Vain\Core\Connection\Storage\Decorator\Assert;

use Vain\Core\Connection\Exception\NoConnectionDriverException;
use Vain\Core\Connection\Exception\UnknownConnectionException;
use Vain\Core\Connection\Storage\ConnectionStorageInterface;
use Vain\Core\Connection\Storage\Decorator\AbstractConnectionStorageDecorator;

/**
 * Class ConnectionStorageAssertDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ConnectionStorageAssertDecorator extends AbstractConnectionStorageDecorator
{
    private $config;

    /**
     * ConnectionStorageAssertDecorator constructor.
     *
     * @param ConnectionStorageInterface $connectionStorage
     * @param \ArrayAccess               $config
     */
    public function __construct(ConnectionStorageInterface $connectionStorage, \ArrayAccess $config)
    {
        $this->config = $config;
        parent::__construct($connectionStorage);
    }

    /**
     * @inheritDoc
     */
    public function getConnection(string $connectionName)
    {
        $connections = $this->config['connections'];
        if (false === array_key_exists($connectionName, $connections)) {
            throw new UnknownConnectionException($this, $connectionName);
        }
        if (false === array_key_exists('driver', $connections[$connectionName])) {
            throw new NoConnectionDriverException($this, $connectionName);
        }

        return parent::getConnection($connectionName);
    }
}
