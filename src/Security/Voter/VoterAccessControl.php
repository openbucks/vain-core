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

namespace Vain\Core\Security\Voter;

use Psr\Http\Message\ServerRequestInterface;
use Vain\Core\Security\Access\AbstractAccessControl;
use Vain\Core\Security\Resource\Provider\Storage\ResourceProviderStorageInterface;
use Vain\Core\Security\Token\SecurityTokenInterface;
use Vain\Core\Security\Voter\Strategy\Storage\SecurityVoterStrategyStorageInterface;

/**
 * Class VoterAccessControl
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class VoterAccessControl extends AbstractAccessControl
{
    private $providerStorage;

    private $strategyStorage;

    /**
     * VoterAccessControl constructor.
     *
     * @param ResourceProviderStorageInterface      $providerStorage
     * @param SecurityVoterStrategyStorageInterface $strategyStorage
     */
    public function __construct(
        ResourceProviderStorageInterface $providerStorage,
        SecurityVoterStrategyStorageInterface $strategyStorage
    ) {
        $this->providerStorage = $providerStorage;
        $this->strategyStorage = $strategyStorage;
    }

    /**
     * @inheritDoc
     */
    public function getName() : string
    {
        return 'voter';
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

        return $this->strategyStorage
            ->getStrategy($accessConfigData['strategy'])
            ->decide($accessConfigData['voters'], $token, $resource);
    }
}
