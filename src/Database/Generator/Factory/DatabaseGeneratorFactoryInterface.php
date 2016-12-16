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

namespace Vain\Core\Database\Generator\Factory;

use Vain\Core\Database\Cursor\DatabaseCursorInterface;
use Vain\Core\Database\DatabaseInterface;
use Vain\Core\Database\Generator\DatabaseGeneratorInterface;

/**
 * Interface DatabaseGeneratorFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface DatabaseGeneratorFactoryInterface
{
    /**
     * @param DatabaseInterface       $database
     * @param DatabaseCursorInterface $cursor
     *
     * @return DatabaseGeneratorInterface
     */
    public function create(DatabaseInterface $database, DatabaseCursorInterface $cursor) : DatabaseGeneratorInterface;
}