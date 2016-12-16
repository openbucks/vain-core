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

namespace Vain\Core\Security\OAuth\Token\Provider;

use Vain\Core\Security\OAuth\Client\OAuthClientInterface;
use Vain\Core\Security\Token\Provider\SecurityTokenProviderInterface;
use Vain\Core\Security\Token\SecurityTokenInterface;
use Vain\Core\Security\User\SecurityUserInterface;

/**
 * Class OAuthTokenProviderInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface OAuthTokenProviderInterface extends SecurityTokenProviderInterface
{
    /**
     * @param SecurityUserInterface  $user
     * @param OAuthClientInterface $client
     * @param array                $permissions
     *
     * @return SecurityTokenInterface
     */
    public function createToken(
        SecurityUserInterface $user,
        OAuthClientInterface $client,
        array $permissions
    ) : SecurityTokenInterface;
}