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
use Vain\Core\Api\Config\Parameter\Filter\ApiConfigParameterStringFilter;

/**
 * Class ApiConfigParameterStringFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiConfigParameterStringFactory implements ApiConfigParameterFilterFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'string';
    }

    /**
     * @inheritDoc
     */
    public function createFilter(array $config): ApiConfigParameterFilterInterface
    {
        return new ApiConfigParameterStringFilter();
    }
}
