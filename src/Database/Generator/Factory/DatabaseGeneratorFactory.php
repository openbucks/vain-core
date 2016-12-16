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

namespace Vain\Core\Database\Generator\Factory;

use Vain\Core\Database\Cursor\DatabaseCursorInterface;
use Vain\Core\Database\Generator\Factory\DatabaseGeneratorFactoryInterface;
use Vain\Core\Database\Generator\DatabaseGenerator;
use Vain\Core\Database\DatabaseInterface;
use Vain\Core\Database\Generator\DatabaseGeneratorInterface;

/**
 * Class GeneratorFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DatabaseGeneratorFactory implements DatabaseGeneratorFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(DatabaseInterface $database, DatabaseCursorInterface $cursor) : DatabaseGeneratorInterface
    {
        return new DatabaseGenerator($database, $cursor);
    }
}
