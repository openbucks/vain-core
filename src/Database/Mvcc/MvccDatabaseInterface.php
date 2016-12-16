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

namespace Vain\Core\Database\Mvcc;

use Vain\Core\Database\DatabaseInterface;

/**
 * Interface MvccDatabaseInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface MvccDatabaseInterface extends DatabaseInterface
{
    /**
     * @return bool
     */
    public function startTransaction() : bool;

    /**
     * @return bool
     */
    public function commitTransaction() : bool;

    /**
     * @return bool
     */
    public function rollbackTransaction() : bool;
}
