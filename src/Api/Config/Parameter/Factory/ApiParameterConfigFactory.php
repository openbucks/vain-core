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

namespace Vain\Core\Api\Config\Parameter\Factory;

use Vain\Core\Api\Config\Parameter\ApiParameterConfig;
use Vain\Core\Api\Config\Parameter\ApiParameterConfigInterface;

/**
 * Class ApiParameterConfigFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiParameterConfigFactory implements ApiParameterConfigFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function createParameterConfig(string $endpointName, string $name, array $configData) : ApiParameterConfigInterface
    {
        $source = $configData['source'];
        $type = $configData['type'];
        $sourceName = $name;
        $optional = false;
        $defaultValue = null;

        if (array_key_exists('source_name', $configData)) {
            $sourceName = $configData['source_name'];
        }

        if (array_key_exists('optional', $configData)) {
            $optional = (bool)$configData['optional'];
        }

        if (array_key_exists('default', $configData)) {
            $defaultValue = $configData['default'];
        }

        return new ApiParameterConfig($name, $sourceName, $type, $source, $optional, $defaultValue);
    }
}
