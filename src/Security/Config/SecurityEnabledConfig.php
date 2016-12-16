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
 * Class SecurityEnabledConfig
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class SecurityEnabledConfig extends AbstractSecurityConfig
{
    /**
     * @inheritDoc
     */
    public function isEnabled() : bool
    {
        return true;
    }
}
