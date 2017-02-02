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

namespace Vain\Core\Api\Config\Parameter\Factory\Decorator;

use Vain\Core\Api\Config\Parameter\ApiParameterConfigInterface;
use Vain\Core\Api\Config\Parameter\Factory\ApiParameterConfigFactoryInterface;

/**
 * Class AbstractApiParameterConfigFactoryDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class AbstractApiParameterConfigFactoryDecorator implements ApiParameterConfigFactoryInterface
{

    private $parameterConfigFactory;

    /**
     * AbstractApiParameterConfigFactoryDecorator constructor.
     *
     * @param ApiParameterConfigFactoryInterface $parameterConfigFactory
     */
    public function __construct(ApiParameterConfigFactoryInterface $parameterConfigFactory)
    {
        $this->parameterConfigFactory = $parameterConfigFactory;
    }

    /**
     * @inheritDoc
     */
    public function createParameterConfig(
        string $name,
        array $configData
    ) : ApiParameterConfigInterface
    {
        return $this->parameterConfigFactory->createParameterConfig($name, $configData);
    }
}
