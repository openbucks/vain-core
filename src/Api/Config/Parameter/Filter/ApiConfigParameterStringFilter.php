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
declare(strict_types=1);

namespace Vain\Core\Api\Config\Parameter\Filter;

use Vain\Core\Api\Config\Parameter\Result\ApiConfigParameterResultInterface;
use Vain\Core\Api\Config\Parameter\Result\ApiConfigParameterSuccessfulResult;
use Vain\Core\Api\Config\Parameter\Result\ApiParameterWrongTypeResult;

/**
 * Class ApiConfigParameterStringFilter
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiConfigParameterStringFilter extends AbstractApiConfigParameterFilter
{
    /**
     * @inheritDoc
     */
    public function doFilter(string $name, $element): ApiConfigParameterResultInterface
    {
        if (false === ($string = filter_var(
                $element,
                FILTER_SANITIZE_STRING,
                ['flags' => FILTER_FLAG_EMPTY_STRING_NULL | FILTER_FLAG_NO_ENCODE_QUOTES | FILTER_FLAG_STRIP_LOW]
            ))
        ) {
            return new ApiParameterWrongTypeResult($name, 'string', $element);
        }

        return new ApiConfigParameterSuccessfulResult($string);
    }
}
