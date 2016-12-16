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

namespace Vain\Core\Security\Context;

use Vain\Core\Security\Token\SecurityTokenInterface;

/**
 * Interface SecurityContextInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface SecurityContextInterface
{
    /**
     * @param SecurityTokenInterface $token
     *
     * @return SecurityContextInterface
     */
    public function setToken(SecurityTokenInterface $token) : SecurityContextInterface;

    /**
     * @return SecurityTokenInterface
     */
    public function getToken() : SecurityTokenInterface;
}
