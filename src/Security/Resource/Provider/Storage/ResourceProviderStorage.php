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

namespace Vain\Core\Security\Resource\Provider\Storage;

use Vain\Core\Exception\DuplicateResourceProviderException;
use Vain\Core\Exception\UnknownResourceProviderException;
use Vain\Core\Api\Resource\Provider\ApiResourceProviderInterface;

/**
 * Class ResourceProviderStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ResourceProviderStorage implements ResourceProviderStorageInterface
{
    /**
     * @var ApiResourceProviderInterface[]
     */
    private $providers = [];

    /**
     * ResourceProvider constructor.
     *
     * @param ApiResourceProviderInterface[] $resourceProviders
     */
    public function __construct(array $resourceProviders = [])
    {
        foreach ($resourceProviders as $resourceProvider) {
            $this->addProvider($resourceProvider);
        }
    }

    /**
     * @inheritDoc
     */
    public function getName() : string
    {
        return 'composite';
    }

    /**
     * @param ApiResourceProviderInterface $provider
     *
     * @return ResourceProviderStorageInterface
     *
     * @throws DuplicateResourceProviderException
     */
    public function addProvider(ApiResourceProviderInterface $provider) : ResourceProviderStorageInterface
    {
        $name = $provider->getName();
        if (array_key_exists($provider->getName(), $this->providers)) {
            throw new DuplicateResourceProviderException($this, $name, $provider, $this->providers[$name]);
        }
        $this->providers[$name] = $provider;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getResourceProvider(string $resourceName) : ApiResourceProviderInterface
    {
        if (false === array_key_exists($resourceName, $this->providers)) {
            throw new UnknownResourceProviderException($this, $resourceName);
        }

        return $this->providers[$resourceName];
    }
}
