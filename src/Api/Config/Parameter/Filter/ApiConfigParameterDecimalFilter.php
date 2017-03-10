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
     * @param int   $precision
     * @param int   $scale
     * @param bool  $isOptional
     * @param mixed $default
     */
    public function __construct(int $precision, int $scale, bool $isOptional = false, $default = null)
    {
        $this->precision = $precision;
        $this->scale = $scale;
        parent::__construct($isOptional, $default);
    }

    /**
     * @inheritDoc
     */
    public function doFilter(string $name, $element): ApiConfigParameterResultInterface
    {
        if (false === ($decimal = filter_var($element, FILTER_VALIDATE_FLOAT))) {
            return new ApiParameterWrongTypeResult(
                $name,
                sprintf('decimal (%s,%s)', $this->scale, $this->precision),
                $element
            );
        }
        $format = sprintf('%%01.%df', $this->scale);
        $value = sprintf($format, $decimal);

        if (strlen($value) > $this->precision + 1) {
            return new ApiParameterWrongTypeResult(
                $name,
                sprintf('decimal (%s,%s)', $this->scale, $this->precision),
                $element
            );
        }

        return new ApiConfigParameterSuccessfulResult($value);
    }
}
