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

use Vain\Core\Api\Config\ApiConfigInterface;

/**
 * Interface ApiConfigFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ApiConfigFactoryInterface
{
    /**
     * @param string $endpointName
     * @param array  $configData
     *
     * @return ApiConfigInterface
     */
    public function createConfig(string $endpointName, array $configData) : ApiConfigInterface;
}
