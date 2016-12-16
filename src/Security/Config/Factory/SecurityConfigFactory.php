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

namespace Vain\Core\Security\Config\Factory;

use Vain\Core\Security\Config\SecurityConfigInterface;
use Vain\Core\Security\Config\SecurityDisabledConfig;
use Vain\Core\Security\Config\SecurityEnabledConfig;

/**
 * Class SecurityConfigFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class SecurityConfigFactory implements SecurityConfigFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function createSecurityConfig(string $endpointName, array $configData) : SecurityConfigInterface
    {
        if (array_key_exists(SecurityConfigInterface::FIELD_ENABLED, $configData)
            && false === $configData[SecurityConfigInterface::FIELD_ENABLED]
        ) {
            return new SecurityDisabledConfig($configData[SecurityConfigInterface::FIELD_AUTH]);
        }

        return new SecurityEnabledConfig(
            $configData[SecurityConfigInterface::FIELD_AUTH],
            $configData[SecurityConfigInterface::FIELD_PERMISSION],
            $configData[SecurityConfigInterface::FIELD_SCOPE],
            $configData[SecurityConfigInterface::FIELD_ACCESS_CONTROLS],
            $configData[SecurityConfigInterface::FIELD_STRATEGY]
        );
    }
}
