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
 * Class NoConnectionException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class NoConnectionException extends DatabaseStorageException
{
    /**
     * NoConnectionException constructor.
     *
     * @param DatabaseStorageInterface $databaseStorage
     * @param string                   $databaseName
     */
    public function __construct(DatabaseStorageInterface $databaseStorage, $databaseName)
    {
        parent::__construct(
            $databaseStorage,
            sprintf('Config for database %s does not contain connection info', $databaseName)
        );
    }
}
