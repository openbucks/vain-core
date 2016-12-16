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

use Vain\Core\Exception\AbstractCoreException;
use Vain\Core\Database\Storage\DatabaseStorageInterface;

/**
 * Class DatabaseStorageException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DatabaseStorageException extends AbstractCoreException
{
    private $databaseStorage;

    /**
     * DatabaseStorageException constructor.
     *
     * @param DatabaseStorageInterface $databaseStorage
     * @param string                   $message
     * @param int                      $code
     * @param \Exception|null          $previous
     */
    public function __construct(
        DatabaseStorageInterface $databaseStorage,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->databaseStorage = $databaseStorage;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return DatabaseStorageInterface
     */
    public function getDatabaseStorage() : DatabaseStorageInterface
    {
        return $this->databaseStorage;
    }
}
