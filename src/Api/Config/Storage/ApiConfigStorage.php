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

namespace Vain\Core\Api\Config\Storage;

use Vain\Core\Api\Config\ApiConfigInterface;
use Vain\Core\Api\Config\Factory\ApiConfigFactoryInterface;
use Vain\Core\Exception\UnknownRouteException;

/**
 * Class ApiConfigStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiConfigStorage implements ApiConfigStorageInterface
{

    private $apiConfig;

    private $apiConfigFactory;

    private $configs;

    /**
     * ApiConfigStorage constructor.
     *
     * @param \ArrayAccess              $apiConfig
     * @param ApiConfigFactoryInterface $apiConfigFactory
     */
    public function __construct(\ArrayAccess $apiConfig, ApiConfigFactoryInterface $apiConfigFactory)
    {
        $this->apiConfig = $apiConfig;
        $this->apiConfigFactory = $apiConfigFactory;
    }

    /**
     * @param string $endpointName
     *
     * @return ApiConfigInterface
     * @throws UnknownRouteException
     */
    public function createConfig(string $endpointName) : ApiConfigInterface
    {
        if (false === $this->apiConfig->offsetExists($endpointName)) {
            throw new UnknownRouteException($this, $endpointName);
        }

        return $this->apiConfigFactory->createConfig($endpointName, $this->apiConfig->offsetGet($endpointName));
    }

    /**
     * @inheritDoc
     */
    public function getConfig(string $endpointName) : ApiConfigInterface
    {
        if (false == array_key_exists($endpointName, $this->configs)) {
            $this->configs[$endpointName] = $this->createConfig($endpointName);
        }

        return $this->configs[$endpointName];
    }

    /**
     * @inheritDoc
     */
    public function getConfigs() : array
    {
        foreach ($this->apiConfig as $routeName => $configData) {
            $this->configs[$routeName] = $this->apiConfigFactory->createConfig($routeName, $configData);
        }

        return $this->configs;
    }
}
