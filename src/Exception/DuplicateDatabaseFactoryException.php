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

use Vain\Core\Database\Factory\DatabaseFactoryInterface;
use Vain\Core\Database\Storage\DatabaseStorageInterface;

/**
 * Class DuplicateDatabaseFactoryException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DuplicateDatabaseFactoryException extends DatabaseStorageException
{
    private $new;

    private $old;

    /**
     * DuplicateDatabaseFactoryException constructor.
     *
     * @param DatabaseStorageInterface $databaseStorage
     * @param string                   $name
     * @param DatabaseFactoryInterface $new
     * @param DatabaseFactoryInterface $old
     */
    public function __construct(
        DatabaseStorageInterface $databaseStorage,
        string $name,
        DatabaseFactoryInterface $new,
        DatabaseFactoryInterface $old
    ) {
        $this->new = $new;
        $this->old = $old;
        parent::__construct(
            $databaseStorage,
            sprintf(
                'Trying to register database factory %s by the same alias %s as %s',
                get_class($new),
                $name,
                get_class($old)
            )
        );
    }

    /**
     * @return DatabaseFactoryInterface
     */
    public function getNew(): DatabaseFactoryInterface
    {
        return $this->new;
    }

    /**
     * @return DatabaseFactoryInterface
     */
    public function getOld(): DatabaseFactoryInterface
    {
        return $this->old;
    }
}
