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

use Vain\Core\Api\Config\Parameter\ApiParameterConfigInterface;
use Vain\Core\Api\Config\Parameter\Factory\ApiParameterConfigFactoryInterface;
use Vain\Core\Security\Config\Factory\SecurityConfigFactoryInterface;
use Vain\Core\Security\Config\SecurityConfigInterface;

/**
 * Class AbstractApiConfigFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractApiConfigFactory implements ApiConfigFactoryInterface
{
    private $securityConfigFactory;

    private $parameterConfigFactory;

    /**
     * AssertApiConfigFactory constructor.
     *
     * @param SecurityConfigFactoryInterface $securityConfigFactory
     * @param ApiParameterConfigFactoryInterface $parameterConfigFactory
     */
    public function __construct(
        SecurityConfigFactoryInterface $securityConfigFactory,
        ApiParameterConfigFactoryInterface $parameterConfigFactory
    ) {
        $this->securityConfigFactory = $securityConfigFactory;
        $this->parameterConfigFactory = $parameterConfigFactory;
    }

    /**
     * @return ApiParameterConfigFactoryInterface
     */
    public function getParameterConfigFactory(): ApiParameterConfigFactoryInterface
    {
        return $this->parameterConfigFactory;
    }

    /**
     * @param string $endpointName
     * @param array  $securityConfig
     *
     * @return SecurityConfigInterface
     */
    public function createSecurityConfig(string $endpointName, array $securityConfig) : SecurityConfigInterface
    {
        return $this->securityConfigFactory->createSecurityConfig($endpointName, $securityConfig);
    }

    /**
     * @param array  $parametersData
     *
     * @return ApiParameterConfigInterface[]
     */
    public function createParameterConfigs(array $parametersData) : array
    {
        $parameterConfigs = [];
        foreach ($parametersData as $name => $parameterConfig) {
            $parameterConfigs[] = $this->getParameterConfigFactory()->createParameterConfig(
                $name,
                $parameterConfig
            );
        }

        return $parameterConfigs;
    }
}
