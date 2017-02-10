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
 * Class ApiConfigParameterDecimalFilter
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiConfigParameterDecimalFilter extends AbstractApiConfigParameterFilter
{
    private $precision;

    private $scale;

    /**
     * ApiConfigParameterDecimalFilter constructor.
     *
     * @param int $precision
     * @param int $scale
     */
    public function __construct(int $precision, int $scale)
    {
        $this->precision = $precision;
        $this->scale = $scale;
    }

    /**
     * @inheritDoc
     */
    public function doFilter(string $name, $element): ApiConfigParameterResultInterface
    {
        if (null === ($decimal = filter_var($element, FILTER_VALIDATE_FLOAT, FILTER_NULL_ON_FAILURE))) {
            return new ApiConfigParameterFailedResult(sprintf('Parameter %s is not a valid decimal', $name));
        }
        $format = sprintf('%%01.%df', $this->scale);
        $value = sprintf($format, $decimal);

        if (strlen($value) > $this->precision + 1) {
            return new ApiConfigParameterFailedResult(
                sprintf('Parameter %s exceeds precision range (%d, %d)', $name, $this->precision, $this->scale)
            );
        }

        return new ApiConfigParameterSuccessfulResult($value);
    }
}
