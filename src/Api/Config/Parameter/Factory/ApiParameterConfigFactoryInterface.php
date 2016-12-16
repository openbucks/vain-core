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

use Vain\Core\Api\Config\Parameter\ApiParameterConfigInterface;

/**
 * Interface ApiParameterConfigFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ApiParameterConfigFactoryInterface
{
    /**
     * @param string $endpointName
     * @param string $name
     * @param array  $configData
     *
     * @return ApiParameterConfigInterface
     */
    public function createParameterConfig(
        string $endpointName,
        string $name,
        array $configData
    ) : ApiParameterConfigInterface;
}
