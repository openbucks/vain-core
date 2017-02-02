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

use Vain\Core\Api\Config\Parameter\Filter\ApiConfigParameterArrayFilter;
use Vain\Core\Api\Config\Parameter\Filter\ApiConfigParameterFilterInterface;

/**
 * Class ApiConfigParameterArrayFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiConfigParameterArrayFactory implements ApiConfigParameterFilterFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function getName() : string
    {
        return 'array';
    }

    /**
     * @inheritDoc
     */
    public function createFilter(array $config): ApiConfigParameterFilterInterface
    {
        return new ApiConfigParameterArrayFilter();
    }
}
