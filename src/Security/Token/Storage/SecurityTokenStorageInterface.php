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
use Vain\Core\Security\Token\Provider\SecurityTokenProviderInterface;
use Vain\Core\Security\Token\SecurityTokenInterface;

/**
 * Interface SecurityTokenStorageInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface SecurityTokenStorageInterface
{

    /**
     * @param SecurityTokenProviderInterface $tokenProvider
     *
     * @return SecurityTokenStorageInterface
     */
    public function addProvider(SecurityTokenProviderInterface $tokenProvider) : SecurityTokenStorageInterface;

    /**
     * @param string                 $type
     * @param ServerRequestInterface $request
     *
     * @return SecurityTokenInterface
     */
    public function getToken(string $type, ServerRequestInterface $request) : SecurityTokenInterface;
}
