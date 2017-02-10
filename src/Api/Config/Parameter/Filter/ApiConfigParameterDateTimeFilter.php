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
use Vain\Core\Time\Factory\TimeFactoryInterface;

/**
 * Class ApiConfigParameterDateTimeFilter
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiConfigParameterDateTimeFilter extends AbstractApiConfigParameterFilter
{
    private $timeFactory;

    /**
     * ApiValidatorDateTimeModule constructor.
     *
     * @param TimeFactoryInterface $timeFactory
     */
    public function __construct(TimeFactoryInterface $timeFactory)
    {
        $this->timeFactory = $timeFactory;
    }

    /**
     * @inheritDoc
     */
    public function doFilter(string $name, $element): ApiConfigParameterResultInterface
    {
        if (false === ($dateTime = filter_var($element, FILTER_SANITIZE_STRING))) {
            return new ApiConfigParameterFailedResult(
                sprintf('Parameter %s [%s] is not a valid time string', $name, var_export($element, true))
            );
        }

        return new ApiConfigParameterSuccessfulResult($this->timeFactory->createFromString($dateTime));
    }
}
