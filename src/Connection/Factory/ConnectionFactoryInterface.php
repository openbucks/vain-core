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

namespace Vain\Core\Connection\Factory;

use Vain\Core\Connection\ConnectionInterface;
use Vain\Core\Name\NameableInterface;

/**
 * Interface ConnectionFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ConnectionFactoryInterface extends NameableInterface
{
    /**
     * @param string $connectionName
     *
     * @return ConnectionInterface
     */
    public function createConnection(string $connectionName) : ConnectionInterface;
}
