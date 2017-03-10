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

use Vain\Core\Api\Config\Parameter\Source\ApiConfigParameterSourceInterface;
use Vain\Core\Api\Config\Parameter\Source\ApiConfigQuerySource;

/**
 * Class ApiConfigParameterQueryFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiConfigParameterQueryFactory implements ApiConfigParameterSourceFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function getName() : string
    {
        return 'query';
    }

    /**
     * @inheritDoc
     */
    public function createSource($name, array $config): ApiConfigParameterSourceInterface
    {
        return new ApiConfigQuerySource(
            $config['source_name'] ?? $name,
            $name,
            $config['optional'] ?? false,
            $config['default'] ?? null
        );
    }
}
