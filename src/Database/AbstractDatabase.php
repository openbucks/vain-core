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

namespace Vain\Core\Database;

use Vain\Core\Database\Generator\Factory\DatabaseGeneratorFactoryInterface;

/**
 * Class AbstractDatabase
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractDatabase implements DatabaseInterface
{
    private $generatorFactory;

    /**
     * AbstractDatabase constructor.
     *
     * @param DatabaseGeneratorFactoryInterface $generatorFactory
     */
    public function __construct(DatabaseGeneratorFactoryInterface $generatorFactory)
    {
        $this->generatorFactory = $generatorFactory;
    }

    /**
     * @return DatabaseGeneratorFactoryInterface
     */
    public function getGeneratorFactory()
    {
        return $this->generatorFactory;
    }
}
