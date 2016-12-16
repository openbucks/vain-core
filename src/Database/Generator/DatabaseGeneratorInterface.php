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

namespace Vain\Core\Database\Generator;

/**
 * Interface DatabaseGeneratorInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface DatabaseGeneratorInterface extends \Iterator, \Countable
{
    /**
     * @param int $mode
     *
     * @return array
     */
    public function getSingleRow(int $mode) : array;

    /**
     * @param int $mode
     *
     * @return array
     */
    public function getAllRows(int $mode) : array;
}