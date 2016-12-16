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
 * Class NoDatabaseTypeException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class NoDatabaseTypeException extends DatabaseStorageException
{
    /**
     * UnknownConnectionTypeException constructor.
     *
     * @param DatabaseStorageInterface $databaseStorage
     * @param string                   $databaseName
     */
    public function __construct(DatabaseStorageInterface $databaseStorage, string $databaseName)
    {
        parent::__construct(
            $databaseStorage,
            sprintf('Database %s does not container driver information', $databaseName)
        );
    }
}
