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

use Vain\Core\Api\Config\Parameter\Source\ApiConfigBodySource;
use Vain\Core\Api\Config\Parameter\Source\ApiConfigParameterSourceInterface;

/**
 * Class ApiConfigParameterBodyFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiConfigParameterBodyFactory implements ApiConfigParameterSourceFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'body';
    }

    /**
     * @inheritDoc
     */
    public function createSource($name, array $config): ApiConfigParameterSourceInterface
    {
        return new ApiConfigBodySource(
            $config['source_name'] ?? $name,
            $name,
            $config['optional'] ?? false,
            $config['default'] ?? null
        );
    }
}
