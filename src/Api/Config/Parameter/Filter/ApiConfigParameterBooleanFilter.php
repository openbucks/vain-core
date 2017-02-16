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
use Vain\Core\Api\Config\Parameter\Result\ApiParameterWrongTypeResult;

/**
 * Class ApiConfigParameterBooleanFilter
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiConfigParameterBooleanFilter extends AbstractApiConfigParameterFilter
{
    /**
     * @inheritDoc
     */
    public function doFilter(string $name, $element): ApiConfigParameterResultInterface
    {
        if (null === ($boolean = filter_var($element, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE))) {
            return new ApiParameterWrongTypeResult($name, 'boolean', $element);
        }

        return new ApiConfigParameterSuccessfulResult($boolean);
    }
}
