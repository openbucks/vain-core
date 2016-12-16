<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-api
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-api
 */
declare(strict_types = 1);

namespace Vain\Core\Api\Config\Factory\Decorator\Assert;

use Vain\Core\Api\Config\ApiConfigInterface;
use Vain\Core\Api\Config\Factory\Decorator\AbstractApiConfigFactoryDecorator;
use Vain\Core\Exception\NoRequiredFieldConfigFactoryException;

/**
 * Class ApiConfigFactoryAssertDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiConfigFactoryAssertDecorator extends AbstractApiConfigFactoryDecorator
{
    /**
     * @inheritDoc
     */
    public function createConfig(string $endpointName, array $configData) : ApiConfigInterface
    {
        foreach ([
                     ApiConfigInterface::FIELD_METHOD,
                     ApiConfigInterface::FIELD_HANDLER_ALIAS,
                     ApiConfigInterface::FIELD_URL,
                 ] as $requiredField) {
            if (false === array_key_exists($requiredField, $configData)) {
                throw new NoRequiredFieldConfigFactoryException($this, $endpointName, $requiredField);
            }
        }

        return parent::createConfig($endpointName, $configData);
    }
}
