<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   api_V2
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/api_V2
 */
declare(strict_types = 1);

namespace Vain\Core\Api\Config\Provider;

use Vain\Core\Api\Config\ApiConfigInterface;

/**
 * Interface ApiConfigProviderInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ApiConfigProviderInterface
{
    /**
     * @param string $endpointName
     *
     * @return ApiConfigInterface
     */
    public function getConfig(string $endpointName) : ApiConfigInterface;
}
