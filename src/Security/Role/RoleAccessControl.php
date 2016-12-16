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

namespace Vain\Core\Security\Role;

use Psr\Http\Message\ServerRequestInterface;
use Vain\Core\Security\Access\AbstractAccessControl;
use Vain\Core\Security\Role\Hierarchy\RoleHierarchyInterface;
use Vain\Core\Security\Token\SecurityTokenInterface;

/**
 * Class RoleAccessControl
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class RoleAccessControl extends AbstractAccessControl
{
    private $roleHierarchy;

    /**
     * RoleAccessControl constructor.
     *
     * @param RoleHierarchyInterface $roleHierarchy
     */
    public function __construct(RoleHierarchyInterface $roleHierarchy)
    {
        $this->roleHierarchy = $roleHierarchy;
    }

    /**
     * @inheritDoc
     */
    public function getName() : string
    {
        return 'role';
    }

    /**
     * @inheritDoc
     */
    public function doIsAllowed(
        array $accessConfigData,
        SecurityTokenInterface $token,
        ServerRequestInterface $request
    ) : bool
    {
        return $this->roleHierarchy->isReachable($accessConfigData['name'], $token->getUser()->getRoles());
    }
}
