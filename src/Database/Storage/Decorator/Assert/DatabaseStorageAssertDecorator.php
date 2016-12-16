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

namespace Vain\Core\Database\Storage\Decorator\Assert;

use Vain\Core\Exception\NoConnectionException;
use Vain\Core\Exception\NoDatabaseTypeException;
use Vain\Core\Exception\UnknownDatabaseException;
use Vain\Core\Database\Storage\DatabaseStorageInterface;
use Vain\Core\Database\Storage\Decorator\AbstractDatabaseStorageDecorator;

/**
 * Class DatabaseStorageAssertDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DatabaseStorageAssertDecorator extends AbstractDatabaseStorageDecorator
{
    private $config;

    /**
     * DatabaseStorageAssertDecorator constructor.
     *
     * @param DatabaseStorageInterface $databaseStorage
     * @param \ArrayAccess             $config
     */
    public function __construct(DatabaseStorageInterface $databaseStorage, \ArrayAccess $config)
    {
        $this->config = $config;
        parent::__construct($databaseStorage);
    }

    /**
     * @inheritDoc
     */
    public function getDatabase(string $databaseName)
    {
        if (false === array_key_exists($databaseName, $this->config['databases'])) {
            throw new UnknownDatabaseException($this, $databaseName);
        }

        if (false === array_key_exists('connection', $this->config['databases'][$databaseName])) {
            throw new NoConnectionException($this, $databaseName);
        }

        if (false === array_key_exists('driver', $this->config['databases'][$databaseName])) {
            throw new NoDatabaseTypeException($this, $databaseName);
        }

        return parent::getDatabase($databaseName);
    }
}
