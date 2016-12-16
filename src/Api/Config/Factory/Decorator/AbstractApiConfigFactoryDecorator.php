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

namespace Vain\Core\Api\Config\Factory\Decorator;

use Vain\Core\Api\Config\ApiConfigInterface;
use Vain\Core\Api\Config\Factory\ApiConfigFactoryInterface;

/**
 * Class AbstractApiConfigFactoryDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractApiConfigFactoryDecorator implements ApiConfigFactoryInterface
{
    private $apiConfigFactory;

    /**
     * AbstractApiConfigFactoryDecorator constructor.
     *
     * @param ApiConfigFactoryInterface $apiConfigFactory
     */
    public function __construct(ApiConfigFactoryInterface $apiConfigFactory)
    {
        $this->apiConfigFactory = $apiConfigFactory;
    }

    /**
     * @inheritDoc
     */
    public function createConfig(string $endpointName, array $configData) : ApiConfigInterface
    {
        return $this->apiConfigFactory->createConfig($endpointName, $configData);
    }
}
