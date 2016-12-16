<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-connection
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-connection
 */
declare(strict_types = 1);

namespace Vain\Core\Connection\Storage\Decorator;

use Vain\Core\Connection\Storage\ConnectionStorageInterface;

/**
 * Class AbstractConnectionStorageDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractConnectionStorageDecorator implements ConnectionStorageInterface
{
    private $connectionStorage;

    /**
     * AbstractConnectionStorageDecorator constructor.
     *
     * @param ConnectionStorageInterface $connectionStorage
     */
    public function __construct(ConnectionStorageInterface $connectionStorage)
    {
        $this->connectionStorage = $connectionStorage;
    }

    /**
     * @inheritDoc
     */
    public function getConnection(string $connectionName)
    {
        return $this->connectionStorage->getConnection($connectionName);
    }
}
