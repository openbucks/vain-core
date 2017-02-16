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
declare(strict_types = 1);

namespace Vain\Core\Api\Config\Parameter\Filter;

use Vain\Core\Api\Config\Parameter\Result\ApiConfigParameterResultInterface;
use Vain\Core\Api\Config\Parameter\Result\ApiConfigParameterSuccessfulResult;
use Vain\Core\Api\Config\Parameter\Result\ApiConfigParameterWrongTypeResult;

/**
 * Class ApiConfigParameterFloatFilter
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiConfigParameterFloatFilter extends AbstractApiConfigParameterFilter
{
    /**
     * @inheritDoc
     */
    public function doFilter(string $name, $element): ApiConfigParameterResultInterface
    {
        if (false === ($float = filter_var($element, FILTER_VALIDATE_FLOAT))) {
            return new ApiConfigParameterWrongTypeResult($name, 'float', $element);
        }

        return new ApiConfigParameterSuccessfulResult($float);
    }
}
