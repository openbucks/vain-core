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

namespace Vain\Core\Database\Storage;

use Vain\Core\Database\Factory\DatabaseFactoryInterface;

/**
 * Interface DatabaseStorageInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface DatabaseStorageInterface
{
    /**
     * @param DatabaseFactoryInterface $databaseFactory
     *
     * @return DatabaseStorageInterface
     */
    public function addFactory(DatabaseFactoryInterface $databaseFactory) : DatabaseStorageInterface;

    /**
     * @param string $databaseName
     *
     * @return mixed
     */
    public function getDatabase(string $databaseName);
}
