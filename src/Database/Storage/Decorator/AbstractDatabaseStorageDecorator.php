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

namespace Vain\Core\Database\Storage\Decorator;

use Vain\Core\Database\Factory\DatabaseFactoryInterface;
use Vain\Core\Database\Storage\DatabaseStorageInterface;

/**
 * Class AbstractDatabaseStorageDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractDatabaseStorageDecorator implements DatabaseStorageInterface
{
    private $databaseStorage;

    /**
     * AbstractDatabaseStorageDecorator constructor.
     *
     * @param DatabaseStorageInterface $databaseStorage
     */
    public function __construct(DatabaseStorageInterface $databaseStorage)
    {
        $this->databaseStorage = $databaseStorage;
    }

    /**
     * @inheritDoc
     */
    public function addFactory(DatabaseFactoryInterface $databaseFactory) : DatabaseStorageInterface
    {
        $this->databaseStorage->addFactory($databaseFactory);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getDatabase(string $databaseName)
    {
        return $this->databaseStorage->getDatabase($databaseName);
    }
}
