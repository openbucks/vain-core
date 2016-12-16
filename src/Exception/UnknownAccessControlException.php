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

use Vain\Core\Security\Access\Storage\AccessControlStorageInterface;

/**
 * Class UnknownAccessControlException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnknownAccessControlException extends AccessControlStorageException
{
    /**
     * UnknownAccessControlException constructor.
     *
     * @param AccessControlStorageInterface $accessControlStorage
     * @param string                        $name
     */
    public function __construct(AccessControlStorageInterface $accessControlStorage, string $name)
    {
        parent::__construct($accessControlStorage, sprintf('Unknown access control %s', $name));
    }
}
