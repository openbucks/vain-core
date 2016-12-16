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

namespace Vain\Core\Security\Config\Factory\Decorator\Assert;

use Vain\Core\Security\Config\Factory\Decorator\AbstractSecurityConfigFactoryDecorator;
use Vain\Core\Security\Config\SecurityConfigInterface;
use Vain\Core\Exception\NoRequiredFieldConfigFactoryException;

/**
 * Class SecurityConfigFactoryAssertDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class SecurityConfigFactoryAssertDecorator extends AbstractSecurityConfigFactoryDecorator
{
    /**
     * @inheritDoc
     */
    public function createSecurityConfig(string $endpointName, array $configData) : SecurityConfigInterface
    {
        foreach ([
                     SecurityConfigInterface::FIELD_ENABLED,
                     SecurityConfigInterface::FIELD_AUTH,
                 ] as $requiredField) {
            if (false === array_key_exists($requiredField, $configData)) {
                throw new NoRequiredFieldConfigFactoryException($this, $endpointName, $requiredField);
            }
        }

        if ($configData[SecurityConfigInterface::FIELD_ENABLED]) {
            foreach ([
                         SecurityConfigInterface::FIELD_PERMISSION,
                         SecurityConfigInterface::FIELD_SCOPE,
                         SecurityConfigInterface::FIELD_STRATEGY,
                         SecurityConfigInterface::FIELD_ACCESS_CONTROLS,
                     ] as $requiredField) {
                if (false === array_key_exists($requiredField, $configData)) {
                    throw new NoRequiredFieldConfigFactoryException($this, $endpointName, $requiredField);
                }
            }
        }

        return parent::createSecurityConfig($endpointName, $configData);
    }
}
