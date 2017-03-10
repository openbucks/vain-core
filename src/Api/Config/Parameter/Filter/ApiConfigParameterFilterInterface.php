<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-core
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-core
 */

namespace Vain\Core\Api\Config\Parameter\Filter;

use Vain\Core\Api\Config\Parameter\Result\ApiConfigParameterResultInterface;

/**
 * Class ApiConfigParameterSourceInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ApiConfigParameterFilterInterface
{
    /**
     * @param array $data
     *
     * @return ApiConfigParameterResultInterface
     */
    public function filter(array $data): ApiConfigParameterResultInterface;
}