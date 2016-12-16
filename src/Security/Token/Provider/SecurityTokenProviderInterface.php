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

namespace Vain\Core\Security\Token\Provider;

use Psr\Http\Message\ServerRequestInterface;
use Vain\Core\Name\NameableInterface;
use Vain\Core\Security\Token\SecurityTokenInterface;

/**
 * Interface SecurityTokenProviderInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface SecurityTokenProviderInterface extends NameableInterface
{
    /**
     * @param ServerRequestInterface $request
     *
     * @return SecurityTokenInterface
     */
    public function getToken(ServerRequestInterface $request) : SecurityTokenInterface;
}
