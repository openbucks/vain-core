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

namespace Vain\Core\Connection\Exception;

use Vain\Core\Connection\Storage\ConnectionStorageInterface;

/**
 * Class NoConnectionTypeException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class NoConnectionDriverException extends ConnectionStorageException
{
    /**
     * NoConnectionDriverException constructor.
     *
     * @param ConnectionStorageInterface $connectionStorage
     * @param string                     $connectionName
     */
    public function __construct(ConnectionStorageInterface $connectionStorage, string $connectionName)
    {
        parent::__construct(
            $connectionStorage,
            sprintf('Connection %s does not contain driver information for', $connectionName)
        );
    }
}
