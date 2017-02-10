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

namespace Vain\Core\Api\Config\Parameter\Filter\Factory;

use Vain\Core\Api\Config\Parameter\Filter\ApiConfigParameterFilterInterface;
use Vain\Core\Api\Config\Parameter\Filter\ApiConfigParameterFloatFilter;

/**
 * Class ApiConfigParameterFloatFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiConfigParameterFloatFactory implements ApiConfigParameterFilterFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function getName() : string
    {
        return 'float';
    }

    /**
     * @inheritDoc
     */
    public function createFilter(array $config): ApiConfigParameterFilterInterface
    {
        return new ApiConfigParameterFloatFilter($config['optional'] ?? false, $config['default'] ?? null);
    }
}
