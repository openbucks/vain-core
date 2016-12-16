<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-security
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-security
 */
declare(strict_types = 1);

namespace Vain\Core\Exception;

use Vain\Core\Security\Access\AccessControlInterface;
use Vain\Core\Security\Access\Storage\AccessControlStorageInterface;

/**
 * Class DuplicateAccessControlException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DuplicateAccessControlException extends AccessControlStorageException
{
    private $new;

    private $old;

    /**
     * DuplicateAccessControlException constructor.
     *
     * @param AccessControlStorageInterface $accessControlStorage
     * @param string                        $name
     * @param AccessControlInterface        $new
     * @param AccessControlInterface        $old
     */
    public function __construct(
        AccessControlStorageInterface $accessControlStorage,
        string $name,
        AccessControlInterface $new,
        AccessControlInterface $old
    ) {
        $this->new = $new;
        $this->old = $old;
        parent::__construct(
            $accessControlStorage,
            sprintf(
                'Trying to register access control %s by the same alias %s as %s',
                get_class($new),
                $name,
                get_class($old)
            )
        );
    }

    /**
     * @return AccessControlInterface
     */
    public function getNew() : AccessControlInterface
    {
        return $this->new;
    }

    /**
     * @return AccessControlInterface
     */
    public function getOld() : AccessControlInterface
    {
        return $this->old;
    }
}
