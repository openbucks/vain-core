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

namespace Vain\Core\Connection\Storage;

use Vain\Core\Exception\DuplicateConnectionFactoryException;
use Vain\Core\Connection\Factory\ConnectionFactoryInterface;
use Vain\Core\Exception\UnknownConnectionDriverException;

/**
 * Class ConnectionStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ConnectionStorage implements ConnectionStorageInterface
{
    private $config;

    private $connections = [];

    /**
     * @var ConnectionFactoryInterface[]
     */
    private $factories = [];

    /**
     * DatabaseFactory constructor.
     *
     * @param \ArrayAccess                 $config
     * @param ConnectionFactoryInterface[] $factories
     */
    public function __construct(\ArrayAccess $config, array $factories = [])
    {
        $this->config = $config;
        foreach ($factories as $factory) {
            $this->addFactory($factory);
        }
    }

    /**
     * @inheritDoc
     */
    public function addFactory(ConnectionFactoryInterface $connectionFactory) : ConnectionStorageInterface
    {
        $name = $connectionFactory->getName();
        if (array_key_exists($name, $this->factories)) {
            throw new DuplicateConnectionFactoryException($this, $name, $connectionFactory, $this->factories[$name]);
        }
        $this->factories[$name] = $connectionFactory;

        return $this;
    }

    /**
     * @param string $connectionName
     *
     * @return mixed
     *
     * @throws UnknownConnectionDriverException
     */
    protected function createConnection(string $connectionName)
    {
        $connectionConfig = $this->config['connections'][$connectionName];
        $connectionType = $connectionConfig['driver'];
        if (false === array_key_exists($connectionType, $this->factories)) {
            throw new UnknownConnectionDriverException($this, $connectionType);
        }

        return $this->factories[$connectionType]->createConnection($connectionConfig);
    }

    /**
     * @inheritDoc
     */
    public function getConnection(string $connectionName)
    {
        if (false === array_key_exists($connectionName, $this->connections)) {
            $this->connections[$connectionName] = $this->createConnection($connectionName);
        }

        return $this->connections[$connectionName];
    }
}
