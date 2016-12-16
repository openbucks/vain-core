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

namespace Vain\Core\Connection\Exception;

use Vain\Core\Connection\Factory\ConnectionFactoryInterface;
use Vain\Core\Connection\Storage\ConnectionStorageInterface;

/**
 * Class DuplicateConnectionFactoryException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DuplicateConnectionFactoryException extends ConnectionStorageException
{
    private $new;

    private $old;

    /**
     * DuplicateConnectionFactoryException constructor.
     *
     * @param ConnectionStorageInterface $connectionStorage
     * @param string                     $name
     * @param ConnectionFactoryInterface $new
     * @param ConnectionFactoryInterface $old
     */
    public function __construct(
        ConnectionStorageInterface $connectionStorage,
        string $name,
        ConnectionFactoryInterface $new,
        ConnectionFactoryInterface $old
    ) {
        $this->new = $new;
        $this->old = $old;
        parent::__construct(
            $connectionStorage,
            sprintf(
                'Trying to register connection factory %s by the same alias %s as %s',
                get_class($new),
                $name,
                get_class($old)
            )
        );
    }

    /**
     * @return ConnectionFactoryInterface
     */
    public function getNew() : ConnectionFactoryInterface
    {
        return $this->new;
    }

    /**
     * @return ConnectionFactoryInterface
     */
    public function getOld() : ConnectionFactoryInterface
    {
        return $this->old;
    }
}
