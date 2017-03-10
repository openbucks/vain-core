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

namespace Vain\Core\Api\Config\Parameter\Source\Factory;

use Vain\Core\Api\Config\Parameter\Source\ApiConfigCookieSource;
use Vain\Core\Api\Config\Parameter\Source\ApiConfigParameterSourceInterface;

/**
 * Class ApiConfigParameterCookieFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiConfigParameterCookieFactory implements ApiConfigParameterSourceFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function getName() : string
    {
        return 'cookie';
    }

    /**
     * @inheritDoc
     */
    public function createSource($name, array $config): ApiConfigParameterSourceInterface
    {
        return new ApiConfigCookieSource(
            $config['source_name'] ?? $name,
            $name,
            $config['optional'] ?? false,
            $config['default'] ?? null
        );
    }
}
