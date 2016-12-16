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

use Vain\Core\Database\DatabaseInterface;

/**
 * Class LevelIntegrityDatabaseException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class LevelIntegrityDatabaseException extends DatabaseException
{
    /**
     * LevelIntegrityDatabaseException constructor.
     *
     * @param DatabaseInterface $database
     * @param int               $level
     */
    public function __construct(DatabaseInterface $database, int $level)
    {
        parent::__construct($database, sprintf('Level integrity check exception for level %d', $level));
    }
}
