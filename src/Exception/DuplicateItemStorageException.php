<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-core
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-core
 */
declare(strict_types = 1);

namespace Vain\Core\Exception;

use Vain\Core\Name\NameableInterface;
use Vain\Core\Name\Storage\NameableStorageInterface;

/**
 * Class DuplicateItemStorageException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DuplicateItemStorageException extends NameableStorageException
{
    private $new;

    private $old;

    /**
     * DuplicateDatabaseFactoryException constructor.
     *
     * @param NameableStorageInterface $databaseStorage
     * @param NameableInterface        $new
     * @param NameableInterface        $old
     */
    public function __construct(
        NameableStorageInterface $databaseStorage,
        NameableInterface $new,
        NameableInterface $old
    ) {
        $this->new = $new;
        $this->old = $old;
        parent::__construct(
            $databaseStorage,
            sprintf(
                'Trying to register item %s by the same alias %s as %s',
                get_class($new),
                $old->getName(),
                get_class($old)
            )
        );
    }

    /**
     * @return NameableInterface
     */
    public function getNew(): NameableInterface
    {
        return $this->new;
    }

    /**
     * @return NameableInterface
     */
    public function getOld(): NameableInterface
    {
        return $this->old;
    }
}