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

use Vain\Core\Api\Config\Parameter\Result\ApiConfigParameterFailedResult;
use Vain\Core\Api\Config\Parameter\Result\ApiConfigParameterResultInterface;
use Vain\Core\Api\Config\Parameter\Result\ApiConfigParameterSuccessfulResult;

/**
 * Class ApiConfigParameterInetFilter
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiConfigParameterInetFilter extends AbstractApiConfigParameterFilter
{
    /**
     * @inheritDoc
     */
    public function doFilter(string $name, $element): ApiConfigParameterResultInterface
    {
        if (null === ($ip = filter_var($element, FILTER_VALIDATE_IP, FILTER_NULL_ON_FAILURE))) {
            return new ApiConfigParameterFailedResult(sprintf('Parameter %s is not a valid ip address', $name));
        }

        return new ApiConfigParameterSuccessfulResult($ip);
    }
}