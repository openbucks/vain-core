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

namespace Vain\Core\Api\Config\Factory;

use Vain\Core\Api\Config\ApiConfig;
use Vain\Core\Api\Config\ApiConfigInterface;

/**
 * Class TrustApiConfigFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiConfigFactory extends AbstractApiConfigFactory
{
    /**
     * @inheritDoc
     */
    public function createConfig(string $endpointName, array $configData) : ApiConfigInterface
    {
        $parametersData = array_key_exists('parameters', $configData) ? $configData['parameters'] : [];

        return new ApiConfig(
            $endpointName,
            $configData[ApiConfigInterface::FIELD_HANDLER_ALIAS],
            $configData[ApiConfigInterface::FIELD_URL],
            $configData[ApiConfigInterface::FIELD_METHOD],
            $this->createSecurityConfig($endpointName, $configData[ApiConfigInterface::FIELD_SECURITY]),
            $this->createParameterConfigs($parametersData)
        );
    }
}
