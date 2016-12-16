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

namespace Vain\Core\Security\Ownership;

use Psr\Http\Message\ServerRequestInterface;
use Vain\Core\Security\Access\AbstractAccessControl;
use Vain\Core\Security\Resource\Provider\Storage\ResourceProviderStorageInterface;
use Vain\Core\Security\Token\SecurityTokenInterface;

/**
 * Class OwnershipAccessControl
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class OwnershipAccessControl extends AbstractAccessControl
{

    private $providerStorage;

    /**
     * OwnershipAccessControl constructor.
     *
     * @param ResourceProviderStorageInterface $providerStorage
     */
    public function __construct(ResourceProviderStorageInterface $providerStorage)
    {
        $this->providerStorage = $providerStorage;
    }

    /**
     * @inheritDoc
     */
    public function getName() : string
    {
        return 'ownership';
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
        $resource = $accessConfigData['resource'];
        if (null ===
            ($resource = $this->providerStorage->getResourceProvider($resource)->getResource(
                $resource,
                $request
            ))
        ) {
            return false;
        }

        switch ($accessConfigData['belongs_to']) {
            case 'anyone':
            case 'guest':
                return true;
            case 'user':
            case 'owner':
                return $resource->isOwnedBy($token->getUser());
                break;
            case 'subordinates':
            case 'hierarchy':
                return $resource->isConformedTo($token->getUser());
                break;
            default:
                return false;
        }
    }
}
