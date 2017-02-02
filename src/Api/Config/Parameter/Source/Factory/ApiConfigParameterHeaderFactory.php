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

use Vain\Core\Api\Config\Parameter\Source\ApiConfigHeaderSource;
use Vain\Core\Api\Config\Parameter\Source\ApiConfigParameterSourceInterface;

/**
 * Class ApiConfigParameterHeaderFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiConfigParameterHeaderFactory implements ApiConfigParameterSourceFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function getName() : string
    {
        return 'header';
    }

    /**
     * @inheritDoc
     */
    public function createSource($name, array $config): ApiConfigParameterSourceInterface
    {
        return new ApiConfigHeaderSource(
            $config['source_name'] ?? $name,
            $name,
            $config['optional'] ?? false,
            $config['default'] ?? null
        );
    }
}
