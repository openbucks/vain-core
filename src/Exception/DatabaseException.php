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
use Vain\Core\Database\DatabaseInterface;

/**
 * Class DatabaseException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DatabaseException extends AbstractCoreException
{
    private $database;

    /**
     * VainDatabaseException constructor.
     *
     * @param DatabaseInterface $vainDatabase
     * @param string            $message
     * @param int               $code
     * @param \Exception|null   $previous
     */
    public function __construct(
        DatabaseInterface $vainDatabase,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->database = $vainDatabase;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return DatabaseInterface
     */
    public function getDatabase() : DatabaseInterface
    {
        return $this->database;
    }
}
