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
        if (false === ($ip = filter_var($element, FILTER_VALIDATE_IP))) {
            return new ApiConfigParameterWrongTypeResult($name, 'ip address', $element);
        }

        return new ApiConfigParameterSuccessfulResult($ip);
    }
}
