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

namespace Vain\Core\Database;

use Vain\Core\Connection\ConnectionInterface;
use Vain\Core\Connection\Storage\ConnectionStorageInterface;
use Vain\Core\Database\Cursor\DatabaseCursorInterface;
use Vain\Core\Database\Generator\DatabaseGeneratorInterface;
use Vain\Core\Database\Generator\Factory\DatabaseGeneratorFactoryInterface;

/**
 * Class AbstractDatabase
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractDatabase implements DatabaseInterface
{
    private $configData;

    private $connectionStorage;

    private $generatorFactory;

    private $connection = null;

    /**
     * AbstractDatabase constructor.
     *
     * @param \ArrayAccess                      $configData
     * @param ConnectionStorageInterface        $connectionStorage
     * @param DatabaseGeneratorFactoryInterface $generatorFactory
     */
    public function __construct(
        \ArrayAccess $configData,
        ConnectionStorageInterface $connectionStorage,
        DatabaseGeneratorFactoryInterface $generatorFactory
    ) {
        $this->configData = $configData;
        $this->connectionStorage = $connectionStorage;
        $this->generatorFactory = $generatorFactory;
    }

    /**
     * @return ConnectionInterface
     */
    public function getConnection() : ConnectionInterface
    {
        if (null === $this->connection) {
            $this->connection = $this->connectionStorage->getConnection($this->configData['connection']);
        }

        return $this->connection;
    }

    /**
     * @param DatabaseCursorInterface $databaseCursor
     *
     * @return DatabaseGeneratorInterface
     */
    public function getGenerator(DatabaseCursorInterface $databaseCursor) : DatabaseGeneratorInterface
    {
        return $this->generatorFactory->create($databaseCursor);
    }
}
