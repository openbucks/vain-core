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

namespace Vain\Core\Exception;

use Vain\Core\Database\Storage\DatabaseStorageInterface;

/**
 * Class UnknownDatabaseException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnknownDatabaseException extends DatabaseStorageException
{
    /**
     * UnknownDatabaseException constructor.
     *
     * @param DatabaseStorageInterface $databaseStorage
     * @param string                   $databaseName
     */
    public function __construct(DatabaseStorageInterface $databaseStorage, string $databaseName)
    {
        parent::__construct($databaseStorage, sprintf('No config for database %s', $databaseName));
    }
}
