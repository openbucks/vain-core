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

namespace Vain\Core\Database\Factory;

use Vain\Core\Connection\ConnectionInterface;

/**
 * Interface DatabaseFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface DatabaseFactoryInterface
{
    /**
     * @return string
     */
    public function getName() : string;

    /**
     * @param array               $configData
     * @param ConnectionInterface $connection
     *
     * @return mixed
     */
    public function createDatabase(array $configData, ConnectionInterface $connection);
}
