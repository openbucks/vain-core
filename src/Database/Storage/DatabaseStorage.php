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

namespace Vain\Core\Database\Storage;

use Vain\Core\Connection\Storage\ConnectionStorageInterface;
use Vain\Core\Exception\DuplicateDatabaseFactoryException;
use Vain\Core\Exception\UnknownDatabaseDriverException;
use Vain\Core\Database\Factory\DatabaseFactoryInterface;

/**
 * Class DatabaseStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DatabaseStorage implements DatabaseStorageInterface
{
    private $config;

    private $databases = [];

    private $connectionStorage;

    /**
     * @var DatabaseFactoryInterface[]
     */
    private $factories = [];

    /**
     * DatabaseFactory constructor.
     *
     * @param ConnectionStorageInterface $connectionStorage
     * @param \ArrayAccess               $config
     * @param DatabaseFactoryInterface[] $factories
     */
    public function __construct(
        ConnectionStorageInterface $connectionStorage,
        \ArrayAccess $config,
        array $factories = []
    ) {
        $this->config = $config;
        $this->connectionStorage = $connectionStorage;
        foreach ($factories as $factory) {
            $this->addFactory($factory);
        }
    }

    /**
     * @inheritDoc
     */
    public function addFactory(DatabaseFactoryInterface $factory) : DatabaseStorageInterface
    {
        $name = $factory->getName();
        if (array_key_exists($name, $this->factories)) {
            throw new DuplicateDatabaseFactoryException($this, $name, $factory, $this->factories[$name]);
        }
        $this->factories[$name] = $factory;

        return $this;
    }

    /**
     * @param string $databaseName
     *
     * @return mixed
     *
     * @throws UnknownDatabaseDriverException
     */
    protected function createDatabase(string $databaseName)
    {
        $databaseConfig = $this->config['databases'][$databaseName];
        $connectionName = $databaseConfig['connection'];
        $driver = $databaseConfig['driver'];

        if (false === array_key_exists($driver, $this->factories)) {
            throw new UnknownDatabaseDriverException($this, $driver);
        }

        return $this->factories[$driver]->createDatabase(
            $databaseConfig,
            $this->connectionStorage->getConnection($connectionName)
        );
    }

    /**
     * @inheritDoc
     */
    public function getDatabase(string $databaseName)
    {
        if (false === array_key_exists($databaseName, $this->databases)) {
            $this->databases[$databaseName] = $this->createDatabase($databaseName);
        }

        return $this->databases[$databaseName];
    }
}
