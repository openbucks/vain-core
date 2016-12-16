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

namespace Vain\Core\Database\Cursor;

/**
 * Interface DatabaseCursorInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface DatabaseCursorInterface extends \Countable
{
    /**
     * @return bool
     */
    public function valid() : bool;

    /**
     * @return array
     */
    public function current() : array;

    /**
     * @return bool
     */
    public function next() : bool;

    /**
     * @return DatabaseCursorInterface
     */
    public function close() : DatabaseCursorInterface;

    /**
     * @param int $mode
     *
     * @return DatabaseCursorInterface
     */
    public function mode(int $mode) : DatabaseCursorInterface;

    /**
     * @return array
     */
    public function getSingle() : array;

    /**
     * @return array
     */
    public function getAll() : array;
}