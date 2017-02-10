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

use Vain\Core\Api\Config\Parameter\Filter\ApiConfigParameterBooleanFilter;
use Vain\Core\Api\Config\Parameter\Filter\ApiConfigParameterFilterInterface;

/**
 * Class ApiConfigParameterBooleanFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiConfigParameterBooleanFactory implements ApiConfigParameterFilterFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function getName() : string
    {
        return 'bool';
    }

    /**
     * @inheritDoc
     */
    public function createFilter(array $config): ApiConfigParameterFilterInterface
    {
        return new ApiConfigParameterBooleanFilter($config['optional'] ?? false, $config['default'] ?? null);
    }
}
