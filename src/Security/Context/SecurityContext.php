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
 * Class SecurityContext
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class SecurityContext implements SecurityContextInterface
{
    private $token = null;

    /**
     * @inheritDoc
     */
    public function setToken(SecurityTokenInterface $token) : SecurityContextInterface
    {
        $this->token = $token;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getToken() : SecurityTokenInterface
    {
        return $this->token;
    }
}
