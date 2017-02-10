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

use Vain\Core\Api\Config\Parameter\Filter\ApiConfigParameterDecimalFilter;
use Vain\Core\Api\Config\Parameter\Filter\ApiConfigParameterFilterInterface;

/**
 * Class ApiConfigParameterDecimalFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiConfigParameterDecimalFactory implements ApiConfigParameterFilterFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function getName() : string
    {
        return 'decimal';
    }

    /**
     * @inheritDoc
     */
    public function createFilter(array $config): ApiConfigParameterFilterInterface
    {
        $precision = $config['precision'] ?? 10;
        $scale = $config['scale'] ?? 4;

        return new ApiConfigParameterDecimalFilter($precision, $scale);
    }
}
