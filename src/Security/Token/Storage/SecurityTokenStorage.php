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

namespace Vain\Core\Security\Token\Storage;

use Psr\Http\Message\ServerRequestInterface;
use Vain\Core\Exception\DuplicateTokenProviderException;
use Vain\Core\Exception\UnknownTokenProviderException;
use Vain\Core\Security\Token\Provider\SecurityTokenProviderInterface;
use Vain\Core\Security\Token\SecurityTokenInterface;

/**
 * Class SecurityTokenStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class SecurityTokenStorage implements SecurityTokenStorageInterface
{
    /**
     * @var SecurityTokenProviderInterface[]
     */
    private $tokenProviders = [];

    /**
     * SecurityTokenStorage constructor.
     *
     * @param SecurityTokenProviderInterface[] $tokenProviders
     */
    public function __construct(array $tokenProviders = [])
    {
        foreach ($tokenProviders as $tokenProvider) {
            $this->addProvider($tokenProvider);
        }
    }

    /**
     * @inheritDoc
     */
    public function addProvider(SecurityTokenProviderInterface $tokenProvider) : SecurityTokenStorageInterface
    {
        $name = $tokenProvider->getName();
        if (array_key_exists($name, $this->tokenProviders)) {
            throw new DuplicateTokenProviderException($this, $name, $tokenProvider, $this->tokenProviders[$name]);
        }
        $this->tokenProviders[$name] = $tokenProvider;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getToken(string $type, ServerRequestInterface $request) : SecurityTokenInterface
    {
        if (false === array_key_exists($type, $this->tokenProviders)) {
            throw new UnknownTokenProviderException($this, $type);
        }

        return $this->tokenProviders[$type]->getToken($request);
    }
}
