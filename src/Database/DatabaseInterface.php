<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-core
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-core
 */
declare(strict_types = 1);

namespace Vain\Core\Database;

use Vain\Core\Database\Generator\DatabaseGeneratorInterface;

/**
 * Interface DatabaseInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface DatabaseInterface
{
    /**
     * @param string $query
     * @param array  $bindParams
     * @param array  $bindTypes
     *
     * @return DatabaseGeneratorInterface
     */
    public function runQuery($query, array $bindParams, array $bindTypes = []) : DatabaseGeneratorInterface;
}