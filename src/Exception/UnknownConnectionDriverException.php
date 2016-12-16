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

namespace Vain\Core\Exception;

use Vain\Core\Connection\Storage\ConnectionStorageInterface;

/**
 * Class UnknownConnectionTypeException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnknownConnectionDriverException extends ConnectionStorageException
{
    /**
     * UnknownConnectionTypeException constructor.
     *
     * @param ConnectionStorageInterface $connectionStorage
     * @param string                     $connectionType
     */
    public function __construct(ConnectionStorageInterface $connectionStorage, string $connectionType)
    {
        parent::__construct(
            $connectionStorage,
            sprintf('Cannot create connection with unknown driver %s', $connectionType)
        );
    }
}
