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
use Vain\Core\Api\Config\Parameter\Filter\Factory\Storage\ApiConfigParameterFilterFactoryStorageInterface;
use Vain\Core\Api\Config\Parameter\Source\Factory\Storage\ApiConfigParameterSourceFactoryStorageInterface;

/**
 * Class ApiParameterConfigFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiParameterConfigFactory implements ApiParameterConfigFactoryInterface
{
    private $filterFactoryStorage;

    private $sourceFactoryStorage;

    /**
     * ApiParameterConfigFactory constructor.
     *
     * @param ApiConfigParameterFilterFactoryStorageInterface $filterFactoryStorage
     * @param ApiConfigParameterSourceFactoryStorageInterface $sourceFactoryStorage
     */
    public function __construct(
        ApiConfigParameterFilterFactoryStorageInterface $filterFactoryStorage,
        ApiConfigParameterSourceFactoryStorageInterface $sourceFactoryStorage
    ) {
        $this->filterFactoryStorage = $filterFactoryStorage;
        $this->sourceFactoryStorage = $sourceFactoryStorage;
    }

    /**
     * @inheritDoc
     */
    public function createParameterConfig(
        string $name,
        array $configData
    ): ApiParameterConfigInterface {

        return new ApiParameterConfig(
            $name,
            $configData,
            $this->sourceFactoryStorage->getFactory($configData['source'])->createSource(
                $name,
                $configData
            ),
            $this->filterFactoryStorage->getFactory($configData['type'])->createFilter(
                $configData
            )
        );
    }
}
