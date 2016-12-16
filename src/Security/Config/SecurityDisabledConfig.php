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

namespace Vain\Core\Security\Config;

/**
 * Class SecurityDisabledConfig
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class SecurityDisabledConfig extends AbstractSecurityConfig
{
    /**
     * @inheritDoc
     */
    public function isEnabled() : bool
    {
        return false;
    }
}
