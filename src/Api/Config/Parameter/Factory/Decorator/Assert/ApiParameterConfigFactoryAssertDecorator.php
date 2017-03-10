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

namespace Vain\Core\Api\Config\Parameter\Factory\Decorator\Assert;

use Vain\Core\Api\Config\Parameter\ApiParameterConfigInterface;
use Vain\Core\Api\Config\Parameter\Factory\Decorator\AbstractApiParameterConfigFactoryDecorator;
use Vain\Core\Exception\NoRequiredFieldParameterFactoryException;

/**
 * Class ApiParameterConfigFactoryAssertDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiParameterConfigFactoryAssertDecorator extends AbstractApiParameterConfigFactoryDecorator
{
    /**
     * @inheritDoc
     */
    public function createParameterConfig(
        string $name,
        array $configData
    ) : ApiParameterConfigInterface
    {
        foreach (['source', 'type'] as $requiredField) {
            if (false === array_key_exists($requiredField, $configData)) {
                throw new NoRequiredFieldParameterFactoryException($this, $name, $requiredField);
            }
        }

        return parent::createParameterConfig($name, $configData);
    }
}
