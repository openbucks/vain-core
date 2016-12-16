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

namespace Vain\Core\Exception;

use Vain\Core\Database\Storage\DatabaseStorageInterface;

/**
 * Class UnknownDatabaseDriverException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnknownDatabaseDriverException extends DatabaseStorageException
{
    /**
     * UnknownDatabaseDriverException constructor.
     *
     * @param DatabaseStorageInterface $databaseStorage
     * @param string                   $databaseDriver
     */
    public function __construct(DatabaseStorageInterface $databaseStorage, string $databaseDriver)
    {
        parent::__construct($databaseStorage, sprintf('Unknown database driver %s', $databaseDriver));
    }
}
