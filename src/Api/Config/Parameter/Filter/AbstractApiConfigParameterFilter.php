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
use Vain\Core\Api\Config\Parameter\Result\ApiConfigParameterSuccessfulResult;

/**
 * Class AbstractApiConfigParameterFilter
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractApiConfigParameterFilter implements ApiConfigParameterFilterInterface
{
    private $isOptional;

    private $default;

    /**
     * AbstractApiConfigParameterFilter constructor.
     *
     * @param bool $isOptional
     * @param null $default
     */
    public function __construct(bool $isOptional = false, $default = null)
    {
        $this->isOptional = $isOptional;
        $this->default = $default;
    }

    /**
     * @param string $name
     * @param mixed  $element
     *
     * @return ApiConfigParameterResultInterface
     */
    abstract public function doFilter(string $name, $element): ApiConfigParameterResultInterface;

    /**
     * @inheritDoc
     */
    public function filter(array $data): ApiConfigParameterResultInterface
    {
        $filteredData = [];
        foreach ($data as $name => $element) {
            $filterResult = $this->doFilter($name, $element);
            if ($filterResult->isSuccessful()) {
                $filteredData[$name] = $filterResult->getValue();
                continue;
            }

            if ($this->isOptional) {
                $filteredData[$name] = $this->default;
                continue;
            }

            return $filterResult;
        }

        return new ApiConfigParameterSuccessfulResult($filteredData);
    }
}